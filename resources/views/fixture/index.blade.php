@extends('layouts.app')
<!-- Page content begins -->
@section('content')
<div class="content">
    <h2>Fixture -- Tournament Starting from {{$start_date}}</h2>
     <a href ="/play" class="btn btn-info"> PLAY a Round</a>

    @foreach($groups as $group_name => $group)
        <div class="icc-teams">
            <h3 class="icc-tems-name">{{ $group_name }}</h3>
            @foreach($group as  $team)
            <h4 class="icc-tems-name">{{ $team->name }}</h4>
            @endforeach
        </div> 
    @endforeach


    @foreach($fixtures as $fixture)
        <div class="icc-teams">
          Group {{$fixture['group']}} Match Scheduled on  {{$fixture['match_date']}} {{ $fixture['team1']->name}} vs {{ $fixture['team2']->name}} at venue.
        </div> 
    @endforeach
    

</div>
@endsection