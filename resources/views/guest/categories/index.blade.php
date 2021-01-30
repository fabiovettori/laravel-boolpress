@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h1> Categories </h1>
                <ul>
                    @foreach ($categories as $category)
                        <li>
                            <a class="text-capitalize" href="#"> {{ $category->name }} </a>
                        </li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection
