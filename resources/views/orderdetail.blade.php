@extends('layouts.pagelayout')

@section('pagetitle', 'Order Detail')
@section('sidebar')
<li class="nav-item">
  <a class="nav-link " href="/dashboard">
    <i class="bi bi-grid"></i>
    <span>Dashboard</span>
  </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
  <a class="nav-link collapsed" data-bs-target="#components-nav" href="/barang">
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

<!-- Order Card -->
<div class="col-xxl-4 col-xl-12">

  <div class="card info-card customers-card">
    <div class="card-body">
      <h5 class="card-title">Order</h5>

      <div class="d-flex align-items-center">
        <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
          <i class="bi bi-box"></i>
        </div>
        <div class="ps-3">
          <h6>{{$order->tgl}}</h6>
          <span class="text-muted small pt-2 ps-1">{{$order->keterangan}}</span>
        </div>
      </div>
      <br>
      <div class="d-flex align-items-center">
        <a href="/export/{{$order->id_order}}"><button type="button" class="btn btn-primary">Cetak Laporan</button></a>
      </div>
      <br><br>
      <div class="d-flex align-items-center">
        <h6>Produksi</h6>
      </div>
      <!-- Table with stripped rows -->
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Barang</th>
            <th scope="col">First Quantity</th>
            <th scope="col">Quantity</th>
            <th scope="col">Reject</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          @foreach($produksi as $row)
          <tr>
            <th scope="row"><?php $no++;
                            echo $no; ?></th>
            <td>{{$row->nama_barang}} ({{$row->warna}})</td>
            <td>{{$row->first_qty}}</td>
            <td>{{$row->qty}}</td>
            <td>{{$row->reject_qty}}</td>
            <!-- <td><a href="/pembelian/add/{{$row->id_produksi}}">
                <i class="bi bi-plus-circle"></i>
              </a></td> -->

            <td>
              <a href="/hasilproduksi/delete/{{$row->id_produksi}}">
                <button type="button" class="btn btn-outline-danger btn-sm">Hapus</button>
              </a>
              <a href="/hasilproduksi/edit/{{$row->id_produksi}}">
                <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
              </a>
              <a href="/hasilproduksi/detail/{{$row->id_produksi}}/{{$row->id_barang}}">
                <button type="button" class="btn btn-outline-warning btn-sm">Lihat</button>
              </a>
            </td>
          </tr>
          @endforeach
        </tbody>
      </table>
      <!-- End Table with stripped rows -->
      <div class="d-flex align-items-center">
        <h6><a href="/hasilproduksi/add/{{$order->id_order}}">
            <i class="bi bi-plus-circle"></i>
          </a></h6>
        <div class="ps-3">
          Tambah Data
        </div>
      </div>

      <!--  <br><br>
      <h6>Pembelian</h6>
      <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">No</th>
            <th scope="col">Tanggal</th>
            <th scope="col">Barang</th>
            <th scope="col">Aksesoris</th>
            <th scope="col">Jumlah</th>
            <th scope="col">Total</th>
          </tr>
        </thead>
        <tbody>
          <?php $no = 0; ?>
          @foreach($pembelian as $row)
          <tr>
            <th scope="row"><?php $no++;
                            echo $no; ?></th>
            <td>{{$row->tgl_pembelian}}</td>
            <td>{{$row->nama_barang}} ({{$row->warna}})</td>
            <td>{{$row->nama_aksesoris}}</td>
            <td>{{$row->jml_pembelian}}</td>
            <td>{{$row->total_harga}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>  -->
    </div>
  </div>

</div><!-- End Order Card -->


@endsection