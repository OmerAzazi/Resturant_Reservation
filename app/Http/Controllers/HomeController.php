<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class HomeController extends Controller
{
    public function Index(){
        $breakfast = Menu::where('Weekly_featured','=','weekly')->where('Food_category','=','Breakfast')->get();
        $lunch = Menu::where('Weekly_featured','=','weekly')->where('Food_category','=','Lunch')->get();
        $dinner = Menu::where('Weekly_featured','=','weekly')->where('Food_category','=','Desert')->get();
        return view('Home.Home',compact('breakfast','lunch','dinner'));
    }
    public function Redirect(){
        $usertype = Auth::User()->user_type;
        if($usertype === 'Admin'){
            return view('/dashboard');
        }else{
        $breakfast = Menu::where('Weekly_featured','=','weekly')->where('Food_category','=','Breakfast')->get();
        $lunch = Menu::where('Weekly_featured','=','weekly')->where('Food_category','=','Lunch')->get();
        $dinner = Menu::where('Weekly_featured','=','weekly')->where('Food_category','=','Desert')->get();
        return view('Home.Home',compact('breakfast','lunch','dinner'));
        };
    }
}
