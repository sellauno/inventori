@extends('layouts.pagelayout')

@section('pagetitle', 'Pembelian')
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
        <h5 class="card-title">Form Tambah Data</h5>

        <!-- Horizontal Form -->
        <form action="/pembelian/create" method="post">
            @csrf
            <?php if ($id != null) { ?>
                <input type="hidden" name="id_produksi" value="{{$id}}">
            <?php } ?>

            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Tanggal</label>
                <div class="col-sm-10">
                    <input type="date" class="form-control" name="tgl_pembelian" value="{{now()->format('Y-m-d')}}" required>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Barang</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_barang" value="{{$barang->id_barang}}">
                    <input type="text" class="form-control" value="{{$barang->nama_barang}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Aksesoris</label>
                <div class="col-sm-10">
                    <input type="hidden" class="form-control" name="id_aksesoris" value="{{$aksesoris->id_aksesoris}}" readonly>
                    <input type="text" class="form-control" value="{{$aksesoris->nama_aksesoris}}" readonly>
                </div>
            </div>
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Jumlah</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="jml_pembelian" id="jml_pembelian" required>
                    <input type="checkbox" id="same" name="same" onchange="addressFunction()" required />
                    <code>
                        Centang jika jumlah sudah benar
                    </code>
                </div>
            </div>
            <!-- <input type="text" size="5" id="value1" name="value1" class="value" />
            <input type="text" size="5" id="value2" name="value2" class="value" />

             <input type="text" size="5" id="total" readonly="readonly" class="bckground" name="total" />
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js">
                jQuery(document).ready(function($) {
                    var $total = $('#total'),
                        $value = $('.value');
                    $value.on('input', function(e) {
                        var total = 1;
                        $value.each(function(index, elem) {
                            if (!Number.isNaN(parseInt(this.value, 10)))
                                total = total * parseInt(this.value, 10);
                        });
                        $total.val(total);
                    });
                });
            </script> -->
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Total</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="total_harga" id="total" readonly>
                </div>
            </div>
            <!-- <script type="text/javascript">
                function myFunction() {
                    // Declare variables
                    var jml, harga, txtValue;
                    jml = document.getElementById("jml_pembelian");
                    harga = 10;
                    // document.getElementById("harga");

                    txtValue = jml * harga;

                    // Loop through all table rows, and hide those who don't match the search query
                    document.getElementById('total').value = txtValue;
                }
            </script> -->
            <div class="row mb-3">
                <label for="inputEmail3" class="col-sm-2 col-form-label">Nomor Pembelian</label>
                <div class="col-sm-10">
                    <input type="number" class="form-control" name="no_pembelian" value="{{$no}}" readonly>
                </div>
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary">Simpan</button>
                <button type="reset" class="btn btn-secondary">Reset</button>
                <a href="{{ url()->previous() }}"><button type="button" class="btn btn-danger">Cancel</button></a>

            </div>
        </form><!-- End Horizontal Form -->
        <?php $total = $aksesoris->harga?>
        <script>
            function addressFunction() {
                if (document.getElementById(
                        "same").checked) {
                            $x = document.getElementById(
                            "jml_pembelian").value;
                            $total = $x * <?php echo $aksesoris->harga;?>;
                    document.getElementById(
                            "total").value = $total;
                } else {
                    document.getElementById(
                        "total").value = "";
                }
            }
        </script>
    </div>
</div>

@endsection