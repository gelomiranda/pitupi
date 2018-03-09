<?php

namespace App\Http\Controllers;
use App\Client;
use Input;
use Illuminate\Http\Request;
use View;
use Session;
use Mail;
use Helper;
use Redirect;
use Validator;
class ClientController extends Controller
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

        $validator = $this->validate($request, [
            'fullname' => 'required',
            'mobileno' => 'required|numeric|min:11',
            'emailaddress' => 'required:email|unique:client,emailaddress',
            'loanamount' => 'required',
            'terms' => 'required|numeric',
            'id1' => 'required',
            'id2' => 'required',
            'payslipcoe' => 'required',
            'bankname' => 'required',
            'bankno' => 'required|numeric',
        ]);

        

        $client = new client;
        $id_1 = $request->file('id1');
        $id_2 = $request->file('id2');
        $id_3 = $request->file('payslipcoe');
        $id_4 = $request->file('billingstatement');
        $id_5 = $request->file('letter');
            


        $location_id_1 = time().$id_1->getClientOriginalName();
        $location_id_2 = time().$id_2->getClientOriginalName();
        $location_id_3 = time().$id_3->getClientOriginalName();
        $location_id_4 = time().$id_4->getClientOriginalName();
        $location_id_5 = time().$id_5->getClientOriginalName();
        
        
        $this->do_upload($id_1,$location_id_1);
        $this->do_upload($id_2,$location_id_2);
        $this->do_upload($id_3,$location_id_3);
        $this->do_upload($id_4,$location_id_4);
        $this->do_upload($id_5,$location_id_5);

        $client->fullname       = $request->input('fullname');
        $client->mobileno       = $request->input('mobileno');
        $client->emailaddress   = $request->input('emailaddress');
        $client->loanamount     = $request->input('loanamount');
        $client->terms          = $request->input('terms');
        $client->id1            = $location_id_1;
        $client->id2            = $location_id_2;
        $client->payslipcoe     = $location_id_3;
        $client->billingstatement     = $location_id_4;
        $client->letter         = $location_id_5;
        $client->bankname         = $request->input('bankname');
        $client->bankno       = $request->input('bankno');
        $client->save();
        
        Mail::send('email.testmail',['name' => $request->input('fullname'),'amount' => $request->input('loanamount' ), 'terms' => $request->input('terms')], function ($message) {
           $emails = ['karlo.largoza@gmail.com ', 'yvone_2989@yahoo.com ','angelomirandagarcia@gmail.com'];

           $message->from($emails, 'New Application - Fast Cash Pinoy');

           $message->to('angelomirandagarcia@gmail.com')->subject('New Application');

        });
        $request->session()->flash('status', 'Application has been sent!');   
        return redirect()->back();   

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
  
}
