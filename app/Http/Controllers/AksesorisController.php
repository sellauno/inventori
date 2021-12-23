<?php

namespace App\Http\Controllers;

use App\Aksesoris;
use Illuminate\Http\Request;

class AksesorisController extends Controller
{
    public function toAksesoris()
    {
        $data = Aksesoris::all();
        return view('aksesoris', ['aksesoris' => $data]);
    }

    public function add()
    {
        return view('aksesorisadd');
    }

    public function create(Request $request)
    {
        Aksesoris::create([
            'nama_aksesoris' => $request->nama_aksesoris,
            'harga' => $request->harga
        ]);
        return redirect('/aksesoris');
    }

    public function edit($id)
    {
        $data = Aksesoris::find($id);
        return view('aksesorisedit', ['aksesoris' => $data]);
    }

    public function update($id, Request $request)
    {
        $aksesoris = Aksesoris::find($id);
        $aksesoris->nama_aksesoris = $request->nama_aksesoris;
        $aksesoris->harga = $request->harga;
        $aksesoris->save();
        return redirect('/aksesoris');
    }

    public function delete($id)
    {
        $aksesoris = Aksesoris::find($id);
        $aksesoris->delete();
        return redirect('/aksesoris');
    }
}
