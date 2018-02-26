@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Edit a movie</h1>
        <hr>
        <a href="/admin" class="btn btn-default">Go back</a>
        <hr>
        {!! Form::open(['action' => ['MovieController@update', $movie['id']], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('name', 'Movie Title')}}
            {{Form::text('name', $movie['name'], ['class'=>'form-control', 'place-holder' =>'Movie title'])}}
        </div>
        <div class="form-group">
            {{Form::label('category', 'Select Movie Category: ')}}
            {{Form::select('category', $category)}}
            &nbsp
            &nbsp
            {{Form::label('year', 'Year: ')}}
            {{Form::selectRange('year', $movie['year'], 2018, 1950)}}
        </div>
        <div class="form-group">
            {{Form::label('description', 'Description')}}
            {{Form::textarea('description', $movie['description'], ['class'=>'form-control', 'place-holder' =>'Description'])}}
        </div>
        <hr>
        {{Form::submit('Submit', ['class'=>"btn btn-default"])}}
        {!! Form::close() !!}
    </div>

@endsection

