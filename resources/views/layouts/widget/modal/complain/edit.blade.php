
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
                                                                <input type="text" readonly value="{{ $complain->user->name }}" class="form-control" placeholder="Full Name">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="form-group">
                                                                <label class="form-label">Reg Number</label>
                                                                <input type="text" readonly value="{{ $complain->user->profile->reg_number }}" class="form-control" placeholder="Last Name">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row">
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">E-mail</label>
                                                            <input type="text" readonly value="{{ $complain->user->email }}" class="form-control" placeholder="E-mail">
                                                        </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                        <div class="form-group">
                                                            <label class="form-label">Contact Number</label>
                                                            <input type="text" readonly value="{{ $complain->user->profile->phone_number }}" class="form-control" placeholder="Phone">
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
