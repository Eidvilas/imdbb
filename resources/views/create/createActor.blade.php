@extends('layouts.app')

@section('content')
    <div class="col-md-8 col-md-offset-2">
        <h1>Add new actor</h1>
        <hr>
        <a href="/admin" class="btn btn-default">Go back</a>
        <hr>
        {!! Form::open(['action' => 'ActorsController@store', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Actor name')}}
            {{Form::text('name', '', ['class'=>'form-control', 'place-holder' =>'Actors name'])}}
        </div>
        <div class="form-group">
            {{Form::label('birthday', 'Actor\'s birth date: ')}}
            {{Form::date('birthday', \Carbon\Carbon::now())}}
            &nbsp
            &nbsp
            {{Form::label('deathday', 'Actor\'s death date: ')}}
            {{Form::date('deathday', \Carbon\Carbon::now())}}
        </div>
        <hr>
        {{Form::submit('Submit', ['class'=>"btn btn-default"])}}
        {!! Form::close() !!}
    </div>

@endsection
