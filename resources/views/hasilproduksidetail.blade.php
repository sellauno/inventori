@extends('layouts.pagelayout')

@section('pagetitle', 'Produksi')
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
    <a class="nav-link collapsed" data-bs-target="#icons-nav" href="{{ route('aksesoris') }}">
        <i class="bi bi-gem"></i><span>Aksesoris</span>
    </a>
</li><!-- End Aksesoris Nav -->
@endsection

@section('content')

<div class="card info-card customers-card">
    <div class="card-body">
        <br>
        <h6>{{$barang->nama_barang}} ({{$barang->warna}})</h6>
    </div>
</div>
<!-- Default Table -->

@foreach($kebutuhan as $kbt)
<div class="card info-card customers-card">
    <div class="card-body">
        <div>
            <h5 class="card-title">{{$kbt->nama_aksesoris}}</h5>
        </div>
        <!-- Table with stripped rows -->
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Jumlah</th>
                    <th scope="col">Total</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $left = 0;
                $no = 0;
                $purchased = 0;
                $used = 0;
                ?>
                @foreach($pembelian as $row)
                <?php
                if ($kbt->id_aksesoris == $row->id_aksesoris) {
                ?>
                    <tr>
                        <th scope="row"><?php $no++;
                                        echo $no; ?></th>
                        <td>{{$row->tgl_pembelian}}</td>
                        <td>{{$row->jml_pembelian}}</td>
                        <td>{{$row->total_harga}}</td>
                        <td>
                            <a href="{{ route('pembeliandelete', ['id' => $row->id_pembelian]) }}">
                                <button type="button" class="btn btn-outline-danger btn-sm">Hapus</button>
                            </a>
                            <a href="{{ route('pembelianedit', ['id' => $row->id_pembelian]) }}">
                                <button type="button" class="btn btn-outline-primary btn-sm">Edit</button>
                            </a>
                        </td>
                    </tr>
                <?php
                    $purchased += $row->jml_pembelian;
                    $used = ($kbt->jumlah * $produksi->qty) + ($kbt->jumlah * $produksi->reject_qty);
                }
                $left = $purchased - $used;
                ?>
                @endforeach
            </tbody>
        </table>
        <?php
        // if ($no == 0) {
        //   echo "<p>Tidak ada data</p>";
        // }
        ?>

        <div class="d-flex align-items-center">
            <h6><a href="{{ route('pembelianadd', ['id' => $produksi->id_produksi, 'brg' => $produksi->id_barang, 'acc' => $kbt->id_aksesoris, 'no' => $no+=1]) }}">
                    <i class="bi bi-plus-circle"></i>
                </a></h6>
            <div class="ps-3">
                Tambah Data
            </div>
        </div>
        <br><br>
        <!-- List group With Contextual classes -->
        <ul class="list-group">
            <li class="list-group-item list-group-item-primary">Purchased &nbsp;: {{$purchased}}</li> <br>
            <li class="list-group-item list-group-item-success">Used &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;: {{$used}} </li> <br>
            <li class="list-group-item list-group-item-danger">Estimated Left &nbsp;: {{$left}} </li> <br>
        </ul><!-- End List Group With Contextual classes -->

    </div>
</div>

@endforeach
<!-- End Default Table Example -->


@endsection