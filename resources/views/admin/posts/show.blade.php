@extends('layouts.dashboard')

@if (session('status'))
    <div class="alert alert-success m-0">
        {{ session('status') }}
    </div>

@elseif (session('error'))
    <div class="alert alert-danger m-0">
        {{ session('error') }}
    </div>

@endif

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 text-right">
            <a class="btn btn-info" href=" {{ route('admin.posts.index') }}">
                <i class="fas fa-arrow-circle-left"></i>
                back to index</a>
        </div>
        <div class="col-lg-12">
            <strong>Titolo</strong>
            <p>{{ $post->title }}</p>

            <strong>Slug</strong>
            <p>{{ $post->title }}</p>

            <strong>Description</strong>
            <p>{{ $post->description }}</p>
        </div>
        <div class="col-lg-12 d-flex">
            <a class="btn btn-warning p-1 mx-1" href=" {{ route('admin.posts.edit', [$post->id]) }}">
                <span class="far fa-edit"></span>
            </a>
            <form class="" action="{{ route('admin.posts.destroy', [$post->id]) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn btn-danger p-1" type="submit" name="button">
                    <span class="far fa-trash-alt"></span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
