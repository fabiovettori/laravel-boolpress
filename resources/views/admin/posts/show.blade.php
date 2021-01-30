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
        <h1>Post Details</h1>
        <div class="col-lg-12 text-right">
            <a class="btn btn-info text-uppercase text-white font-weight-bold" href=" {{ route('admin.posts.index') }}">
                <i class="fas fa-arrow-circle-left"></i>
                back to index</a>
        </div>
        <div class="col-lg-12">
            <strong>Titolo</strong>
            <p>{{ $post->title }}</p>

            <strong>Slug</strong>
            <p>{{ $post->slug }}</p>

            <strong>Description</strong>
            <p>{{ $post->description }}</p>

            <strong>Category</strong>
            <p>{{ $post->category ? $post->category->name : 'nd' }}</p>
        </div>
        <div class="col-lg-12 d-flex m-0">
            <a class="btn shadow-sm text-dark py-2 px-3 mx-1 text-uppercase font-weight-bold" href=" {{ route('admin.posts.edit', [$post->id]) }}">
                <span class="far fa-edit"></span>
                Modifica
            </a>
            <form class="" action="{{ route('admin.posts.destroy', [$post->id]) }}" method="post">
                @csrf
                @method('delete')
                <button class="btn shadow-sm text-dark py-2 px-3 text-uppercase font-weight-bold" type="submit" name="button">
                    <span class="far fa-trash-alt "></span>
                    Elimina
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
