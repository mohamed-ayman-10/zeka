@extends('layouts.master')
@section('title', 'Update Remind Category')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Update Remind Category</h3>
            <a href="{{route('remind_category.index')}}" class="btn btn-primary text-light">Back</a>
        </div>
        <form action="{{route('remind_category.update', $remindCategory->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{old('name', $remindCategory->name)}}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" name="image" accept="image/*" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image">
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                        <img src="{{asset($remindCategory->image)}}" class="mt-2" alt="{{$remindCategory->name}}" style="width: 50px;height: 50px;">
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary text-light">Update</button>
            </div>
        </form>
    </div>

@endsection
