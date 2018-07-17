<?php

namespace App\Http\Controllers;

use App\Transaction;
use Illuminate\Http\Request;
use Input;
use Auth;
use App\Loan;
use DB;
use App\Document;
use Validator;
use Redirect;
class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        return view('transaction.transaction-create');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
       

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
            'loan_id' => 'required|numeric'
        );

        $validator = Validator::make(Input::all(), $rules);

        // if the validator fails, redirect back to the form
        if ($validator->fails()) {
            return Redirect::to('admin/transaction')
                ->withErrors($validator); // send back all errors to the login form
        }else{

            $transaction = new Transaction();
            
            $transaction->transaction_amount = Input::get('amount');
            $transaction->loan_id = Input::get('loan_id');
            $transaction->transaction_note = Input::get('note');
            $transaction->user_id = Auth::id();
            $transaction->transaction_date = date('Y-m-d H:i:s');
            $transaction->transaction_type = Input::get('transaction_type');
            
            if(Input::get('transaction_type') == 1){
                $update_loan = ['loan_status' => 3];    
            }

            if(Input::get('transaction_type') == 2){
                $update_loan = ['loan_status' => 4];    
            }

            $transaction->save();
            $loan_id = Input::get('loan_id');
            

            Loan::where('loan_id', $loan_id)
                            ->update($update_loan);

            $insertedId = $transaction->id;

            if($request->file('image')){

                $file = $request->file('image');
                $location = time().$file->getClientOriginalName();
                $filename = $file->getClientOriginalName();
                
                $document = new document;
                $document->document_path = $location;
                $document->document_description = Input::get('description');
                $document->user_id = Auth::id();
                $document->document_type = 3;
                $document->transaction_id = $insertedId;
                $document->save();
                $request->file('image')->move(public_path('uploads'), $location);
                 
            } 
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        $transactions = DB::table('transaction')
                            ->join('profile','profile.user_id','=','transaction.user_id')
                            ->leftJoin('document', 'transaction.transaction_id', '=', 'document.transaction_id')
                            
                            ->get();

        return view('transaction.transaction-show',['transactions' => $transactions]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
