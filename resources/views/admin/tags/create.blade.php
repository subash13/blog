@extends('layouts.app')
@section('content')
    @include('admin.includes.error')
    <div class="card card-primary">
        <div class="card-header">
            <h2> Create A New tag</h2>
        </div>
        <div class="card-body">
            <form action="{{route('tag.store')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="tag">tag Name</label>
                    <input type="text" name="tag" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Create New tag</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
