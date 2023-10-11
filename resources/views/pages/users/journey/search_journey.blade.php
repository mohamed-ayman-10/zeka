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
    <div class="mt-2">{{$journeys->links()}}</div>
</div>
