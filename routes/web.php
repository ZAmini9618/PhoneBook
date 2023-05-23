<?php

use Illuminate\Support\Facades\Route;
use App\Models\Phonebook;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/list', function () {


    $phoneBookDataList = Phonebook::all();
    return view('Contacts.list', ['phoneBookDataList' => $phoneBookDataList]);
});
Route::get('/create', function () {
    return view('Contacts.create');
});
Route::post('/list', function () {
   $phoneBooks=new Phonebook();
   $phoneBooks->firstName=request('firstName');
    $phoneBooks->lastName=request('lastName');
    $phoneBooks->phoneNumber=request('phoneNumber');
    $phoneBooks->address=request('address');
    $phoneBooks->phone=request('phone');

    $phoneBooks->save();


    return redirect('/list');
});


Route::delete('/list/{id}', function ($id) {
  $DPhoneBook=Phonebook::findOrFail($id);
  $DPhoneBook->delete();
    return redirect('/list');

});

Route::get('/edit/{id}', function ($id) {

    $UphoneBooksData= Phonebook::findOrFail($id);
    return view('Contacts.edit',compact('UphoneBooksData'));
});

Route::put('/edit/{id}', function ( $id) {

    $updatePhone=Phonebook::find($id);
    $updatePhone->firstName=request()->input('firstName');
    $updatePhone->lastName=request()->input('lastName');
    $updatePhone->phoneNumber=request()->input('phoneNumber');
    $updatePhone->phone=request()->input('phone');
    $updatePhone->address=request()->input('address');
    $updatePhone->update();
    return redirect('/list');
});


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
