<div class="col-xl-4 mx-auto col-12">
    <div class="box box-body bg-primary">
      <h4>
        <span>Admins</span>
        <span class="float-end"><a class="btn btn-xs btn-danger" href="{{ route('admin.admin.all') }}">View</a></span>
      </h4>
      <br>
      <p class="fs-30">{{ count($admins()) }}</p>
      {{-- <div class="fs-16"><i class="ion-arrow-graph-down-right text-white me-1"></i> %18 decrease from last month</div> --}}
    </div>
</div>
