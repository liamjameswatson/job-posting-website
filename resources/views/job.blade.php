@extends('layout')

@section('content')
@include('partials._search')


<h2>{{$job['title']}}</h2>
<p>{{$job['description']}}</p>

@endsection
