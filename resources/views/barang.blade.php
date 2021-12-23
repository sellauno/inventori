@extends('layouts.pagelayout')

@section('pagetitle', 'Barang')
@section('sidebar')
<li class="nav-item">
  <a class="nav-link collapsed" href="/dashboard">
    <i class="bi bi-grid"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
  <a class="nav-link " data-bs-target="#components-nav" href="/barang">
    <i class="bi bi-menu-button-wide"></i><span>Barang</span></i>
  </a>
</li><!-- End Barang Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#icons-nav" href="/aksesoris">
    <i class="bi bi-gem"></i><span>Aksesoris</span>
  </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')
<div class="card">
  <div class="card-body">
    <div class="card-title">
      <a href="barang/add">
        <button type="button" class="btn btn-primary">Tambah Data</button>
      </a>
    </div>

    <!-- Bordered Table -->
    <table class="table table-bordered">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Nama Barang</th>
          <th scope="col">Warna</th>
          <th scope="col">Detail</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        <?php $no = 0; ?>
        @foreach($barang as $row)
        <tr>
          <th scope="row"><?php $no++;
                          echo $no; ?></th>
          <td>{{$row->nama_barang}}</td>
          <td>{{$row->warna}}</td>
          <td>{{$row->detail}}</td>
          <td>
            <a href="/barang/delete/{{$row->id_barang}}">
              <button type="button" class="btn btn-outline-danger btn-sm">Hapus</button>
            </a>
            <a href="/barang/edit/{{$row->id_barang}}">
              <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
            </a>
          </td>
        </tr>
        @endforeach
      </tbody>
    </table>
    <!-- End Bordered Table -->
  </div>
</div>

@endsection
