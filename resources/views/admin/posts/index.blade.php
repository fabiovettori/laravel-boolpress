@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>All Posts</h1>
            <div class="text-right mb-2 text-uppercase">
                <a class="btn px-3 mx-1 bg-info text-white font-weight-bold" href=" {{ route('admin.posts.create') }}">
                    <span class="fas fa-plus pr-2"></span>
                    Add new post
                </a>
            </div>
            <table class="table table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Titolo</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tags</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($posts as $post)
                        <tr>
                            <th scope="row"> {{ $post->id }} </th>
                            <td> {{ $post->title }} </td>
                            <td> {{ $post->category ? $post->category->name : 'nd' }} </td>
                            <td>
                                @forelse ($post->tags as $tag)
                                    @if ($post->tags)
                                        <span>{{ $tag->name }}, </span>

                                        @if ($loop->last)
                                            <span>{{ $tag->name }}</span>
                                        @endif

                                    @endif
                                @empty
                                    <span>nd</span>
                                @endforelse
                            </td>
                            <td class="d-flex justify-content-between">
                                <a class="btn shadow-sm py-1 px-2" href=" {{ route('admin.posts.show', [$post->id]) }}">
                                    <span class="far fa-eye"></span>
                                </a>
                                <a class="btn shadow-sm py-1 px-2 mx-1" href=" {{ route('admin.posts.edit', [$post->id]) }}">
                                    <span class="far fa-edit"></span>
                                </a>
                                <form class="" action="{{ route('admin.posts.destroy', [$post->id]) }}" method="post">
                                    @csrf
                                    @method('delete')
                                    <button class="btn shadow-sm py-1 px-2" type="submit" name="button">
                                        <span class="far fa-trash-alt"></span>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
