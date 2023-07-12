@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">News</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.news.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Add news</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Categories</th>
                <th>Title</th>
                <th>Author</th>
                <th>Date created</th>
                <th>Actions</th>
            </tr>
            @foreach($newsList as $news)
                <tr>
                    <th>#{{ $news->id }}</th>
                    <th>#{{ $news->categories->map(fn($item) => $item->id) }}</th>
                    <th>{{ $news->title }}</th>
                    <th>{{ $news->author }}</th>
                    <th>{{ $news->created_at }}</th>
                    <td><a href="{{ route('admin.news.edit', ['news' => $news]) }}">Edit</a>&nbsp; <a href="javascript:;" style="color:red">Delete</a> </td>
                </tr>
            @endforeach
        </table>

        {{ $newsList->links() }}
    </div>
@endsection
