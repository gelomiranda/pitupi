<?php

namespace App\Http\Controllers;

use App\Document;
use Illuminate\Http\Request;
use Auth;
use Input;
use Validator;
use Redirect;

class DocumentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $document = Document::where('user_id', '=', Auth::id())->get();
        return view('document.borrower-documents',['documents' => $document]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {

      $rules = array(
          'image' => 'required|max:4000|mimes:png,jpeg,jpg',
          'description' => 'required'
      );

      $validator = Validator::make(Input::all(), $rules);

      // if the validator fails, redirect back to the form
      if ($validator->fails()) {
          return Redirect::to('document')
              ->withErrors($validator); // send back all errors to the login form
      }else{

	      $file = $request->file('image');
	      $location = time().$file->getClientOriginalName();
	      $filename = $file->getClientOriginalName();
	      
	      $document = new document;
	      $document->document_path = $location;
	      $document->document_description = Input::get('description');
	      $document->user_id = Auth::id();
	      $document->document_type = 2;
	      $document->save();
	      
	      $request->file('image')->move(public_path('uploads'), $location);
	      return redirect()->back();
	    }
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
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function show(Document $document)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function edit(Document $document)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Document $document)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Document  $document
     * @return \Illuminate\Http\Response
     */
    public function destroy(Document $document)
    {
        //
    }

    public function do_upload(Request $request){
      
      
    
    }
}
