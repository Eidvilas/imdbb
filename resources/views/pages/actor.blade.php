@extends('layouts.app')

@section('content')
    <a href="/actors" class="btn btn-default">Go back</a>
    <h1>{{$actor['name']}}</h1>
    <p>{{$actor['birthday']}}</p>
    <p>
        @if($actor['deathday'])
            {{$actor['deathday']}}
        @endif
    </p>

    @if($actor)
            <div class="container jumbotron">
                <div class="row">
                    <div class="col-md-10">
                        <h3>{{$actor['name']}}</h3>
                    </div>
                </div>
    @endif
@endsection

