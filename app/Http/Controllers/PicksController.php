<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\User;
use App\Open;
use App\Pick;
use App\Team;

class PicksController extends Controller
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
    
    public function savePicks($userID) {
       $team1 = Input::get('pick1');
       $slot1 = Input::get('slot1');
       
       $pick1 = Pick::where('user_id', $userID)->where('slot', $slot1)->update(['team_name' => $team1]);
       
       if(Input::get('pick2')) {
         $team2 = Input::get('pick2');
         $slot2 = Input::get('slot2');
         $pick2 = Pick::where('user_id', $userID)->where('slot', $slot2)->update(['team_name' => $team2]);
       }
       
       

    }
    
}
