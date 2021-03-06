<?php

namespace App\Http\Controllers;

use App\Loan;
use Illuminate\Http\Request;
use Input;
use Auth;
use Redirect;
use Validator;
use App\Profile;
use App\Document;
use App\User;
use Mail;
use DB;

class LoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $loan = Loan::where('user_id', '=', Auth::id())->get();
       
        return view('loan.loan-create',['loans' => $loan]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = array(
            'amount' => 'required|numeric',
            'terms' => 'required|numeric',
            'reason' => 'required:max:250'
        );

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('loan')
                ->withErrors($validator); // send back all errors to the login form
        }else{
            $profile = Profile::where('user_id', '=', Auth::id())->get();
            $document = Document::where('user_id', '=', Auth::id())->get();
       
            if(count($profile) == 0){
                return Redirect::to('profile')
                    ->withErrors('Please fill up your profile before creating loan.'); // send back all errors to the login form
            }

            if(count($document) == 0){
                return Redirect::to('document')
                    ->withErrors('Please upload supporting documents before creating loan.'); // send back all errors to the login form
            }
            $loan = Loan::where(['user_id' => Auth::id(),
                                 'loan_status' => '1'
                                ])->get();
            if(count($loan) != 0){
                return Redirect::to('loan')
                    ->withErrors('You still have a pending loan to us, kindly wait for our approval before creating one.'); // send back all errors to the login form

            }

            $loan = new Loan();
        
            $loan->loan_amount = Input::get('amount');
            $loan->loan_terms =Input::get('terms');
            $loan->loan_reason =Input::get('reason');
            $loan->loan_interest = (Input::get('terms') == '15') ? '10' : '15';
            $loan->user_id = Auth::id();
            $loan->loan_status = 1;
            

            $loan->save();

            $user = User::where(['user_id' => Auth::id()])->get()->first();
            $email_address =$user->user_email;
            Mail::send('email.welcome-loan',['name' => $profile[0]->profile_fullname], function($message) use ($email_address){
                $message->to($email_address)->subject('New Application');
                
            }); 

            return Redirect::to('loan')->with('status', 'Loan Successfully Created! Go to your loan book to check the status.');

        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function show(Loan $loan)
    {
        $loan = DB::table('loan')
                    ->join('profile', 'loan.user_id', '=', 'profile.user_id')
                    ->get();
        
        return view('loan.loan-show',['loans' => $loan]);
   
    }

        /**
     * Change the status of the loan
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function status(Request $request)
    {
        $loan = Loan::where('loan_id', '=', $request->loan_id)->get()->first();
        
        if($loan->loan_status == 1){

            if($request->status == 2){
                $update = ['loan_approved_by' => Auth::id(),
                           'loan_approved_at' => date('Y-m-d H:i:s'),
                           'loan_note' => $request->note, 
                           'loan_status' => $request->status];
            }

            if($request->status == 5){
                $update = ['loan_rejected_by' => Auth::id(),
                           'loan_rejected_at' =>  date('Y-m-d H:i:s'),
                           'loan_note' => $request->note,
                           'loan_status' => $request->status];
            }

            Loan::where('loan_id', $request->loan_id)
                        ->update($update);

            return 'Record succesfully updated.';

        }else{
            if($loan->loan_status == 2){
                return 'Updating record failed! This loan is already approved!';
            }

            if($loan->loan_status == 5){
                return 'Updating record failed! This loan is already rejected!';
            }
            

        }
        //return $loan->loan_status;
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function detail(Loan $loan,$id)
    {
        //$loan = Loan::where('loan_id', '=', $id)->get();
        $loan = DB::table('loan')
                    ->join('profile', 'loan.user_id', '=', 'profile.user_id')
                    ->where('loan_id','=',$id)
                    ->get()->first();

        
        return view('loan.loan-detail',['loan' => $loan]);
   
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function list(){
    // {
        if( Input::get('t_type') == '1'){
        $loans = DB::table('loan')
                    ->join('profile', 'loan.user_id', '=', 'profile.user_id')
                    ->where('loan_status','=','2')
                    ->get();

        }
        if( Input::get('t_type') == '2'){
        $loans = DB::table('loan')
                    ->join('profile', 'loan.user_id', '=', 'profile.user_id')
                    ->where('loan_status','=', '3')
                    ->get();

        }
        $option = "";
        foreach ($loans as $loan) {
            $option .= "<option value='".$loan->loan_id."'>".$loan->profile_fullname.' - '.$loan->loan_amount."</option>";
        }
        return $option;
   
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function edit(Loan $loan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Loan $loan)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Loan  $loan
     * @return \Illuminate\Http\Response
     */
    public function destroy(Loan $loan)
    {
        //
    }
}
