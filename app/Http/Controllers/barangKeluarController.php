<?php

namespace App\Http\Controllers;

use App\Models\barangKeluarModel;
use App\Models\barangModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class barangKeluarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $barangKeluar = barangKeluarModel::all();

        return view('barang_keluar.index', compact('barangKeluar'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barangModel::all();

        return view('barang_keluar.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'stok_keluar' => 'required|integer|min:1',
            'tanggal_keluar' => 'required|date',
            'keterangan' => 'nullable|string',
        ]);

        $barang = barangModel::findOrFail($request->barang_id);

        if ($request->stok_keluar > $barang->stok) {
            return back()->with('error', 'Stok Tidak Mencukupi');
        }

        $barang->stok -= $request->stok_keluar;
        $barang->save();

        barangKeluarModel::create([
            'barang_id' => $request->barang_id,
            'stok_keluar' => $request->stok_keluar,
            'tanggal_keluar' => $request->tanggal_keluar,
            'user_id' => Auth::id(),
            'keterangan' => $request->keterangan,
        ]);

        return redirect('barang-keluar')->with('success', 'Barang berhasil Keluar');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_barang_keluar)
    {
        $barangKeluar = barangKeluarModel::findOrFail($id_barang_keluar);

        return view('barang_keluar.show', compact('barangKeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
