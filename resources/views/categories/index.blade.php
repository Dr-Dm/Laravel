@extends('layouts.main')
@section('title') Список категорий @parent @endsection
@section('content')
    <div class="container">

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
            @forelse ($newsCategories as $nc)
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>
                        <div class="card-body">
                            <h1><?=$nc['category_title'] ?></h1>
                            <a href="<?=route('news', ['category_id' => $nc['id']])?>">Новости по теме</a>
                            <div class="d-flex justify-content-between align-items-center">
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
