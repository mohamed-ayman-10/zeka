@extends('layouts.master')
@section('title', 'Users')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Users</h3>
            <input type="text" name="search" id="search" class="form-control w-25"
                   placeholder="Search Here...">
            <a href="{{route('user.create')}}" class="btn btn-primary text-light">Add New User</a>
        </div>
        <div class="card-body">
            <div class="table-responsive user-search">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Address</th>
                        <th>Image</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($users as $index=>$user)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$user->first_name . ' ' . $user->last_name}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->address}}</td>
                            <td>
                                <img src="{{asset($user->image)}}" alt="{{$user->first_name}}"
                                     style="height: 70px;width: 70px;">
                            </td>
                            <td>
                                <div class="dropdown">
                                    <a class="btn btn-secondary btn-sm dropdown-toggle" href="#"
                                       data-bs-toggle="dropdown"
                                       id="profileDropdown">
                                        <span class="">Action</span>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a class="dropdown-item" href="{{route('user.edit', $user->id)}}">
                                            <i class="mdi mdi-account-edit text-success"></i>
                                            Update
                                        </a>
                                        <a class="dropdown-item" href="#" data-bs-toggle="modal"
                                           data-bs-target="#delete{{$user->id}}">
                                            <i class="mdi mdi-delete text-danger"></i>
                                            Delete
                                        </a>
                                        <a class="dropdown-item" href="{{route('user.journey.index', $user->id)}}">
                                            <i class="mdi mdi-bike text-primary"></i>
                                            Journey
                                        </a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="delete{{$user->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete User</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('user.destroy', $user->id)}}" method="post">
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
                <div class="mt-2">{{$users->links()}}</div>
            </div>
        </div>
    </div>

@endsection

@section('scripts')
    <script>
        // Pagination
        $(document).on('click', '.paginate .pagination a', function (e) {
            e.preventDefault();
            var url = $(this).attr('href')
            $.ajax({
                url: url,
                success: function (res) {
                    $('.user-search').html(res);
                }
            })
        });


        // Search
        $(document).on('keyup', function (e) {
            e.preventDefault();
            let search_string = $('#search').val();
            $.ajax({
                url: "{{ route('user.search') }}",
                method: "GET",
                data: {
                    search_string: search_string
                },
                success: function (res) {
                    $('.user-search').html(res);
                    if (res.status == 'nothing_found') {
                        $('.user-search').html(
                            '<div class="alert alert-danger text-center m-0">No Data</div>');
                    }
                },
            });
        });
    </script>
@endsection
