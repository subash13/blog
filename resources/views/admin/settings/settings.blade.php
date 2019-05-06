@extends('layouts.app')
@section('content')
    @include('admin.includes.error')
    <div class="card card-primary">
        <div class="card-header">
            <h2> Edit Blog Setting</h2>
        </div>
        <div class="card-body">
            <form action="{{route('settings.update')}}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <label for="site_name">Site Name</label>
                    <input type="text" name="site_name" value="{{$setting->site_name}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_number">Contact Number</label>
                    <input type="text" name="contact_number" value="{{$setting->contact_number}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="contact_email">Contact Email</label>
                    <input type="email" name="contact_email" value="{{$setting->contact_email}}" class="form-control">
                </div>
                <div class="form-group">
                    <label for="address">Address</label>
                    <input type="text" name="address" value="{{$setting->address}}" class="form-control">
                </div>
                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@stop
