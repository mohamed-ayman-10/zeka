@extends('layouts.master')
@section('title', 'Remind Categories')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Remind Categories</h3>
            <a href="{{route('remind_category.create')}}" class="btn btn-primary text-light">Add New Remind Category</a>
        </div>
        <div class="card-body">
            <div class="table-responsive user-search">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($categories as $index=>$category)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$category->name}}</td>
                            <td>
                                <img src="{{asset($category->image)}}" alt="{{$category->first_name}}"
                                     style="height: 50px;width: 50px;">
                            </td>
                            <td>
                                <a href="{{route('remind_category.edit', $category->id)}}" class="btn btn-success btn-sm text-light">
                                    <i class="mdi mdi-pen"></i>
                                </a>
                                <button type="button" class="btn btn-danger btn-sm text-light" data-bs-toggle="modal"
                                   data-bs-target="#delete{{$category->id}}">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="delete{{$category->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Remind Category</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('remind_category.destroy', $category->id)}}" method="post">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-body">
                                            <div class="alert alert-danger m-0">Are You Sure Delete?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button type="submit" class="btn btn-primary text-light">Yse, Delete
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    @empty
                        <tr>
                            <td colspan="100">
                                <div class="alert alert-danger text-center m-0">No Data</div>
                            </td>
                        </tr>
                    @endforelse
                    </tbody>
                </table>
                <div class="mt-2">{{$categories->links()}}</div>
            </div>
        </div>
    </div>

@endsection

