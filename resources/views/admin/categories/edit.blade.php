@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Редактировать категорию</h1>
    </div>

    <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
        @csrf
        @method('put')
        <div class="form-group">
            <label for="title">Заголовок</label>
            <input type="text" name="title" id="title" class="form-control" value="{{ $category->title }}">
        </div>
        <div class="form-group">
            <label for="description">Описание</label>
            <input type="text" name="description" id="description" class="form-control" value="{{ $category->description }}">
        </div>

        <br />
        <button type="submit" class="btn btn-success">Сохранить</button>
    </form>
@endsection
