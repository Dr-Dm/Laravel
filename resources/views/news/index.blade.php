@extends('layouts.main')
@section('title') Список новостей @parent @endsection
@section('content')
<div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse ($news as $n)
        <div class="col">
            <div class="card shadow-sm">
                <img src="{{ $n->image }}" />
                <div class="card-body">
                    <p><strong>{{ $n->title }}</strong></p>
                    <p class="card-text">{{ $n->description }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('news.show', ['id' => $n->id]) }}">Читать полностью...</a>
                        </div>
                        <small class="text-body-secondary">{{ $n->author }}  ({{ $n->created_at }})</small>
                    </div>
                </div>
            </div>
        </div>
        @empty
            <h2>Новостей нет</h2>
        @endforelse
    </div>


</div>
@endsection




