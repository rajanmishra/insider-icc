<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class StandingController extends Controller
{
    //

    public function index()
    {
    
         //get fixture
         $groups = DB::table('groups')->get();
         $final_result = [];
         foreach($groups as $group){
            $final_result[$group->group][] =  DB::table('teams')->where('id',  $group->team_id)->first();
         }
         $data = array(
            'results' =>   $final_result,
      );

        return view('standing.index', $data);
    }
}

