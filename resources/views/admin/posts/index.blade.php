@extends('layouts.app')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            Post
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Image
                </th>
                <th>
                    Title
                </th>
                <th>
                    Editing
                </th>
                <th>
                    Deleting
                </th>
                </thead>
                <tbody>
                @if($posts->count()>0)
                    @foreach($posts as $post)
                        <tr>
                            <td><img src="{{$post->featured}}" alt="{{$post->title}}" width="50px" height="50px"></td>
                            <td> {{$post['title']}}</td>
                            <td>
                                <a href="{{route('post.edit',['id'=>$post['id']])}}"
                                   class="btn btn-sm btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="{{route('post.destroy',['id'=>$post['id']])}}" class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">Don't have single post yet</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

    </div>
@stop
