@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <strong>Titolo</strong>
                <p>{{ $post->title }}</p>

                <strong>Category</strong>
                <p>{{ $post->category->name }}</p>

                <strong>Slug</strong>
                <p>{{ $post->title }}</p>

                <strong>Description</strong>
                <p>{{ $post->description }}</p>
            </div>
        </div>
    </div>
@endsection
