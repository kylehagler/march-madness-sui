<?php

namespace App\Http\Controllers;

use App\User;
use App\Pick;
use App\Team;

class GridController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('picks')->get();  
        return $users; 
    }
}
