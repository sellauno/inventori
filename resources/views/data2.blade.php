<html>
<?php
// $total1 = 0;
// $total2 = 0;
// $total3 = 0;
$total1 = 0;
$total2 = 0;
$total3 = 0;
$totalP = array();
$totalU = array();
$totalE = array();
$jml_acc = 0;
$i = 0;
?>
<table border="1">
    <thead>
        <tr>
            <th colspan="5"> Double Safety Accessories</th>
        </tr>
        <tr>
            <th colspan="5"> Tgl : {{$order->tgl}}</th>
        </tr>
        <tr>
            <th colspan="2">Item Description</th>
            <th colspan="3">Item Quantity</th>
            @foreach($aksesoris as $acc)
            <th colspan="3">{{$acc->nama_aksesoris}}</th>
            @endforeach
        </tr>
        <tr>
            <th>Item's Type</th>
            <th>Item's Color</th>
            <th>First Qty</th>
            <th>10% Reduced</th>
            <th>Rejected Items</th>
            @foreach($aksesoris as $acc)
            <th>Purchased</th>
            <th>Used</th>
            <th>Estimated Left</th>
            <?php $jml_acc++; ?>
            @endforeach

            @for($z = 0; $z <$jml_acc; $z++) <?php
                                                $totalP[$z] = 0;
                                                $totalU[$z] = 0;
                                                $totalE[$z] = 0;
                                                ?> @endfor </tr>
    </thead>
    <tbody>
        @foreach($produksi as $pro)

        <tr>
            <th>{{$pro->nama_barang}}</th>
            <th>{{$pro->warna}}</th>
            <td>{{$pro->first_qty}}</td>
            <td>{{$pro->qty}}
                <?php $reduced = $pro->first_qty - (10 / 100 * $pro->first_qty);
                // echo $reduced; 
                ?>
            </td>
            <td>{{$pro->reject_qty}}</td>
            <?php
            // $totalP[$i] = 0;
            // $totalU[$i] = 0;
            // $totalE[$i] = 0;
            $total1 += $pro->first_qty;
            $total2 += $pro->qty;
            $total3 += $pro->reject_qty;
            $usedvar = 0;
            ?>
            <?php $tempused = -1; ?>
            @foreach($aksesoris as $acc)
            <?php $tempused++; $temp = 0; $id_acc = $acc->id_aksesoris;?>
            @foreach($pembelian as $beli)
            <?php
            if ($beli->id_barang == $pro->id_barang && $beli->id_aksesoris == $id_acc) {
                $temp = 1;
                echo "<td>" . $beli->jml_pembelian . "</td>";
                $totalP[$tempused] += $beli->jml_pembelian;

                $unused = $beli->jml_pembelian;
            ?>
                <td>
                    @foreach($used as $u)
                    <?php
                    if ($pro->id_barang == $u->id_barang && $beli->id_aksesoris == $u->id_aksesoris) {
                        $usedvar = ($pro->qty  * $u->jumlah) + ($pro->reject_qty  * $u->jumlah);
                        if ($pro->qty != null) {
                            $totalU[$tempused] += $usedvar;
                            echo $usedvar;
                        }
                    }

                    ?>
                    @endforeach
                </td>
                <td>
                    <?php
                    $left = $unused - $usedvar;
                    if ($unused != null) {
                        echo $left;
                    }
                    $totalE[$tempused] += $left;
                    ?>
                </td>
            <?php } ?>
            @endforeach
            <?php if ($temp == 0) {
                echo "
            <td></td>
            <td></td>
            <td></td>
            ";
            } ?>
            @endforeach
            <?php
            $i++; ?>
        </tr>
        @endforeach
        <tr>
            <th rowspan="2" colspan="2">Total</th>
            <td rowspan="2">{{$total1}}</td>
            <td rowspan="2">{{$total2}}</td>
            <td rowspan="2">{{$total3}}</td>
            @foreach($total as $row)
            <!-- <td rowspan="2">{{$row->jml}}</td>
                <td rowspan="2">{{$row->jml}}</td>
                <td rowspan="2">{{$row->jml}}</td> -->
            @endforeach
            <!-- <?php $a = 0; ?>
            @foreach($total as $pt)
            <td rowspan="2">(P) {{$pt->jml}}</td>
            <td rowspan="2">(U) {{$totalU[$a]}}</td>
            <td rowspan="2">(E) </td>
            <?php $a++; ?>
            @endforeach -->
            @for($a = 0; $a <$jml_acc; $a++) <td rowspan="2">{{$totalP[$a]}}</td>
                <td rowspan="2"></td>
                <td rowspan="2"></td>
                @endfor
        </tr>
    </tbody>
</table>

</html>