@extends('layouts.app')
@section('content')
    <table class="table">
        <tr>
            <th>Club</th>
            <th>Played</th>
            <th>Won</th>
            <th>Draw</th>
            <th>Lost</th>
            <th>GF</th>
            <th>GA</th>
            <th>Points</th>
        </tr>
        @foreach($standings as $club)
        <tr>
            <td>{{ $club->club }}</td>
            <td>{{ $club->played }}</td>
            <td>{{$club -> won}}</td>
            <td>{{ $club->drawn }}</td>
            <td>{{ $club->lost }}</td>
            <td>{{ $club->goals_for }}</td>
            <td>{{ $club->goals_against }}</td>
            <td>{{$club->points}}</td>
        </tr>
        @endforeach
    </table>
    <a href="{{route('score.index')}}">Create Match</a>
    <a href="{{route('club.create')}}">Create Club</a>
@endsection