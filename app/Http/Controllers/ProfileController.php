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
use App\Document;
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
        $document = Document::where(['user_id' => $id,
                                     'document_type' => 2])->get();
        $profile = Profile::where('user_id', '=', $id)->first();
        return view('profile.user-profile',['profile' => $profile,
                                            'documents' => $document]);
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
