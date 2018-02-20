<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('fe/landing_fcp');
});


Route::get('logout', function () {
    Auth::logout();
});

// Route::get('/register', function () {
//     return view('fe/register');
// });

Route::get('/register', 'UserController@register');



Route::get('/borrower-create', function () {
    return view('fe/borrower-create');
});


Route::get('/lender-create', function () {
    return view('fe/lender-create');
});



Route::get('/apply', function () {
    return view('be/lender-apply');
});

Route::get('/application-status', function () {
    return view('be/lender-application-status');
});



/*User Functions*/

Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@verify_login');

Route::get('/profile', 'UserController@profile')->name('profile');
Route::post('/profile', 'UserController@update');


Route::get('/documents', 'UserController@documents')->name('documents');

Route::get('user/transaction_document', 'UserController@transaction_document')->name('transaction_document');

Route::post('/documents', 'UserController@do_upload');

Route::get('/application', 'UserController@application')->name('application');
Route::post('/application', 'UserController@application_save');



Route::post('user/create', 'UserController@store');


Route::get('user/wallet', 'UserController@wallet')->name('wallet');
Route::get('/user/marketplace', 'UserController@marketplace')->name('marketplace');


Route::get('/verify', 'UserController@verify');
Route::get('borrower/book', 'UserController@book');

Route::post('user/invest', 'UserController@invest');




/*Registrations Controllers*/

Route::get('/verify_email', 'RegistrationController@email_verification');

Route::get('/change_password', 'RegistrationController@change_password');

Route::post('/save_password', 'RegistrationController@save_password');



/*Dashboard function*/

Route::get('/dashboard', 'RegistrationController@change_password');



/*Borrower function*/
Route::get('/borrower', 'BorrowerController@index');
Route::get('/borrower/credit_questionnaire', 'BorrowerController@credit_questionnaire');


/*Admin Route*/
Route::get('/admin', 'AdminController@index')->name('admin');
Route::get('/admin/users', 'AdminController@users')->name('users');
Route::get('/admin/user/{id}', 'AdminController@show')->name('user');
Route::post('/admin/approve_loan', 'AdminController@approve_loan')->name('approve_loan');
Route::post('/admin/transfer', 'AdminController@transfer')->name('transfer');



