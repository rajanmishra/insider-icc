@extends('layouts.app')
<!-- Page content begins -->
@section('content')
<div class="content">
    <h2>Standing </h2>
    <div class="container">           

 
  @foreach( $results as $group => $result)
  <table class="table">
  <thead>
      <tr>
        <th>Group {{$group}}</th>
        <th>MP</th>
        <th>W</th>
        <th>L</th>
        <th>N/R</th>
        <!-- <th>R</th>
        <th>NRR</th>
        <th>Pts</th>
        <th>Form</th> -->
      </tr>
    </thead>
    <tbody>
    @foreach( $result as $record)
    <tr>
        <td>{{$record->name}}</td>
        <td>{{$record->played}}</td>
        <td>{{$record->win}}</td>
        <td>{{$record->lost}}</td>
        <td>0</td>
        <!-- <td>858.805</td>
        <td>+1.04</td>
        <td>4</td>
        <td>LWW</td> -->
      </tr>
    @endforeach
    </tbody>
  </table>
                @endforeach
   
    
</div>



</div>
@endsection