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
                                        <a href="{{ route('admin.complain.delete', ['id' => $complain->id, 'soft' => 0]) }}" class="btn my-1 btn-sm btn-danger">Delete</a>
                                    @endif
                                </td>
                            </tr>
                            <!-- Modal -->
                            <div class="modal center-modal fade" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true" id="modal-edit-complain-{{ $complain->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="row">
                                            @foreach ($errors->all() as $error)
                                                <div class="col-12 text-danger">{{ $error }}</div>
                                            @endforeach
                                        </div>
                                        <form class="form" method="POST" action="{{ route('student.complain.edit.save', ['id' => $complain->id]) }}" >
                                            <div class="modal-header">
                                                <h5 class="modal-title">Update complain</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            @csrf
                                            <div class="modal-body">
                                                <div class="box-body">
                                                    <h4 class="box-title text-info mb-0"><i class="ti-user me-15"></i> About Student</h4>
                                                    <hr class="my-15">
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Full Name</label>
                                                                <input type="text" readonly value="{{ Auth::user()->name }}" class="form-control" placeholder="Full Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Reg Number</label>
                                                                <input type="text" readonly value="{{ Auth::user()->profile->reg_number }}" class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">E-mail</label>
                                                            <input type="text" readonly value="{{ Auth::user()->email }}" class="form-control" placeholder="E-mail">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Contact Number</label>
                                                            <input type="text" readonly value="{{ Auth::user()->profile->phone_number }}" class="form-control" placeholder="Phone">
                                                        </div>
                                                        </div>
                                                    </div>
                                                    <h4 class="box-title text-info mb-0 mt-20"><i class="ti-envelope me-15"></i> Complains</h4>
                                                    <hr class="my-15">
                                                    <div class="form-group">
                                                        <label class="form-label">To Office</label>
                                                        <select name="office_id" class="form-select">
                                                            <option>Select Office</option>
                                                            @foreach ($offices as $office)
                                                                <option {{ (($complain->office_id == $office->id) || (old('office_id') == $office->id)) ? 'selected' : '' }} value="{{ $office->id }}">{{ $office->department->name }} - {{ $office->name }}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Title</label>
                                                        <input class="form-control" type="text" name="title" value="{{ old('title') ?? $complain->title }}" placeholder="I wish to...">
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="form-label">Complain</label>
                                                        <textarea rows="10" name="complain" class="form-control" placeholder="Complain Text Here...">{{ old('complain') ?? $complain->complain }}</textarea>
                                                    </div>
                                                </div>
                                                <!-- /.box-body -->
                                            </div>
                                            <div class="modal-footer" style="width: 100%;">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                                <button type="submit" class="btn btn-primary float-end">Update</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal -->
                            <div class="modal center-modal fade" data-backdrop="static" data-keyboard="false"  aria-labelledby="staticBackdropLabel" aria-hidden="true" id="modal-view-complain-{{ $complain->id }}" tabindex="-1">
                                <div class="modal-dialog modal-dialog-scrollable">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Complain Details</h5>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <div class="box-body">
                                                <dl>
                                                  <dt class="text-info">Name</dt>
                                                  <dd class="text-white">{{ Auth::user()->name }}</dd>
                                                  <dt class="text-info">Email</dt>
                                                  <dd class="text-white">{{ Auth::user()->email }}</dd>
                                                  <dt class="text-info">Reg Number</dt>
                                                  <dd class="text-white">{{ Auth::user()->profile->reg_number }}</dd>
                                                  <dt class="text-info">Title</dt>
                                                  <dd class="text-white">{{ $complain->title  }}</dd>
                                                  <dt class="text-info">Complain</dt>
                                                  <dd class="text-white">{{ $complain->complain }}</dd>
                                                  <dt class="text-info">Complained On</dt>
                                                  <dd class="text-white">{{ date('F j, Y h:i:s A', strtotime($complain->created_at)) }}</dd>
                                                  <dt class="text-info">Complain Status</dt>
                                                  <dd class="text-white">{!! $complain->status ? '<span class="text-success"><i class="fa fa-check-circle mr-2"></i>Attended</span>' : '<span class="text-warning"><i class="fa fa-refresh mr-2"></i>Pending</span>' !!}</dd>
                                                  <dt class="text-info">Resolved By</dt>
                                                  <dd class="text-white">{!! $complain->status ? '<span class="text-success"><i class="fa fa-check-circle mr-2"></i>' . $complain->resolvedBy->name . '</span>' : '<span class="text-warning"><i class="fa fa-refresh mr-2"></i>Pending</span>' !!}</dd>
                                                </dl>
                                            </div>
                                        </div>
                                        <div class="modal-footer modal-footer-uniform">
                                            <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Close</button>
                                            {{-- @if (!$complain->status)
                                                <button type="button" data-bs-toggle="modal" data-bs-target="#modal-edit-complain-{{ $complain->id }}" class="btn my-1 btn-sm btn-info">Edit</button>
                                            @endif --}}
                                        </div>
                                    </div>
                                </div>
                            </div>
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
