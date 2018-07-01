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
        //
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
