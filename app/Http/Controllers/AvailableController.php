<?php

namespace App\Http\Controllers;

use App\User;
use App\Pick;
use App\Team;

class AvailableController extends Controller
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
    public function index($userID)
    {
        $usedTeams = Pick::where('user_id', $userID)->pluck('team_name')->toArray();   
        $availableTeams = Team::whereNotIn('team_name', $usedTeams)->where('is_eliminated', 0)->get();  
        return $availableTeams; 
    }
    
    public function used($userID)
    {
        $usedTeams = Pick::where('user_id', $userID)->get();   
        return $usedTeams; 
    }
}
