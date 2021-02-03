@extends('layouts.dashboard')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12">
            <h1>Add Post</h1>
            <div class="col-lg-12 text-right">
                <a class="btn btn-info text-uppercase text-white font-weight-bold" href=" {{ route('admin.posts.index') }}">
                    <i class="fas fa-arrow-circle-left"></i>
                    back to index</a>
            </div>
            <form action="{{ route('admin.posts.store')}}" method="POST">
                @csrf
                @method('POST')
                <div class="form-row form-group">
                    <div class="col-6">
                        <label class="font-weight-bold">Author</label>
                        @error('author')
                            <span class="text-danger ml-2">({{ $message }})</span>
                        @enderror
                        <input type="text" class="form-control" name="author" maxlength="50" required value="{{ old('author') }}">
                    </div>

                    <div class="col-6">
                        <label class="font-weight-bold">Contributor</label>
                        @error('contributor')
                            <span class="text-danger ml-2">({{ $message }})</span>
                        @enderror
                        <input type="text" class="form-control" name="contributor" maxlength="50" value="{{ old('contributor') }}">
                    </div>
                </div>

                <div class="form-row form-group">
                    <div class="col-9">
                        <label class="font-weight-bold">Title</label>
                        @error('title')
                            <span class="text-danger ml-2">({{ $message }})</span>
                        @enderror
                        <input type="text" class="form-control" name="title" maxlength="100" required value="{{ old('title') }}">
                    </div>

                    <div class="col-3">
                        <label class="font-weight-bold">Category</label>
                        @error('category_id')
                            <span class="text-danger ml-2">({{ $message }})</span>
                        @enderror
                        <select class="custom-select" name="category_id">
                            <option selected disabled value="">Choose category</option>
                            @foreach ($categories as $category)
                                <option class="text-capitalize" value="{{ $category->id }} {{ old('category_id') == $category->id ? 'selected' : '' }}"> {{ $category->name }} </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-row form-group">
                    <div class="col-12">
                        <label class="font-weight-bold">Slug</label>
                        @error('slug')
                            <span class="text-danger ml-2">({{ $message }})</span>
                        @enderror
                        <input type="text" class="form-control" name="slug" maxlength="100" required value="{{ old('slug') }}">
                    </div>
                </div>

                <div class="form-row form-group">
                    <div class="col-12">
                        <label class="font-weight-bold">Topic</label>
                        @error('topic')
                            <span class="text-danger ml-2">({{ $message }})</span>
                        @enderror
                        <input type="text" class="form-control" name="topic" maxlength="100" required value="{{ old('topic') }}">
                    </div>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Description</label>
                    @error('description')
                        <span class="text-danger ml-2">({{ $message }})</span>
                    @enderror
                    <textarea class="form-control" rows="8" name="description">{{ old('description') }}"</textarea>
                </div>

                <div class="form-group">
                    <label class="font-weight-bold">Tags</label>
                    @error('tags')
                        <span class="text-danger ml-2">({{ $message }})</span>
                    @enderror
                    <div class="d-flex">
                        @foreach ($tags as $tag)
                            <div class="custom-control custom-checkbox mr-2">
                                <input type="checkbox" class="custom-control-input" id="{{ $tag->slug }}" name="tags[]" value="{{$tag->id}}" {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                                <label class="text-capitalize custom-control-label" for="{{ $tag->slug }}">{{ $tag->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <button type="submit" class="btn btn-success px-4 text-uppercase text-white font-weight-bold">
                    Edit
                    <span class="fas fa-check"></span>
                </button>
            </form>
        </div>
    </div>
</div>
@endsection
