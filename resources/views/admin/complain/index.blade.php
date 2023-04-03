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
                    <span class="float-end"><a class="btn btn-xs btn-danger" href="{{ route('student.complain.index', ['type' => 'all']) }}">View</a></span>
                  </h4>
                  <br>
                  <p class="fs-30">{{ $data->complain_count }}</p>
                  {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %18 decrease from last month</div> --}}
                </div>
            </div>
            <div class="col-xl-4 col-12">
                <div class="box box-body bg-info">
                  <h4>
                    <span>Pending Complains</span>
                    <span class="float-end"><a class="btn btn-xs btn-warning" href="{{ route('student.complain.index', ['type' => 'pending']) }}">View</a></span>
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
                    <span class="float-end"><a class="btn btn-xs btn-primary" href="{{ route('student.complain.index', ['type' => 'completed']) }}">View</a></span>
                  </h4>
                  <br>
                  <p class="fs-30">{{ $data->complain_completed_count }}</p>
                  {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %54 up</div> --}}
                </div>
            </div>

             @include('layouts.widget.complain')
          </div>
      </section>
      <!-- /.content -->
</div>
<!-- /.content-wrapper -->
@endsection
