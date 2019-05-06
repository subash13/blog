@extends('layouts.app') @section('content')
    <div class="card card-primary">
        <div class="card-header">Users</div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                <th>Image</th>
                <th>Name</th>
                <th>permission</th>
                <th>Deleting</th>
                </thead>
                <tbody>@if($users->count()>0)
                    @foreach($users as $user)
                        <tr>
                            <td><img src="{{asset($user->profile->avatar)}}" alt="" width="60px" height="60px"></td>
                            <td> {{$user['name']}}</td>
                            <td>@if($user->admin)
                                    <a href="{{route('user.notadmin',['id'=>$user->id])}}"
                                       class="btn btn-sm btn-danger">
                                        Remove Permission</a>
                                @else
                                    <a
                                        href="{{route('user.admin',['id'=>$user->id])}}" class="btn btn-sm btn-success">Make
                                        Admin
                                    </a>
                                @endif
                            </td>
                            <td>
                                @if(Auth::id()!==$user->id);
                                <a href="{{route('user.destroy',['id'=>$user->id])}}" class="btn btn-sm btn-danger">
                                    Delete
                                </a>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <th colspan="5" class="text-center">Don't have single User yet</th>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div> @stop
