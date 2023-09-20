@extends('ticketsystem::layouts.master')

@section('content')
    <h1>All Tickets</h1>

    <div>
        @foreach($data as $d)
            <h2>{{$d->title}}</h2>
        @endforeach
    </div>

@endsection
