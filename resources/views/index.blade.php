@extends('layouts.app')
@section('content')
    @foreach($standings as $club)
    <table>
        <tr>
            <td>{{ $club->club }}</td>
            <td>{{ $club->city }}</td>
            <td>{{ $club->score }}</td>
        </tr>
        
    </table>
    @endforeach
@endsection