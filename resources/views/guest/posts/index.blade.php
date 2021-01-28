@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col lg 12">
                <h1>Posts</h1>
                <ul>
                    @foreach ($posts as $post)
                        <li>
                            <a href="#">
                                {{ $post->title }}
                            </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
