<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Barang Masuk";
        // $kontaks = collect();

        // Kontak::chunk(1000, function ($data) use ($kontaks) {
        //     $kontaks->push($data);
        // });
        $barang = Barang::orderBy('nama_barang', 'asc')->paginate(10);
        return view('dashboard.barang.barangmasuk.index', [
            'title' => $title,
            'barangs' => $barang
        ]);
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
        // Validasi input
        $request->validate([
            'nama_barang'   => 'required|string|max:255',
            'merk'          => 'nullable|string|max:255',
            'kategori'      => 'required|string|max:255',
            'sub_kategori'  => 'nullable|string|max:255',
            'ukuran'        => 'nullable|string|max:50',
            'satuan'        => 'required|string|max:50',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar'=> 'nullable|date',
            'jumlah'        => 'required|integer|min:1',
            'harga_modal'   => 'required|numeric|min:0',
            'harga_jual'    => 'required|numeric|min:0',
            'foto_barang'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'deskripsi'     => 'nullable|string',
        ]);
    
        // Simpan data barang
        $barang = new Barang();
        $barang->fill($request->except('foto_barang')); 
    
        // Simpan foto jika ada
        if ($request->hasFile('foto_barang')) {
            $fotoPath = $request->file('foto_barang')->store('foto_barang', 'public');
            $barang->foto_barang = $fotoPath;
        }
    
        $barang->save();
    
        return redirect()->route('barangMasuk.index')->with('success', 'Barang berhasil ditambahkan');
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
# VITE_OPENROUTER_API_KEY=
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
