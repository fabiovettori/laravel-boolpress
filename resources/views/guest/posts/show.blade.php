@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <strong>Titolo</strong>
                <p>{{ $post->title }}</p>

                <strong>Category</strong>
                <p class="d-flex align-center">{{ $post->category_id ?  $post->category->name : 'nd'}}
                    <a href="{{ $post->category_id ? route('category.show', ['slug' => $post->category->slug]) : '' }} ">
                        <span class="{{ $post->category_id ? 'fas fa-arrow-circle-right ml-2 text-dark' : 'd-none' }}"></span>
                    </a>
                </p>

                <strong>Slug</strong>
                <p>{{ $post->title }}</p>

                <strong>Description</strong>
                <p>{{ $post->description }}</p>

                <strong>Tags</strong>
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
            </div>
        </div>
    </div>
@endsection
