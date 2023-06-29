@extends('layouts.main')
@section('content')
    <div class="container">
        <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
            <h1 class="h2">Запросить информацию</h1>
        </div>

        <form method="post" action="{{ route('categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="name">Имя</label>
                <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
            </div>

            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" name="author" id="author" class="form-control" value="{{ old('author') }}">
            </div>

            <div class="form-group">
                <label for="email">e-mail</label>
                <input type="email" name="email" id="email" class="form-control" value="{{ old('email') }}">
            </div>

            <div class="form-group">
                <label for="description">Опишите, что хотите получить</label>
                <input type="text" name="description" id="description" class="form-control" value="{{ old('description') }}">
            </div>

            <br />
            <button type="submit" class="btn btn-success">Запросить</button>
        </form>
    </div>

@endsection
