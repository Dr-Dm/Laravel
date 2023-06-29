@extends('layouts.main')
@section('title') Новость <q>{{ $n['title'] }}</q> @parent @endsection
@section('content')
    <div class="container">
        <h2>{{ $n['title'] }}</h2>
        <h4>{{ $n['author'] }}  ({{ $n['created_at'] }})</h4>
        <p>{{ $n['description'] }}</p>
    </div>
@endsection
