@extends('layouts.master')
@section('title', 'Profile')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Profile</h3>
        </div>
        <form action="{{route('profile.update')}}" method="post">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="name">Name <span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{old('name', $admin->name)}}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="username">Username <span class="text-danger">*</span></label>
                        <input type="text" name="username" value="{{old('username', $admin->username)}}" id="username" class="form-control @error('username') is-invalid @enderror" placeholder="Username">
                        @error('username') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-4 mb-3">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{old('email', $admin->email)}}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="password">Password</label>
                        <input type="password" name="password" value="{{old('password')}}" id="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                        @error('password') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="password_confirmation">Confirm Password</label>
                        <input type="password" name="password_confirmation" value="{{old('password_confirmation')}}" id="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Confirm Password">
                        @error('password_confirmation') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary text-light">Update</button>
            </div>
        </form>
    </div>


@endsection
