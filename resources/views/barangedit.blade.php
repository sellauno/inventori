@extends('layouts.pagelayout')

@section('pagetitle', 'Barang')
@section('sidebar')
<li class="nav-item">
    <a class="nav-link collapsed" href="dashboard">
        <i class="bi bi-grid"></i>
        <span>Dashboard</span>
    </a>
</li><!-- End Dashboard Nav -->

<li class="nav-item">
    <a class="nav-link " data-bs-target="#components-nav" href="barang">
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
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Edit Data</h5>

        <!-- Horizontal Form -->
        <form action="barang/update/{{$barang->id_barang}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="id" value="{{$barang->id_barang}}"></br>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nama</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="nama_barang" value="{{$barang->nama_barang}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Warna</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="warna" value="{{$barang->warna}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Kebutuhan Aksesoris</legend>
                <div class="col-sm-10">
                    @foreach($kebutuhan as $row)
                    <div class="form-check">
                        <input type="hidden" name="id_kebutuhan[]" value="{{$row->id_kebutuhan}}" readonly>
                        <!-- <input type="text" name="id_aksesoris[]" value="{{$row->id_aksesoris}}" readonly> -->
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="id_aksesoris[]" value="{{$row->id_aksesoris}}" checked>
                        <label class="form-check-label" for="gridCheck1">
                            {{$row->nama_aksesoris}}
                        </label>
                        <input type="number" name="jumlah[]" placeholder="Jumlah" value="{{$row->jumlah}}">
                        <br><br>
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="row mb-3">
                <legend class="col-form-label col-sm-2 pt-0">Tambah Kebutuhan Aksesoris</legend>
                <div class="col-sm-10">
                    @foreach($aksesoris as $row)
                    <div class="form-check">
                        <input class="form-check-input" type="checkbox" id="gridCheck1" name="id_aksesorisadd[]" value="{{$row->id_aksesoris}}">
                        <label class="form-check-label" for="gridCheck1">
                            {{$row->nama_aksesoris}}
                        </label>
                        <input type="number" name="jumlahadd[]" placeholder="Jumlah">
                    </div>
                    @endforeach
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="aksesoris"><button type="button" class="btn btn-danger">Cancel</button></a>
            </div>
        </form><!-- End Horizontal Form -->

    </div>
</div>

@endsection