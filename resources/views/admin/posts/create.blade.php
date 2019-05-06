@extends('layouts.app')
@section('styles')
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@stop

@section('content')
    @include('admin.includes.error')
    <div class="card card-primary">
        <div class="card-header">
            <h2> Create A New Post</h2>
        </div>
        <div class="card-body">
            <form action="{{route('post.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="title"> Title </label>
                    <input type="text" name="title" class="form-control">
                </div>
                <div class="form-group">
                    <label for="featured">Featured Image</label>
                    <input type="file" name="featured" class="form-control">
                </div>
                <div class="form-group">
                    <label for="category ">Select A Category</label>
                    <select name="category_id" id="category " class="form-control">
                        @foreach($categories as $category)
                            <option value="{{$category->id}}">{{$category->name}}</option>
                        @endforeach
                    </select>
                </div>
                @foreach($tags as $tag)
                <div class="form-check">
                        <input class="form-check-input" type="checkbox" value="{{$tag['id']}}" name="tag[]">
                        <label class="form-check-label" for="tag">
                            {{$tag['tag']}}
                        </label>
                </div>
                @endforeach
                <div class="form-group">
                    <label for="contents">content</label>
                    <textarea name="contents" id="contents" cols="10" rows="10" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create New Post</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
@section('scripts')
    <!-- Include the Quill library -->
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

    <!-- Initialize Quill editor -->
    <script>
        var quill = new Quill('#contents', {
            theme: 'snow'
        });
    </script>
@stop
