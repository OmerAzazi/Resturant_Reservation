<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Menu;

class MenuController extends Controller
{
    public function Menu(){
        $breakfast = Menu::where('Food_category','=','Breakfast')->get();
        $lunch = Menu::where('Food_category','=','Lunch')->get();
        $desert = Menu::where('Food_category','=','Desert')->get();

        return view('Menu.Menu',compact('breakfast','lunch','desert'));
    }
}



