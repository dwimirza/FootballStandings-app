@extends('layouts.app')
@section('content')
    <div class="container">
        <a href="{{route('club.create')}}">Create Club</a>
        <a href="{{route('score.index')}}">Create Match</a>
        <a href="{{route('standings')}}">Standings</a>
    </div>
@endsection