<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('dashboard.barang.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = new Barang();
        $barang->nama_barang = $request->input('nama_barang');
        $barang->merk = $request->input('merk');
        $barang->kategori = $request->input('kategori');
        $barang->sub_kategori = $request->input('sub_kategori');
        $barang->ukuran = $request->input('ukuran');
        $barang->satuan = $request->input('satuan');
        $barang->tanggal_masuk = $request->input('tanggal_masuk');
        $barang->tanggal_keluar = $request->input('tanggal_keluar');
        $barang->harga_modal = $request->input('harga_modal');
        $barang->harga_jual = $request->input('harga_jual');
        $barang->foto_barang = $request->input('foto_barang');
        $barang->deskripsi = $request->input('deskripsi');
        $barang->type = $request->input('type');
        $barang->save();

        return redirect()->route('barang.index')->with('success', 'Barang berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Barang $barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Barang $barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Barang $barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Barang $barang)
    {
        //
    }
}
