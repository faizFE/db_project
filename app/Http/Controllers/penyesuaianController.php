<?php

namespace App\Http\Controllers;

use App\Models\barangModel;
use App\Models\penyesuaianModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class penyesuaianController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyesuaian = penyesuaianModel::all();
        

        return view('penyesuaian.index', compact('penyesuaian'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $barang = barangModel::all();

        return view('penyesuaian.create', compact('barang'));
    }

    /**
     * Store a newly created resource in storage.
     */

    public function store(Request $request)
    {
        $request->validate([
            'barang_id' => 'required',
            'penyesuaian' => 'required|in:penambahan,pengurangan',
            'stok_penyesuaian' => 'required|integer|min:1',
            'tanggal_penyesuaian' => 'required|date',
            'alasan' => 'required|string',
        ]);

        $barang = barangModel::findOrFail($request->barang_id);

        if ($request->penyesuaian == 'penambahan') {

            $barang->stok += $request->stok_penyesuaian;
        } else {

            if ($request->stok_penyesuaian > $barang->stok) {
                return back()->withInput()->with('error', 'Stok tidak mencukupi');
            }

            $barang->stok -= $request->stok_penyesuaian;
        }

        $barang->save();

        penyesuaianModel::create([
            'barang_id' => $request->barang_id,
            'penyesuaian' => $request->penyesuaian,
            'stok_penyesuaian' => $request->stok_penyesuaian,
            'tanggal_penyesuaian' => $request->tanggal_penyesuaian,
            'user_id' => Auth::id(),
            'alasan' => $request->alasan,
        ]);

        return redirect('penyesuaian')->with('success', 'Penyesuaian berhasil');
    }
    /**
     * Display the specified resource.
     */
    public function show(string $id_penyesuaian)
    {
        $penyesuaian = penyesuaianModel::findOrFail($id_penyesuaian);

        return view('penyesuaian.show', compact('penyesuaian'));
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
