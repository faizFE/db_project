<?php

namespace App\Http\Controllers;

use App\Models\jenisModel;
use Illuminate\Http\Request;

class jenisController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jenis = jenisModel::all();

        return view('jenis.index', compact('jenis'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jenis.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $jenis = jenisModel::where('nama_jenis', $request->nama_jenis)->exists();

        if ($jenis) {
            return redirect()->back()->with('error', 'jenis sudah terdaftar!');
        }

        jenisModel::create([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect('jenis')->with('success', 'Tambah Jenis Berhasil');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id_jenis)
    {
        $jenis = jenisModel::findOrFail($id_jenis);

        return view('jenis.show', compact('jenis'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id_jenis)
    {
        $jenis = jenisModel::findOrFail($id_jenis);

        return view('jenis.edit', compact('jenis'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id_jenis)
    {
        $jenis = jenisModel::findOrFail($id_jenis);

        $jenis->update([
            'nama_jenis' => $request->nama_jenis
        ]);

        return redirect('jenis')->with('success', 'Jenis Berhasil di Edit');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id_jenis)
    {
        $jenis = jenisModel::findOrFail($id_jenis);

        $jenis->delete();

        return redirect('jenis')->with('success', 'Jenis Berhasil ditambahkan');
    }
}
