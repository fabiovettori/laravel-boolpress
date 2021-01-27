@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Slug</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row"> {{ $post->id }} </th>
                            <td> {{ $post->title }} </td>
                            <td> {{ $post->slug }} </td>
                            <td>
                                <a class="btn btn-info p-1" href=" {{ route('admin.posts.show', $post->id) }}">
                                    <span class="far fa-eye"></span>
                                </a>
                                <a class="btn btn-warning p-1" href=" {{ route('admin.posts.edit', $post->id) }}">
                                    <span class="far fa-edit"></span>
                                </a>
                                <a class="btn btn-danger p-1" href=" {{ route('admin.posts.destroy', $post->id) }}">
                                    <span class="far fa-trash-alt"></span>
                                </a>
                                <a class="btn btn-success p-1" href=" {{ route('admin.posts.create') }}">
                                    <span class="far fa-plus-square"></span>
                                </a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
