@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <form action="{{ route('admin.posts.update', ['post'=> $post->id]) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-row form-group">
                    <div class="col-6">
                        <label class="font-weight-bold">Author</label>
                        <input type="text" class="form-control" value=" {{ $post->author }}" name="author">
                    </div>

                    <div class="col-6">
                        <label class="font-weight-bold">Contributor</label>
                        <input type="text" class="form-control" value=" {{ $post->contributor }}" name="contributor">
                    </div>
                </div>

                <div class="form-row form-group">
                    <div class="col-9">
                        <label class="font-weight-bold">Title</label>
                        <input type="text" class="form-control" value=" {{ $post->title }} " name="title">
                    </div>

                    <div class="col-3">
                        <label class="font-weight-bold">Category</label>
                        <select class="custom-select" name="category_id">
                            <option selected disabled value="">Choose category</option>
                            @foreach ($categories as $category)
                                <option class="text-capitalize" value="{{ $category->id }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row form-group">
                    <div class="col-12">
                        <label class="font-weight-bold">Slug</label>
                        <input type="text" class="form-control" value="{{ $post->slug }}" name="slug">
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Description</label>
                    <textarea class="form-control" rows="8" name="description">{{ $post->description }}</textarea>
                </div>

                <button type="submit" class="btn btn-success px-4">Edit</button>
            </form>
        </div>
    </div>
</div>
@endsection
