<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use App\Models\Laporan;
use App\Models\stok_barang;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class BarangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $title = "Daftar Barang Masuk";

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
        return view('dashboard.barang.barangmasuk.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try {
            // Validasi input
            $data = $request->validate([
                'nama_barang'   => 'required|string|max:255',
                'merk'          => 'nullable|string|max:255',
                'kategori'      => 'required|string|max:255',
                'sub_kategori'  => 'nullable|string|max:255',
                'ukuran'        => 'nullable|string|max:50',
                'satuan'        => 'required|string|max:255',
                'tanggal_masuk' => 'required|date',
                'qty_in'        => 'required|integer|min:1',
                'tanggal_keluar'=> 'nullable|date',
                'harga_modal'   => 'required|numeric|min:0',
                'harga_jual'    => 'required|numeric|min:0',
                'foto_barang'   => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                'deskripsi'     => 'nullable|string',
                'type'          => 'required|string',
            ]);

            // Use a database transaction to ensure atomicity
            DB::beginTransaction();

            try {
                // Simpan data barang
                $barang = new Barang();
                $barang->fill($request->except(['foto_barang', 'qty_in']));

                // Simpan foto jika ada
                if ($request->hasFile('foto_barang')) {
                    $fotoPath = $request->file('foto_barang')->store('foto_barang', 'public');
                    $barang->foto_barang = $fotoPath;
                }
         
                $barang->save();

                if (isset($barang->id)) {
                    $barangId = $barang->id;

                    // Update atau buat stok barang
                    $stok = stok_barang::updateOrCreate(
                        ['barang_id' => $barangId],
                        [
                            'qty_masuk'    => $data['qty_in'],
                            'qty_keluar' => 0,
                            'qty_total' => DB::raw("COALESCE(qty_total, 0) + {$data['qty_in']}")
                        ]
                    );

                    $laporan = Laporan::updateOrCreate(
                        ['barang_id' => $barangId],
                        [
                            'user_id' => auth()->id(),
                            'tanggal_masuk' => $data['tanggal_masuk'],
                            'qty_barang' => $data['qty_in'],
                            'type' => $data['type']
                        ]
                    );

                    DB::commit();

                    return redirect()->route('barangMasuk.index')->with('success', 'Barang berhasil ditambahkan');
                } else {
                    DB::rollback();
                    Log::error('Error saat menyimpan barang: Gagal mendapatkan ID barang.');
                    return redirect()->back()->withErrors('Gagal menyimpan barang.');
                }


            } catch (\Exception $e) {
                DB::rollback();
                Log::error('Error saat menyimpan barang: ' . $e->getMessage());
                return redirect()->back()->withErrors($e->getMessage());
            }

        } catch (\Throwable $th) {
            Log::error('Error saat menyimpan barang: ' . $th->getMessage());
            return redirect()->back()->withErrors($th->getMessage());
        }
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
