<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TeamController extends Controller
{
    //
    public function index()
    {
        $teams = DB::table('teams')->orderBy('id', 'DESC')->get();
        $data = array(
            'teams' => $teams
        );
        return view('teams.index',  $data);
    }
}


