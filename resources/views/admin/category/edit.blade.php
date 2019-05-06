@extends('layouts.app')
@section('content')
    @include('admin.includes.error')
    <div class="card card-primary">
        <div class="card-header">
            <h2> Update Category</h2>
        </div>
        <div class="card-body">
            <form action="{{route('category.update',['id'=>$category['id']])}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Category Name</label>
                    <input type="text" name="name" value="{{$category['name']}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create New Category</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
