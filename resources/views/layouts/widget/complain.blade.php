<div class="col-12">
    <div class="box">
        <div class="box-header with-border">
            <h3 class="box-title">Complains</h3>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <div class="table-responsive">
                <table id="complains" class="table table-bordered table-striped" style="width:100%">
                    <thead>
                        <tr>
                            <th>S/N</th>
                            <th>Title</th>
                            <th>Department</th>
                            <th>Office</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($complains as $key => $complain)
                            <tr>
                                <td>{{ $key + 1 }}</td>
                                <td>{{ $complain->title }}</td>
                                <td>{{ $complain->office->department->name }}</td>
                                <td>{{ $complain->office->name }}</td>
                                <td>{{ $complain->status ? 'Attended' : 'Pending' }}</td>
                                <td>{{ date('F j, Y h:i:s A', strtotime($complain->created_at)) }}</td>
                                <td>
                                    @if (!$complain->status)
                                        <button type="button" id="edit" data-bs-toggle="modal" data-bs-target="#modal-edit-complain-{{ $complain->id }}" class="btn my-1 btn-sm btn-info">Edit</button>
                                    @endif
                                    <button type="button" data-bs-toggle="modal" data-bs-target="#modal-view-complain-{{ $complain->id }}" class="btn my-1 btn-sm btn-success">View</button>
                                    @if (Auth::user()->admin)
                                        <a href="{{ route('admin.complain.attend', ['id' => $complain->id]) }}" class="btn my-1 btn-sm btn-info">Attend</a>
                                        <a href="{{ route('admin.complain.delete', ['id' => $complain->id, 'soft' => 0]) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            @include('layouts.widget.modal.complain.edit')
                            @include('layouts.widget.modal.complain.view')
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <th>S/N</th>
                            <th>Name</th>
                            <th>Faculty</th>
                            <th>Added By</th>
                            <th>Status</th>
                            <th>Date</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                </table>
            </div>
        </div>
        <!-- /.box-body -->
    </div>
    <!-- /.box -->
</div>
