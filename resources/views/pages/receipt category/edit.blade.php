@extends('layouts.master')
@section('title', 'Update Receipt Category')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Update Receipt Category</h3>
            <a href="{{route('receipt_category.index')}}" class="btn btn-primary text-light">Back</a>
        </div>
        <form action="{{route('receipt_category.update', $receiptCategory->id)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
            <div class="card-body">
                <div class="row">
                    <div class="col-md-12 mb-3">
                        <label class="form-label" for="name">Name<span class="text-danger">*</span></label>
                        <input type="text" name="name" value="{{old('name', $receiptCategory->name)}}" id="name" class="form-control @error('name') is-invalid @enderror" placeholder="Name">
                        @error('name') <small class="text-danger">{{$message}}</small> @enderror
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary text-light">Update</button>
            </div>
        </form>
    </div>

@endsection
