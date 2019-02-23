<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FixtureController extends Controller
{
     public function index()
     {
        DB::table('groups')->truncate();
        DB::table('fixtures')->truncate();
        $teams = DB::table('teams')->orderBy('strength_score', 'DESC')->orderBy('id', 'DESC')->get();
        $teams_count  = count($teams);
        $first_group_name = 65; //ascii for A
        $number_of_group = 2; //we can change it as per requirement by config or DB
        $groups = [];
        for($i = 0; $i<$number_of_group; $i++ ){
            $groups[] = chr($first_group_name + $i);
        }

        $teams_group = [];
        $team_per_group  = ceil($teams_count/$number_of_group);

       /* grouped the teams, each group should have competitior teams */
       /* example if ordered in strength score first team will be in A group 
       second will be in B group third in A and fourth in B and so on */

        foreach($groups as $x => $group){
            $i = 1;
            $j = $x;
            while( $i <= $team_per_group ){
                if(isset( $teams[$j])){
                $teams_group[$group][] = $teams[$j];
                }
                $i++;
                $j =  $j + count( $groups);
                
            }   
        }
        
        /*logic for fixture let assume the start date from next week */
        $start_date =  date('d-m-Y', strtotime('next tuesday'));


        $fixture = [];

        foreach($teams_group as $group_name => $group){
            $start_date_temp = $start_date;
            for($i = 0; $i < count($group); $i++){
               for($j = $i + 1; $j < count($group); $j++){
                    $fixture[] = ["group" => $group_name,  "match_date" => $start_date_temp, "team1" => $group[$i], "team2" => $group[$j]  ];
                    $start_date_temp = date('d-m-Y', strtotime($start_date_temp. ' + 5 days'));
               }
           }
        }
   
        $data = array(
              'start_date' =>  $start_date,
              'groups' =>  $teams_group,
              'fixtures' => $fixture
        );
         return view('fixture.index', $data);
     }


}
