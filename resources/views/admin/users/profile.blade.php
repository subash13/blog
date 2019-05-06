@extends('layouts.app')
@section('content')
    @include('admin.includes.error')
    <div class="card card-primary">
        <div class="card-header">
            <h2> Edit Your Profile</h2>
        </div>
        <div class="card-body">
            <form action="{{route('profile.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" value="{{$user->name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" name="email"  value="{{$user->email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="password">New Password</label>
                    <input type="password" name="password" class="form-control">
                </div>
                <div class="form-group">
                    <label for="avatar">Upload Profile Picture</label>
                    <input type="file" name="avatar" class="form-control">
                </div>
                <div class="form-group">
                    <label for="about">About</label>
                    <textarea name="about" id="" cols="6" rows="6" class="form-control">{{$user->profile->about}}</textarea>
                </div>
                <div class="form-group">
                    <label for="facebook">FaceBook Profile</label>
                    <input type="text" value="{{$user->profile->facebook}}" name="facebook" class="form-control">
                </div>
                <div class="form-group">
                    <label for="youtube">YouTube Profile</label>
                    <input type="text" value="{{$user->profile->youtube}}" name="youtube" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update Profile</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
