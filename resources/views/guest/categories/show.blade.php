@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="text-capitalize">{{ $category->name }}</h1>
                <ul>
                    @foreach ($category->posts as $post)
                        <li>{{ $post->title }}</li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
