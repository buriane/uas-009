<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Departemen;

class DepartemenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_departemen = Departemen::latest()->get();
        return view('departemen.index', compact('data_departemen'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('departemen.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_departemen' => 'required|min:5',
        ]);
        Departemen::create([
            'nama_departemen' => $request->nama_departemen,
        ]);
        return redirect()->route('departemen.index')->with(['success' => 'Data departemen berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_departemen = Departemen::findOrFail($id);
        return view('departemen.show', compact('data_departemen'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data_departemen = Departemen::findOrFail($id);
        return view('departemen.edit', compact('data_departemen'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama_departemen' => 'required|min:5',
        ]);
        $data_departemen = Departemen::findOrFail($id);
        $data_departemen->update([
            'nama_departemen' => $request->nama_departemen,
        ]);
        return redirect()->route('departemen.index')->with(['success' => 'Data departemen berhasil diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_departemen = Departemen::findOrFail($id);
        $data_departemen->delete();
        return redirect()->route('departemen.index')->with(['success' => 'Data departemen berhasil dihapus!']);
    }
}
