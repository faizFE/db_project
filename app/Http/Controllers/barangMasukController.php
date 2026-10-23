<?php

namespace App\Http\Controllers;

use App\Models\barangMasukModel;
use App\Models\barangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class barangMasukController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangMasuk = barangMasukModel::all();

        return view('barang_masuk.index', compact('barangMasuk'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barangModel::all();

        return view('barang_masuk.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_masuk' => 'required|integer|min:1',
            'tanggal_masuk' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barang = barangModel::findOrFail($request->barang_id);

        $barang->stok += $request->stok_masuk;
        $barang->save();

        barangMasukModel::create([  
            'barang_id' => $request->barang_id,
            'stok_masuk' => $request->stok_masuk,
            'tanggal_masuk' => $request->tanggal_masuk,
            'user_id' => Auth::id(),
            'keterangan' => $request->keterangan,
        ]);

        return redirect('barang-masuk')->with('success', 'Tambah Stok Barang Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_barang_masuk)
    {
        $barangMasuk = barangMasukModel::findOrFail($id_barang_masuk);

        return view('barang_masuk.show', compact('barangMasuk'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_barang_masuk)
    {
        // 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_barang_masuk)
    {
        // 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_barang_masuk)
    {
        // 
    }
}
