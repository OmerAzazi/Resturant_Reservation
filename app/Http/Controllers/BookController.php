<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Response;




class BookController extends Controller
{
    Public function store(Request $request){

        $validatedData = $request->validate([
            'day' => 'required',
            'hour' => 'required',
            'name' => 'required|regex:/^[a-zA-Z ]+$/',
            'email' => 'required',
            'phone' => 'required|digits:10|numeric',
            'persons' => 'required',
        ], [
            'day.required' => 'Please select an day',
            'hour.required' => 'Please select an hour.',
            'name.required' => 'Please enter your name.',
            'name.regex' => 'Only letters are allowed in the name field.',
            'email.required' => 'Please enter your email',
            'phone.required' => 'Please enter your phone number.',
            'phone.digits' => 'Phone number must be 10 digits.',
            'phone.numeric' => 'Phone must only contain number',
            'persons.required' => 'Please select the number of persons.',
        ]);
        $user_id = Auth::User()->id;
        $validatedData['user_id'] = $user_id;
        Book::create($validatedData);
    
        return response()->json(['message' => 'The reservation booked successfully'],Response::HTTP_CREATED);}

        public function BookPage(){
            if(Auth::id())
            {
                $email = Auth::User()->email;
                $user_id = Auth::User()->id;
                $reservation = Book::where('user_id','=',$user_id)->get();
                $count = Book::where('user_id','=',$user_id)->count();
                return view('Book.Home',compact('email','reservation','count'));
            }
            else{
                return reirect('login');
                }
        }
}
