@extends('layouts.master')
@section('title', 'Users')
@section('content')
    <div class="card">
        <div class="card-header d-flex align-items-center justify-content-between">
            <h3 class="m-0">Journeys</h3>
            <input type="text" name="search" id="search" class="form-control w-25"
                   placeholder="Search Here...">
        </div>
        <div class="card-body">
            <div class="table-responsive journey-search">
                <table class="table table-bordered table-hover table-striped">
                    <thead>
                    <tr>
                        <th>#</th>
                        <th>Mile</th>
                        <th>Save</th>
                        <th>Start Address</th>
                        <th>End Address</th>
                        <th>Start Date</th>
                        <th>End Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                    </thead>
                    <tbody>
                    @forelse($journeys as $index=>$journey)
                        <tr>
                            <td>{{$index+1}}</td>
                            <td>{{$journey->mile}}</td>
                            <td>${{$journey->save}}</td>
                            <td>{{$journey->start_address}}</td>
                            <td>{{$journey->end_address}}</td>
                            <td>{{$journey->start_date}}</td>
                            <td>{{$journey->end_date}}</td>
                            <td>{{$journey->status}}</td>
                            <td>
                                <button type="button" class="btn btn-danger text-light btn-sm" data-bs-toggle="modal"
                                        data-bs-target="#delete{{$journey->id}}">
                                    <i class="mdi mdi-delete"></i>
                                </button>
                            </td>
                        </tr>
                        <!-- Modal Delete -->
                        <div class="modal fade" id="delete{{$journey->id}}" tabindex="-1"
                             aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Delete Journey</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                    </div>
                                    <form action="{{route('user.journey.destroy', $journey->id)}}" method="post"
                                          id="formDelete{{$journey->id}}">
                                        @csrf
                                        @method('delete')
                                        <div class="modal-body">
                                            <div class="alert alert-danger m-0">Are You Sure Delete?</div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                                Close
                                            </button>
                                            <button id="btnFormDelete{{$journey->id}}" type="submit" class="btn btn-primary text-light">
                                                Yse, Delete
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
                <div class="mt-2">{{$journeys->links()}}</div>
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
                    $('.journey-search').html(res);
                }
            })
        });


        // Search
        $(document).on('keyup', function (e) {
            e.preventDefault();
            let search_string = $('#search').val();
            $.ajax({
                url: "{{ route('user.journey.search') }}",
                method: "GET",
                data: {
                    search_string: search_string
                },
                success: function (res) {
                    $('.journey-search').html(res);
                    if (res.status == 'nothing_found') {
                        $('.journey-search').html(
                            '<div class="alert alert-danger text-center m-0">No Data</div>');
                    }
                },
            });
        });


    </script>
@endsection
