@extends('layouts.pagelayout')

@section('pagetitle', 'Produksi')
@section('sidebar')
<li class="nav-item">
    <a class="nav-link collapsed" href="/dashboard">
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
<div class="card">
    <div class="card-body">
        <h5 class="card-title">Form Edit Data</h5>

        <!-- Horizontal Form -->
        <form action="/hasilproduksi/update/{{$produksi->id_produksi}}" method="post">
            @csrf
            <input type="hidden" name="id_order" value="{{$produksi->id_order}}">
            <div class="row mb-3">
                <label class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10">
                    <select class="form-select" aria-label="Default select example" name="id_barang">
                        <option>Pilih Barang</option>
                        @foreach($barang as $row)
                        <option <?php if ($produksi->id_barang == $row->id_barang) echo "selected"; ?> value="{{$row->id_barang}}">{{$row->nama_barang}}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">First Quantity</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="first_qty" value="{{$produksi->first_qty}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Quantity</label>
                <div class="col-sm-10">
                    <?php 
                        if($produksi->qty != null){
                            echo "<input type='number' class='form-control' name='qty' value='{$produksi->qty}'>";
                        }else{
                            $quantity = $produksi->first_qty - $produksi->first_qty * 10/100;
                            echo "<input type='number' class='form-control' name='qty'>
                            <code>Jumlah reduce 10% = {$quantity}</code>";
                        }
                    ?>
                    <!-- <input type="number" class="form-control" name="qty" value="{{$produksi->qty}}"> -->
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Reject</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="reject_qty" value="{{$produksi->reject_qty}}">
                </div>
            </div>
            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger">Cancel</button></a>

            </div>
        </form><!-- End Horizontal Form -->
    </div>
</div>

@endsection