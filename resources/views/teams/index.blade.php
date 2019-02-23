@extends('layouts.app')
<!-- Page content begins -->
@section('content')
<div class="content">
    <h2>Teams</h2>
                @foreach($teams as $team)
                    <div class="icc-teams">
                        <h3 class="icc-tems-name">{{ $team->name }}</h3>
                    </div>
                @endforeach
</div>
@endsection