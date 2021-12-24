@extends('layouts.pagelayout')

@section('pagetitle', 'Hasil Produksi')
@section('sidebar')
<li class="nav-item">
  <a class="nav-link collapsed" href="{{ route('dashboard') }}">
    <i class="bi bi-grid"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#components-nav" href="{{ route('barang') }}">
    <i class="bi bi-menu-button-wide"></i><span>Barang</span></i>
  </a>
</li><!-- End Barang Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#forms-nav" href="pembelian">
    <i class="bi bi-journal-text"></i><span>Pembelian</span>
  </a>
</li><!-- End Pembelian Nav -->

<li class="nav-item">
  <a class="nav-link " data-bs-target="#tables-nav" href="hasilproduksi">
    <i class="bi bi-layout-text-window-reverse"></i><span>Produksi</span>
  </a>
</li><!-- End Produksi Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#icons-nav" href="{{ route('aksesoris') }}">
    <i class="bi bi-gem"></i><span>Aksesoris</span>
  </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <a href="{{ route('hasilproduksiadd'}}">
        <button type="button" class="btn btn-primary">Tambah Data</button>
      </a>
    </div>

    <!-- Bordered Table -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Order</th>
          <th scope="col">Barang</th>
          <th scope="col">First Quantity</th>
          <th scope="col">Quantity</th>
          <th scope="col">Reject</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0; ?>
        @foreach($produksi as $row)
        <a href="{{ route('barang') }}">
          <tr>
            <th scope="row"><?php $no++;
                            echo $no; ?></th>
            <td>{{$row->id_order}}</td>
            <td>{{$row->id_barang}}</td>
            <td>{{$row->first_qty}}</td>
            <td>{{$row->qty}}</td>
            <td>{{$row->reject_qty}}</td>
            <td>
              <a href="{{ route('hasilproduksidelete', ['id' => $row->id_produksi]) }}">
                <button type="button" class="btn btn-outline-danger btn-sm">Hapus</button>
              </a>
              <a href="{{ route('hasilproduksiedit', ['id' => $row->id_produksi]) }}">
                <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
              </a>
              <a href="{{ route('hasilproduksidetail', ['id' => $row->id_produksi]) }}">
                <button type="button" class="btn btn-outline-warning btn-sm">Lihat</button>
              </a>
            </td>
          </tr>
        </a>
        @endforeach
      </tbody>
    </table>
    <!-- End Bordered Table -->
  </div>
</div>

@endsection