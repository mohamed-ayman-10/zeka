@extends('layouts.master')
@section('title', 'Add New Remind Category')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Add New Remind Category</h3>
            <a href="{{route('remind_category.index')}}" class="btn btn-primary text-light">Back</a>
        </div>
        <form action="{{route('remind_category.store')}}" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <div class="row">
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{old('name')}}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                    <div class="col-md-6 mb-3">
                        <label class="form-label" for="image">Image</label>
                        <input type="file" name="image" accept="image/*" id="image" class="form-control @error('image') is-invalid @enderror" placeholder="Image">
                        @error('image') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary text-light">Add</button>
            </div>
        </form>
    </div>

@endsection
