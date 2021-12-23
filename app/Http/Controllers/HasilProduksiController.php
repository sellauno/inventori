<?php

namespace App\Http\Controllers;

use App\HasilProduksi;
use App\Barang;
use App\Order;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class HasilProduksiController extends Controller
{
    public function toHasilProduksi()
    {
        $data = HasilProduksi::all();
        $data2 = Barang::all();
        return view('hasilproduksi', ['produksi' => $data, 'barang' => $data2]);
    }

    public function add()
    {
        $data = Barang::all();
        $data2 = Order::all();
        return view('hasilproduksiadd', ['barang' => $data, 'order' => $data2, 'id' => null]);
    }

    public function create(Request $request)
    {
        HasilProduksi::create([
            'id_order' => $request->id_order,
            'id_barang' => $request->id_barang,
            'first_qty' => $request->first_qty,
            'qty' => $request->qty,
            'reject_qty' => $request->reject_qty
        ]);
        // return redirect('/hasilproduksi');
        echo '<script type="text/javascript">'
  		   , 'history.go(-2);'
  		   , '</script>';
    }

    public function edit($id)
    {
        $data = HasilProduksi::find($id);
        $data2 = Barang::all();
        return view('hasilproduksiedit', ['produksi' => $data, 'barang' => $data2]);
    }

    public function update($id, Request $request)
    {
        $produksi = HasilProduksi::find($id);
        $produksi->id_order = $request->id_order;
        $produksi->id_barang = $request->id_barang;
        $produksi->first_qty = $request->first_qty;
        $produksi->qty = $request->qty;
        $produksi->reject_qty = $request->reject_qty;
        $produksi->save();
        // return redirect('/hasilproduksi');
        echo '<script type="text/javascript">'
  		   , 'history.go(-2);'
  		   , '</script>';
    }

    public function delete($id)
    {
        $produksi = HasilProduksi::find($id);
        $produksi->delete();
        // return redirect('/hasilproduksi');
        return back();        
    }

    public function detail($id, $idbrg)
    {
        $data = HasilProduksi::find($id);
        $barang = Barang::find($idbrg);
        $data2 = DB::table('pembelian')
            ->where('id_produksi', '=', $id)
            ->where('id_barang', '=', $idbrg)
            ->get();;
        $data3 = DB::table('kebutuhan')
            ->join('aksesoris', 'aksesoris.id_aksesoris', '=', 'kebutuhan.id_aksesoris')
            ->where('kebutuhan.id_barang', '=', $idbrg)
            ->get();
        return view('hasilproduksidetail', ['produksi' => $data, 'barang' => $barang, 'pembelian' => $data2, 'kebutuhan' => $data3]);
    }

    public function addFromOrder($id)
    {
        $data = Barang::all();
        $data2 = Order::all();
        return view('hasilproduksiadd', ['barang' => $data, 'order' => $data2, 'id' => $id]);
    }
}
