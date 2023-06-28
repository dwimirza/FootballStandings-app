@extends('layouts.app')
@section('content')
<div class="container">
    <h1>Create a Club</h1>
    <form method="post" action="{{route('club.store')}}" class="">
        @csrf
        <div class="form-group">
            <input type="text" name="club" class="form-control" placeholder="Nama Klub" required>
            <input type="text" name="city" class="form-control" placeholder="Kota" required>
            <button class="btn btn-success">Submit</button>
        </div>
    </form>
    <a href="{{route('score.index')}}">Create Match</a>
    <a href="{{route('standings.index')}}">Standings</a>
</div>
@endsection
