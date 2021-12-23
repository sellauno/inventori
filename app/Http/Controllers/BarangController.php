<?php

namespace App\Http\Controllers;

use App\Aksesoris;
use App\Barang;
use App\Kebutuhan;
use Illuminate\Http\Request;
use \Illuminate\Support\Facades\DB;

class BarangController extends Controller
{
    public function toBarang()
    {
        $data = Barang::all();
        return view('barang', ['barang' => $data]);
    }
    public function add()
    {
        $data = Aksesoris::all();
        return view('barangadd', ['aksesoris' => $data]);
    }

    public function create(Request $request)
    {
        $id = Barang::insertGetId([
            'nama_barang' => $request->nama_barang,
            'warna' => $request->warna
        ]);

        foreach ($request->id_aksesoris as $key  => $value) {
            Kebutuhan::create([
                'id_barang' => $id,
                'id_aksesoris' => $request->id_aksesoris[$key],
                'jumlah' => $request->jumlah[$key]
            ]);
        }
        return redirect('/barang');
    }

    public function edit($id)
    {
        $data = Barang::find($id);
        $data2 = DB::table('kebutuhan')
            ->join('aksesoris', 'aksesoris.id_aksesoris', '=', 'kebutuhan.id_aksesoris')
            ->where('kebutuhan.id_barang', '=', $id)->get();
        // $data3 = Aksesoris::all();
        $datax = DB::table('kebutuhan')->select('id_aksesoris')->where('id_barang', '=', $id);
        $data3 = DB::table('aksesoris')
            ->whereNotIn('id_aksesoris', $datax)
            ->get();
        return view('barangedit', ['barang' => $data, 'kebutuhan' => $data2, 'aksesoris' => $data3]);
    }

    public function update($id, Request $request)
    {
        $barang = Barang::find($id);
        $barang->nama_barang = $request->nama_barang;
        $barang->warna = $request->warna;
        $barang->save();
        if ($request->id_kebutuhan != null) {
            foreach ($request->id_kebutuhan as $key  => $value) {
                $kebutuhan = Kebutuhan::find($request->id_kebutuhan[$key]);
                $kebutuhan->id_barang = $id;
                $kebutuhan->id_aksesoris = $request->id_aksesoris[$key];
                $kebutuhan->jumlah = $request->jumlah[$key];
                $kebutuhan->save();
            }
        }
        if ($request->id_aksesorisadd != null) {
            foreach ($request->id_aksesorisadd as $key  => $value) {
                Kebutuhan::create([
                    'id_barang' => $id,
                    'id_aksesoris' => $request->id_aksesorisadd[$key],
                    'jumlah' => $request->jumlahadd[$key]
                ]);
            }
        }

        return redirect('/barang');
    }

    public function delete($id)
    {
        $barang = barang::find($id);
        $barang->delete();
        return redirect('/barang');
    }
}
