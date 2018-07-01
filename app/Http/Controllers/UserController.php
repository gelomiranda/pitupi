<?php

namespace App\Http\Controllers;

use App\User;
use App\Loan;
use App\Document;
use App\L_transaction;
use App\Transaction;
use Mail;
use Input;
use Auth;
use Validator;
use Redirect;
use Helper;
use Hash;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $guarded = array();
    
    public function __construct()
    {
        //$this->middleware(['auth'], ['only' => ['profile',]]);
    }

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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $first_name         = $request->input('first_name');
        $middle_name        = $request->input('middle_name');
        $last_name          = $request->input('last_name');
        $mobile_number      = $request->input('mobile_number');
        $email_address      = $request->input('email_address');
        

        //Check if data is not empty
        if ( !empty ( $first_name ) && !empty ( $middle_name ) && !empty ( $last_name ) && !empty ( $mobile_number ) && !empty ( $email_address ) ) {
            
            $confirmation_code = str_random(30);
            $now = $now = new \DateTime();

            $user = User::create(['first_name'          => $first_name,
                                  'middle_name'         => $middle_name,
                                  'last_name'           => $last_name,
                                  'mobile_number'       => $mobile_number,
                                  'email_address'       => $email_address,
                                  'confirmation_code'   => $confirmation_code,
                                  'confirmation_expired' => $now ]);
            $request->session()->flash('alert-success', 'User was successful added!');
            $this->sendmail($email_address,$first_name.' '.$last_name,$confirmation_code);
        }

        return redirect('verify')->with('email', $email_address,$confirmation_code);
 
    }

    public function verify()
    {
       return view('fe.welcome-registration');
    }



    private function sendmail($email_address , $name, $confirmation_code){
        Mail::send('email.testmail',['confirmation_code' => $confirmation_code,'name' => $name], function($message) use ($email_address){
            $message->to($email_address)->subject('Welcome!');
        }); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
       
    }




    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user_id =                      Auth::id();
        $first_name                     = $request->input('first_name');
        $middle_name                    = $request->input('middle_name');
        $last_name                      = $request->input('last_name');
        $mobile_number                  = $request->input('mobile_number');
        $birth_date                     = $request->input('birth_date');
        $birth_date                     = date('Y-m-d', strtotime(str_replace('-', '/', $birth_date)));
        $gender                         = $request->input('gender');
        $civil_status                   = $request->input('civil_status');
        $spouse_name                    = $request->input('spouse_name');
        $sss_gsis                       = $request->input('sss_gsis');
        $tin                            = $request->input('tin');
        $facebook_id                    = $request->input('facebook_id');
        $street_adress                  = $request->input('street_adress');
        $city                           = $request->input('city');
        $zip_code                       = $request->input('zip_code');
        $permanent_city                 = $request->input('permanent_city');
        $permanent_zip                  = $request->input('permanent_zip');
        $ownership_residence            = $request->input('ownership_residence');
        $permanent_address              = $request->input('permanent_address');
        
        
        if(!empty($request->file('avatar'))){
          $file = $request->file('avatar');
          $avatar = time().$file->getClientOriginalName();
          $filename = $file->getClientOriginalName();
          $location = time().$file->getClientOriginalName();
          $file->move(public_path('avatar/uploads'), $location);   
        }else{
          $avatar = "";
        }

        

     
        
        $this->validate($request,[
            'first_name' => 'required',
            'middle_name' => 'required',
            'last_name' => 'required',
        ]);
        
        
        User::where('id', '=', $user_id)
            ->update(['first_name'  => $first_name,
                      'middle_name' => $middle_name,
                      'middle_name' => $middle_name,
                      'last_name'   => $last_name,
                      'bday'        => $birth_date,
                      'middle_name' => $middle_name,
                      'civil_status' => $civil_status,
                      'spouse_name' => $spouse_name,
                      'sss_gsis'    => $sss_gsis,
                      'facebook_id' => $facebook_id,
                      'tin' => $tin,
                      'city' => $city,
                      'gender' => $gender,
                      'permanent_city' => $permanent_city,
                      'street_adress' => $street_adress,
                      'city' => $city,
                      'zipcode' => $zip_code,
                      'permanent_city' => $permanent_city,
                      'permanent_address' => $permanent_address,
                      'permanent_zip' => $permanent_zip,
                      'ownership_of_residense' => $ownership_residence,
                      'avatar'    =>  $avatar]);

        $request->session()->flash('status', 'Profile had been updated!');      
        return redirect()->route('profile');   

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */


    public function destroy(User $user)
    {
        //
    }

    public function register()
    {
      return view('fe.register'); 
    }

    public function register_user()
    {
      $rules = array(
          'email_address'    => 'required|email', // make sure the email is an actual email
          'password' => 'required|min:8|same:c_password' // password can only be alphanumeric and has to be greater than 3 characters
      );

      $confirmation_code = str_random(30);

      $userdata = array(
        'email_address'     => Input::get('email_address'),
        'password'          => Input::get('password'),
        'is_verified'       => '1',
        'user_type'         => '2'
      );

      $validator = Validator::make(Input::all(), $rules);

      // if the validator fails, redirect back to the form
      if ($validator->fails()) {
          return Redirect::to('register')
              ->withErrors($validator) // send back all errors to the login form
              ->withInput(Input::except('password')); // send back the input (not the password) so that we can repopulate the form
      }else{
        $user = User::where('user_email', '=', Input::get('email_address'))->get();
        if (count($user) > 0) {
          return Redirect::to('register')->with('status', 'Email Address already in use!');;
        }else{
          $user = User::create(['user_email'             => Input::get('email_address'),
                              'user_password'         => bcrypt(Input::get('password')),
                              'user_link_validation'  => $confirmation_code]);
          Mail::send('email.confirmation',['confirmation_code' => $confirmation_code], function ($message) {
            $message->from(Input::get('email_address'), 'Password Confirmation - Fast Cash Pinoy');
            $message->to(Input::get('email_address'))->subject('Password Confirmation - Fast Cash Pinoy');
          });
        } 
        
      }
    }

    public function registration_verification($confirmation_code)
    {
      $user = User::where('user_link_validation', '=', $confirmation_code)->get();
      if(count($user) != 0){
        $user = $user->first();
        if($user->user_is_validated != 1){

          $now = $now = new \DateTime();
          User::where('user_link_validation', '=', $confirmation_code)
            ->update(['user_is_validated'  => 1,
                      'user_is_validated_at' => $now]);
        }else{
          return view('fe.message')->withMessage('This user was already validated.');
        }
      }
     
    }


    public function login()
    {
       return view('fe.login');
    }

    public function verify_login(Request $request)
    {

      $rules = array(
          'user_email'    => 'required|email', // make sure the email is an actual email
          'user_password' => 'required|min:8' // password can only be alphanumeric and has to be greater than 3 characters
      );

      $hashed = Hash::make( Input::get('user_password'));
          
      $userdata = array(
        'user_email'             => Input::get('user_email'),
        'user_password'          =>  Input::get('user_password'),
        'user_is_validated'      => '1'
      );

      // run the validation rules on the inputs from the form
      $validator = Validator::make(Input::all(), $rules);

      // if the validator fails, redirect back to the form
      if ($validator->fails()) {
          return Redirect::to('login')
              ->withErrors($validator) // send back all errors to the login form
              ->withInput(Input::except('user_password')); // send back the input (not the password) so that we can repopulate the form
      }else{ 
        if (Auth::attempt($userdata)) {
          if( Auth::user()->isAdmin() ){
            return redirect('admin');
          }
          return redirect('profile');
        } else {        
          return Redirect::to('login')->with('status', 'Invalid Credentials!');
        } 
      }

    }


    public function documents(){
        $documents = Document::where(['user_id' => Auth::id(),
                                      'type' => 0])
                ->get();
        return view('be.documents',['documents' => $documents,
                                    'document_type' => '0']);
    }

    public function transaction_document(){
        $documents = Document::where(['user_id' => Auth::id(),
                                      'type' => 1])
                ->get();
        return view('be.documents',['documents' => $documents,
                                    'document_type' => '1']);
    }    


    public function do_upload(Request $request){
      
      $file = $request->file('image');
      $location = time().$file->getClientOriginalName();
      $filename = $file->getClientOriginalName();
      
      $document = new document;
      $document->location = $location;
      $document->filename = $file->getClientOriginalName();
      $document->user_id = Auth::id();
      $document->type = $request->document_type;
      $document->save();

      //$request->file->store('image');
      //$file->store($location);
      //$request->file('image')->storeAs('upload',$location);
      
      $request->file('image')->move(public_path('uploads'), $location);                   
      //$request->has('file');
      session()->flash('tab', '1');
      return redirect()->back();
    
    }

    public function application(){
        $loans = Loan::get();
        return view('be.borrower-application', array('loans' => $loans));
    }

    public function application_save(Request $request){
      $amount           = $request->input('amount');
      $description      = $request->input('hd_description');
      $interest         = $request->input('hd_interest');
      $terms            = $request->input('terms');
      $l_transaction = new L_transaction();
      
      $l_transaction->user_id = Auth::id();
      $l_transaction->amount = $amount;
      $l_transaction->description = $description;
      $l_transaction->interest = $interest;
      $l_transaction->terms = $terms;
      $l_transaction->save();
      return back();
    
    }


    public function book(){
        $l_transactions = L_transaction::where('user_id', Auth::id())
                          ->get();
        
        return view('be.borrower-book', array('l_transactions' => $l_transactions));
    }

    public function wallet() {
       return view('be.wallet');
    }



    public function marketplace() {
      $l_transactions = L_transaction::where('is_approved', 1)
                          ->get();
      return view('be.marketplace',array('l_transactions' => $l_transactions));
    }


    public function invest(Request $request) {
      /*Transaction type = 1 --invenstment*/
      
      //Validate if the user already invest on this request

      $transaction = new transaction();
      $loan_id          = $request->input('loan_id');
      $amount           = $request->input('amount');
      $transaction_date = $now = $now = new \DateTime();
      $terms            = $request->input('terms');

      $validate = $transaction::where(['user_id' => Auth::id(),
                                      'transaction_type' => 1])->get()->count();

      
      //Check if the user has sufficient balance to invest
      if( helper::get_balance( Auth::id() ) == 0 || helper::get_balance( Auth::id() ) < $amount){
        return 1;
      }else{
        //Validate if the user is already invested on this transaction
        if($validate == 0){
          $transaction->user_id = Auth::id();
          $transaction->loan_id = $loan_id;
          $transaction->amount  = $amount;
          $transaction->transaction_type = 1;
          $transaction->save();
          return 9;
        }else{
          return 0;
        }
      }
    }

}
