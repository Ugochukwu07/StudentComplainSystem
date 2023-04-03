
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
                                                  <dd class="text-white">{{ $complain->user->name }}</dd>
                                                  <dt class="text-info">Email</dt>
                                                  <dd class="text-white">{{ $complain->user->email }}</dd>
                                                  <dt class="text-info">Reg Number</dt>
                                                  <dd class="text-white">{{ $complain->user->profile->reg_number }}</dd>
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
