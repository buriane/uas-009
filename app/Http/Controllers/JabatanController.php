<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jabatan;

class JabatanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_jabatan = Jabatan::latest()->get();
        return view('jabatan.index', compact('data_jabatan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('jabatan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_jabatan' => 'required|min:5',
        ]);
        Jabatan::create([
            'nama_jabatan' => $request->nama_jabatan,
        ]);
        return redirect()->route('jabatan.index')->with(['success' => 'Data jabatan berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_jabatan = Jabatan::findOrFail($id);
        return view('jabatan.show', compact('data_jabatan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_jabatan = Jabatan::findOrFail($id);
        return view('jabatan.edit', compact('data_jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_jabatan' => 'required|min:5',
        ]);
        $data_jabatan = Jabatan::findOrFail($id);
        $data_jabatan->update([
            'nama_jabatan' => $request->nama_jabatan,
        ]);
        return redirect()->route('jabatan.index')->with(['success' => 'Data jabatan berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_jabatan = Jabatan::findOrFail($id);
        $data_jabatan->delete();
        return redirect()->route('jabatan.index')->with(['success' => 'Data jabatan berhasil dihapus!']);
    }
}
