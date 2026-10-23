<?php

namespace App\Http\Controllers;

use App\Models\barangKeluarModel;
use App\Models\barangMasukModel;
use App\Models\barangModel;
use App\Models\jenisModel;
use App\Models\penyesuaianModel;
use Illuminate\Http\Request;

class barangController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barang = barangModel::orderBy('id_barang')->paginate(5);

        return view('barang.index', compact('barang'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $jenis = jenisModel::all();

        return view('barang.create', compact('jenis'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $barang = barangModel::where('nama_barang', $request->nama_barang)->exists();

        if ($barang) {
            return redirect()->back()->with('error', 'Barang sudah terdaftar!');
        }

        // Kalau belum ada, baru simpan
        barangModel::create([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jenis_id' => $request->jenis_id,
            'tanggal' => $request->tanggal,
        ]);
        return redirect('barang')->with('success', 'Tambah data berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_barang)
    {
        $barang = barangModel::findOrFail($id_barang);
        $barangMasuk = barangMasukModel::where('barang_id', $barang->id_barang)->get();

        $barangKeluar = barangKeluarModel::where('barang_id', $barang->id_barang)->get();

        $penyesuaian = penyesuaianModel::where('barang_id', $barang->id_barang)->get();

        $riwayat = $barangMasuk->map(function ($item) {
            $item->jenis_transaksi = 'Barang Masuk';
            $item->waktu_transaksi = $item->tanggal_masuk;
            $item->stok_transaksi = '+' . $item->stok_masuk;

            return $item;
        })->concat($barangKeluar->map(function ($item) {
            $item->jenis_transaksi = 'Barang Keluar';
            $item->waktu_transaksi = $item->tanggal_keluar;
            $item->stok_transaksi = '-' . $item->stok_keluar;

            return $item;
        }))->concat($penyesuaian->map(function ($item) {
            $item->jenis_transaksi = 'Penyesuaian';
            $item->waktu_transaksi = $item->tanggal_penyesuaian;
            $item->stok_transaksi = $item->stok_penyesuaian;

            if ($item->penyesuaian == 'penambahan') {
                $item->stok_transaksi = '+' . $item->stok_penyesuaian;
            } else {
                $item->stok_transaksi = '-' . $item->stok_penyesuaian;
            }

            return $item;
        }))->sortByDesc('waktu_transaksi')->values();

        return view('barang.show', compact('barang', 'barangMasuk', 'barangKeluar', 'penyesuaian', 'riwayat'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_barang)
    {
        $barang = barangModel::findOrFail($id_barang);
        $jenis = jenisModel::all();

        return view('barang.edit', compact('barang', 'jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_barang)
    {
        $barang = barangModel::findOrFail($id_barang);

        $barang->update([
            'nama_barang' => $request->nama_barang,
            'kategori' => $request->kategori,
            'jenis_id' => $request->jenis_id,
        ]);

        return redirect('barang')->with('success', 'Edit Data Berhasil');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang)
    {
        $barang = barangModel::findOrFail($id_barang);

        $barang->delete();

        return redirect('barang')->with('success', 'Data Barang Berhasil di Hapus');
    }
}
