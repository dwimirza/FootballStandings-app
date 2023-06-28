@extends('layouts.app')
@section('content')
    <h1>Daftar Klub</h1>
    <form action="{{ route('score.store') }}" method="POST">
        @csrf
        <div class="score-form">
            <div class="form-group">
                <select name="club1[]" id="club" class="form-control">
                    <option value="">Pilih Klub</option>
                    @foreach($clubs as $club)
                        <option value="{{ $club->club }}">{{ $club->club }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <select name="club2[]" id="club" class="form-control">
                    @foreach($clubs as $club)
                        <option value="{{ $club->club }}">{{ $club->club }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <input type="text" name="score1[]" class="form-control" placeholder="Skor">
            </div>
            <div class="form-group">
                <input type="text" name="score2[]" class="form-control" placeholder="Skor">
            </div>
        </div>
        <button class="btn btn-success">Submit</button>
    </form>
    <button id="add">Add</button>

    <script>
        $('#add').click(function () {
            var formGroup = `
                <div class="form-group">
                    <select name="club1[]" id="club" class="form-control">
                        @foreach($clubs as $club)
                            <option value="{{ $club->club }}">{{ $club->club }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <select name="club2[]" id="club" class="form-control">
                        @foreach($clubs as $club)
                            <option value="{{ $club->club }}">{{ $club->club }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <input type="text" name="score1[]" class="form-control" placeholder="Skor">
                </div>
                <div class="form-group">
                    <input type="text" name="score2[]" class="form-control" placeholder="Skor">
                </div>
                
            `;
            $('.score-form').append(formGroup);
        });
    </script>
@endsection
