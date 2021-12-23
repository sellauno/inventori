@extends('layouts.pagelayout')

@section('pagetitle', 'Dashboard')
@section('sidebar')
<li class="nav-item">
  <a class="nav-link " href="dashboard">
    <i class="bi bi-grid"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#components-nav" href="barang">
    <i class="bi bi-menu-button-wide"></i><span>Barang</span></i>
  </a>
</li><!-- End Barang Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#icons-nav" href="aksesoris">
    <i class="bi bi-gem"></i><span>Aksesoris</span>
  </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')
<div class="card-body">
  <div class="card-title">
    <a href="order/add">
      <button type="button" class="btn btn-primary">Tambah Data</button>
    </a>
  </div>
</div>
<!-- Order Card -->
@foreach($order as $row)
<div class="col-xxl-4 col-xl-12">
  <div class="card info-card customers-card">
    <a href="orderdetail/{{$row->id_order}}">
    <div class="card-body">
      <!-- <h5 class="card-title">{{$row->kode_order}}</h5> -->
      <h5 class="card-title"></h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-box"></i>
        </div>
        <div class="ps-3">
          <h6>{{$row->tgl}}</h6>
          <span class="text-muted small pt-2 ps-1">{{$row->keterangan}}</span>
        </div>
      </div>

    </div>
    </a>
  </div>
</div>
@endforeach
<!-- End Order Card -->

<!-- Hasil Produksi Card -->

@endsection