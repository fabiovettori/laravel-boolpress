@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
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
                    <tr>
                        <th scope="row"> {{ $post->id }} </th>
                        <td> {{ $post->title }} </td>
                        <td> {{ $post->slug }} </td>
                        <td>
                            <a class="btn btn-info" href=" {{ route('admin.posts.index', $post->id) }}">back to index</a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
