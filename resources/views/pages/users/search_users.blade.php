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
                    <img src="{{asset($user->image)}}" alt="{{$user->first_name}}" style="height: 70px;width: 70px;">
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
{{--                            <a href="#" class="dropdown-item" data-bs-toggle="modal"--}}
{{--                               data-bs-target="#delete{{$user->id}}">--}}
{{--                                <i class="mdi mdi-delete text-danger"></i>--}}
{{--                                Delete--}}
{{--                            </a>--}}
                            <a class="dropdown-item" href="{{route('user.journey.index', $user->id)}}">
                                <i class="mdi mdi-bike text-primary"></i>
                                Journey
                            </a>
                        </div>
                    </div>
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="100">
                    <div class="alert alert-danger text-center m-0">No Data</div>
                </td>
            </tr>
        @endforelse
        </tbody>
    </table>
    <div class="mt-2 paginate">{{$users->links()}}</div>
</div>
