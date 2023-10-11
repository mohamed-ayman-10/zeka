@extends('layouts.master')
@section('title', 'Update User')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Update User</h3>
            <a href="{{route('user.index')}}" class="btn btn-primary text-light">Back</a>
        </div>
        <form action="{{route('user.update', $user->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="first_name">First Name <span class="text-danger">*</span></label>
                        <input type="text" name="first_name" value="{{old('first_name', $user->first_name)}}" id="first_name" class="form-control @error('first_name') is-invalid @enderror" placeholder="First Name">
                        @error('first_name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="last_name">Last Name <span class="text-danger">*</span></label>
                        <input type="text" name="last_name" value="{{old('last_name', $user->last_name)}}" id="last_name" class="form-control @error('last_name') is-invalid @enderror" placeholder="Last Name">
                        @error('last_name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="phone">Phone <span class="text-danger">*</span></label>
                        <input type="number" name="phone" value="{{old('phone', $user->phone)}}" id="phone" class="form-control @error('phone') is-invalid @enderror" placeholder="Phone">
                        @error('phone') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="email">Email <span class="text-danger">*</span></label>
                        <input type="email" name="email" value="{{old('email', $user->email)}}" id="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email">
                        @error('email') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="address">Address</label>
                        <input type="text" name="address" value="{{old('address', $user->address)}}" id="address" class="form-control @error('address') is-invalid @enderror" placeholder="Address">
                        @error('address') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" name="image" accept="image/*" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image">
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                        <img src="{{asset($user->image)}}" alt="{{$user->first_name}}" class="mt-2" style="height: 70px;width: 70px;">
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
                    <input type="hidden" name="id" value="{{$user->id}}">
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary text-light">Update</button>
            </div>
        </form>
    </div>

@endsection
