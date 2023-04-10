@extends('layouts.app', ['title' => Auth::user()->name . '\'s Dashboard'])

@section('content')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <div class="container-full">
      <!-- Main content -->
      <section class="content">
          <div class="row">
              <div class="col-xl-4 col-12">
                  <div class="box box-body bg-primary">
                    <h4>
                      <span>Total Complains</span>
                      <span class="float-end"><a class="btn btn-xs btn-danger" href="{{ route('admin.complain.index', ['type' => 'all']) }}">View</a></span>
                    </h4>
                    <br>
                    <p class="fs-30">{{ count($complains) }}</p>
                    {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %18 decrease from last month</div> --}}
                  </div>
              </div>
              <div class="col-xl-4 col-12">
                  <div class="box box-body bg-info">
                    <h4>
                      <span>Pending Complains</span>
                      <span class="float-end"><a class="btn btn-xs btn-warning" href="{{ route('admin.complain.index', ['type' => 'pending']) }}">View</a></span>
                    </h4>
                    <br>
                    <p class="fs-30">{{ $data->complain_pending_count }}</p>
                    {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-danger me-1"></i> %95 down</div> --}}
                  </div>
              </div>
              <div class="col-xl-4 col-12">
                  <div class="box box-body bg-secondary">
                    <h4>
                      <span>Completed Complains</span>
                      <span class="float-end"><a class="btn btn-xs btn-primary" href="{{ route('admin.complain.index', ['type' => 'completed']) }}">View</a></span>
                    </h4>
                    <br>
                    <p class="fs-30">{{ $data->complain_completed_count }}</p>
                    {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %54 up</div> --}}
                  </div>
              </div>
              <div class="col-xl-4 col-12">
                <div class="box box-body bg-primary">
                    <h4>
                      <span>Faculties</span>
                      <span class="float-end"><a class="btn btn-xs btn-danger" href="{{ route('admin.faculty.index') }}">View</a></span>
                    </h4>
                    <br>
                    <p class="fs-30">{{ count($faculties) }}</p>
                    {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %18 decrease from last month</div> --}}
                </div>
              </div>

            <div class="col-xl-4 mx-auto col-12">
                <div class="box box-body bg-primary">
                  <h4>
                    <span>Departments</span>
                    <span class="float-end"><a class="btn btn-xs btn-danger" href="{{ route('admin.department.index') }}">View</a></span>
                  </h4>
                  <br>
                  <p class="fs-30">{{ count($departments) }}</p>
                  {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %18 decrease from last month</div> --}}
                </div>
            </div>
            <div class="col-xl-4 mx-auto col-12">
                <div class="box box-body bg-primary">
                  <h4>
                    <span>Offices</span>
                    <span class="float-end"><a class="btn btn-xs btn-danger" href="{{ route('admin.department.index') }}">View</a></span>
                  </h4>
                  <br>
                  <p class="fs-30">{{ count($offices) }}</p>
                  {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %18 decrease from last month</div> --}}
                </div>
            </div>

            <x-Admin.Student.Overview-Component />

            <x-Admin.Admin.Overview-Component />

            @include('layouts.widget.complain')
            @include('layouts.admin.student')
            @include('layouts.admin.office')
            @include('layouts.admin.department')
            @include('layouts.admin.faculty')
          </div>
      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
