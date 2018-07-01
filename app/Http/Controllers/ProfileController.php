<?php

namespace App\Http\Controllers;
use App\Profile;
use Input;
use Illuminate\Http\Request;
use View;
use Session;
use Mail;
use Helper;
use Redirect;
use Validator;
use Auth;
class ProfileController extends Controller
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
    public function create(Request $request)
    {

        // $validator = $this->validate($request, [
        //     'fullname' => 'required|alpha',
        //     'mobileno' => 'required|numeric|min:11',
        //     'address' => 'required',
        //     'terms' => 'required|numeric',
        //     'id1' => 'required|max:10240',
        //     'id2' => 'required|max:10240',
        //     'bank' => 'required',
        //     'payslipcoe' => 'required|max:10240',
        //     'letter' => 'required|max:10240',
        //     'billingstatement' => 'required|max:10240',
        //     'bankno' => 'required|numeric',
        // ]);

        

        // $client = new client;
        // $id_1 = $request->file('id1');
        // $id_2 = $request->file('id2');
        // $id_3 = $request->file('payslipcoe');
        // $id_4 = $request->file('billingstatement');
        // $id_5 = $request->file('letter');
            


        // $location_id_1 = time().$id_1->getClientOriginalName();
        // $location_id_2 = time().$id_2->getClientOriginalName();
        // $location_id_3 = time().$id_3->getClientOriginalName();
        // $location_id_4 = time().$id_4->getClientOriginalName();
        // $location_id_5 = time().$id_5->getClientOriginalName();
        
        
        // $this->do_upload($id_1,$location_id_1);
        // $this->do_upload($id_2,$location_id_2);
        // $this->do_upload($id_3,$location_id_3);
        // $this->do_upload($id_4,$location_id_4);
        // $this->do_upload($id_5,$location_id_5);

        // $client->fullname       = $request->input('fullname');
        // $client->mobileno       = $request->input('mobileno');
        // $client->emailaddress   = $request->input('emailaddress');
        // $client->loanamount     = $request->input('loanamount');
        // $client->terms          = $request->input('terms');
        // $client->p_address      = $request->input('p_address');
        // $client->b_address      = $request->input('b_address');
        // $client->bank           = $request->input('bank');
        // $client->id1            = $location_id_1;
        // $client->id2            = $location_id_2;
        // $client->payslipcoe     = $location_id_3;
        // $client->billingstatement     = $location_id_4;
        // $client->letter         = $location_id_5;
        // $client->bankname         = $request->input('bankname');
        // $client->bankno       = $request->input('bankno');
        // $client->save();
        
        // Mail::send('email.testmail',['name' => $request->input('fullname'),'amount' => $request->input('loanamount' ), 'terms' => $request->input('terms')], function ($message) {
        //    $emails = ['karlo.largoza@gmail.com','angelomirandagarcia@gmail.com','dane.alain14@gmail.com','yvone2989@gmail.com'];

        //    $message->from($emails, 'New Application - Fast Cash Pinoy');

        //    $message->to($emails)->subject('New Application');

        // });
        // $request->session()->flash('status', 'Application has been sent!');   
        // return redirect()->back();   

    }


    private function sendmail($email_address , $name, $confirmation_code){
        Mail::send('email.testmail',['confirmation_code' => $confirmation_code,'name' => $name], function($message) use ($email_address){
            $message->to($email_address)->subject('New Application');
        }); 
    }

    
    private function do_upload($input,$location){
        
        $filename = $input->getClientOriginalName();
        $input->move(public_path('uploads'), $location);    

    }

    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('be.borrower-dashboard');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function user()
    {
        $profile = Profile::where('user_id', '=', Auth::id())->get();
        return view('profile.borrower-profile',['profile' => $profile]);
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $rules = array(
            'fullname' => 'required|regex:/^[\pL\s\-]+$/u',
            'mobile_no' => 'required|numeric|min:11',
            'address' => 'required',
            'birthdate' => 'required',
            'current_employer' => 'required',
            'job_title' => 'required',
            'monthly_income' => 'required|numeric',
            'no_of_years' => 'required',
            'bank' => 'required',
            'bank_account' => 'required',
        );

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('profile')
                ->withErrors($validator) // send back all errors to the login form
                ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
        }else{
          $profile = Profile::updateOrCreate(
              [
                  'user_id' =>  Auth::id()
              ],
              [
                  'profile_fullname' => Input::get('fullname'),
                  'profile_address'  => Input::get('address'),
                  'profile_birthdate'  => Input::get('birthdate'),
                  'profile_current_employer'  => Input::get('current_employer'),
                  'profile_job_title'  => Input::get('job_title'),
                  'profile_mobile_no'  => Input::get('mobile_no'),
                  'profile_monthly_income'  => Input::get('monthly_income'),
                  'profile_no_of_years'  => Input::get('no_of_years'),
                  'profile_bank'  => Input::get('bank'),
                  'profile_bank_account'  => Input::get('bank_account')

              ]);

           $profile->save();
           return Redirect::to('profile')->with('status', 'Profile Successfully Updated!');
        } 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
  
}
