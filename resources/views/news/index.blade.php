@extends('layouts.main')
@section('content')
<div class="container">

    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
        @forelse ($news as $n)
        <div class="col">
            <div class="card shadow-sm">
                <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                <div class="card-body">
                    <p><strong>{{ $n['title'] }}</strong></p>
                    <p class="card-text">{{ $n['description'] }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="btn-group">
                            <a type="button" class="btn btn-sm btn-outline-secondary" href="{{ route('news.show', ['id' => $n['id']]) }}">Читать полностью...</a>
                        </div>
                        <small class="text-body-secondary">{{ $n['author'] }}  ({{ $n['created_at'] }})</small>
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




