<?php

namespace App\Http\Controllers;
use App\User;
use Input;
use Illuminate\Http\Request;
use View;
use Session;

class RegistrationController extends Controller
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
        //
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
    public function update(Request $request, $id)
    {
        //
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


    public function email_verification(){
        $token =  Input::get('token');

        if(!empty($token)){
            $check = User::where('confirmation_code', $token);
            
            if($check->count()){
                

                $result             = $check->get();
                $email_address      = $result[0]->email_address;
                $password           = $result[0]->u_password;
                $confirmation_code  = $result[0]->confirmation_code;

                if($token == $confirmation_code){
                    $check->update(['is_verified' => 1]);
                }

                if( is_null($password) ){
                   return  View::make('fe.change-password')->with(['email_address' => $email_address,
                                                                   'm_token'       => $token]);
                }
                
            }
        }
        
    }

    public function save_password(Request $request){
        $email_address         = $request->input('h_email_address');
        $token                 = $request->input('h_token');
        $password              = $request->input('password');
        
        $check = User::where(['email_address'       => $email_address,
                              'confirmation_code'   => $token ]);
        if($check->count()){
            $check->update(['u_password' => $password]); 
            return redirect('login');
        }


    }   
}
