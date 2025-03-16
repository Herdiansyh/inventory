<?php


namespace App\Http\Controllers;

use App\Models\stok_barang;
use Illuminate\Http\Request;

class BarangKeluarController extends Controller
{
    //   
    public function index()
    {
        return view('dashboard.barang.barangKeluar');
 
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
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(stok_barang $stok_barang)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(stok_barang $stok_barang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, stok_barang $stok_barang)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(stok_barang $stok_barang)
    {
        //
    }
}
