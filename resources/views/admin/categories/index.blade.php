@extends('layouts.admin')
@section('content')
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1 class="h2">Category</h1>
        <div class="btn-toolbar mb-2 mb-md-0">
            <div class="btn-group me-2">
                <a href="{{ route('admin.categories.create') }}" type="button" class="btn btn-sm btn-outline-secondary">Add category</a>
            </div>
        </div>
    </div>

    <div class="table-responsive">
        @include('admin.message')
        <table class="table table-bordered">
            <tr>
                <th>#ID</th>
                <th>Title</th>
                <th>Description</th>
                <th>Date created</th>
                <th>Actions</th>
            </tr>
            @foreach($categoryList as $category)
                <tr>
                    <th>#{{ $category->id }}</th>
                    <th>{{ $category->title }}</th>
                    <th>{{ $category->description }}</th>
                    <th>{{ $category->created_at }}</th>
                    <td><a href="{{ route('admin.categories.edit', ['category' => $category]) }}">Edit</a>&nbsp; <a href="javascript:;" style="color:red">Delete</a> </td>
                </tr>
            @endforeach
        </table>
    </div>
@endsection
