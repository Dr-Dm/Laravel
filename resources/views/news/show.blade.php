@extends('layouts.main')
@section('content')
    <div>
        <h2>{{ $n['title'] }}</h2>
        <h4>{{ $n['author'] }}  ({{ $n['created_at'] }})</h4>
        <p>{{ $n['description'] }}</p>
    </div>
@endsection
