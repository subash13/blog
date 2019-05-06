@extends('layouts.app')
@section('content')
    <div class="card card-primary">
        <div class="card-header">
            Tag
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Tag Name
                </th>
                <th>
                    Editing
                </th>
                <th>
                    Deleting
                </th>
                </thead>
                <tbody>@if($tags->count()>0)
                    @foreach($tags as $tag)
                        <tr>
                            <td> {{$tag['tag']}}</td>
                            <td>
                                <a href="{{route('tag.edit',['id'=>$tag['id']])}}" class="btn btn-sm btn-info">Edit</a>
                            </td>
                            <td>
                                <a href="{{route('tag.destroy',['id'=>$tag['id']])}}"
                                   class="btn btn-sm btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th class="text-center" colspan="5">No Tags yet.</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>

    </div>
@stop
