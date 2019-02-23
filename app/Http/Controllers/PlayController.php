<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PlayController extends Controller
{
    //

    public function index()
    {
    
        //get fixture
        $fixtures = DB::table('fixtures')->get();

        foreach( $fixtures as $fixture){
            $min = 200;
            $max = 300;
            $teamid  = $fixture->team_id;
            $teamids = explode("-", $teamid);
            $team_one  = $teamids[0];
            $team_one_detail = DB::table('teams')->where('id', $team_one)->first();
           // print_r($team_one_detail);
            $team_two  = $teamids[1];
            $team_two_detail = DB::table('teams')->where('id', $team_two)->first();
           // print_r($team_two_detail);
           // extra score according to strength point
            $score_team_one  = rand( $min, $max) + ($team_one_detail->strength_score * 10);
            $score_team_two  = rand( $min, $max) + ($team_two_detail->strength_score * 10);
            //add a match to both teams
            DB::table('teams')->where('id', $team_one)->increment('played');
            DB::table('teams')->where('id', $team_two)->increment('played');
            if($score_team_one >  $score_team_two){
                //team one wins
                DB::table('teams')->where('id', $team_one)->increment('win');
                DB::table('teams')->where('id', $team_two)->increment('lost');

            }else{
                //team two wins
                DB::table('teams')->where('id', $team_two)->increment('win');
                DB::table('teams')->where('id', $team_one)->increment('lost');
            }

        }

        return redirect('/standing');
    }
}
