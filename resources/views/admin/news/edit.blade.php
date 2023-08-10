@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать новость</h1>
    </div>

    <form method="post" action="{{ route('admin.news.update', ['news' => $news]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="categories">Категории</label>
            <select class="form-control" multiple name="categories[]" id="categories">
                @foreach($categories as $category)
                    <option @if(in_array($category->id, $news->categories->pluck('id')->toArray())) selected @endif value="{{ $category->id }}"> {{ $category->title }}</option>
                @endforeach
            </select>
            @error('categories') <x-alert type="danger" :message="$message"></x-alert>@enderror
        </div>
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $news->title }}">
            @error('title') <x-alert type="danger" :message="$message"></x-alert>@enderror
        </div>
        <div class="form-group">
            <label for="author">Автор</label>
            <input type="text" name="author" id="author" class="form-control" value="{{ $news->author }}">
            @error('author') <x-alert type="danger" :message="$message"></x-alert>@enderror
        </div>
        <div class="form-group">
            <label for="image">Изображение</label>
            <input type="file" name="image" id="image" class="form-control">
        </div>
        {{--        <div class="form-group">--}}
        {{--            <label for="status">Статус</label>--}}
        {{--            <select name="status" id="status" class="form-control">--}}
        {{--                <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>--}}
        {{--                <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>--}}
        {{--                <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>--}}
        {{--            </select>--}}
        {{--        </div>--}}

        <div class="form-group">
            <label for="description">Описание</label>
            <textarea type="text" name="description" id="description" class="form-control">{!! $news->description !!}</textarea>
            @error('description') <x-alert type="danger" :message="$message"></x-alert>@enderror
        </div>

        <br />
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
@push('js')
    <script>
        ClassicEditor
            .create( document.querySelector( '#description' ) )
            .catch( error => {
                console.error( error );
            } );
    </script>
@endpush
