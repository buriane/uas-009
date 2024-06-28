<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pegawai;
use App\Models\Departemen;
use App\Models\Jabatan;

class PegawaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_pegawai = Pegawai::with('departemen', 'jabatan')->latest()->get();
        return view('pegawai.index', compact('data_pegawai'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $departemen = Departemen::all();
        $jabatan = Jabatan::all();
        return view('pegawai.create', compact('departemen', 'jabatan'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email|unique:pegawai,email',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'departemen_id' => 'required|exists:departemen,id',
            'jabatan_id' => 'required|exists:jabatan,id',
        ]);
        Pegawai::create([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'departemen_id' => $request->departemen_id,
            'jabatan_id' => $request->jabatan_id,
        ]);
        return redirect()->route('pegawai.index')->with(['success' => 'Data pegawai berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_pegawai = Pegawai::with('departemen', 'jabatan')->findOrFail($id);
        return view('pegawai.show', compact('data_pegawai'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $departemen = Departemen::all();
        $jabatan = Jabatan::all();
        $data_pegawai = Pegawai::findOrFail($id);
        return view('pegawai.edit', compact('data_pegawai', 'departemen', 'jabatan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nama' => 'required|min:5',
            'email' => 'required|email|unique:pegawai,email',
            'tanggal_lahir' => 'required|date',
            'jenis_kelamin' => 'required|in:L,P',
            'departemen_id' => 'required|exists:departemen,id',
            'jabatan_id' => 'required|exists:jabatan,id',
        ]);
        $data_pegawai = Pegawai::findOrFail($id);
        $data_pegawai->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'tanggal_lahir' => $request->tanggal_lahir,
            'jenis_kelamin' => $request->jenis_kelamin,
            'departemen_id' => $request->departemen_id,
            'jabatan_id' => $request->jabatan_id,
        ]);
        return redirect()->route('pegawai.index')->with(['success' => 'Data pegawai berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_pegawai = Pegawai::findOrFail($id);
        $data_pegawai->delete();
        return redirect()->route('pegawai.index')->with(['success' => 'Data pegawai berhasil dihapus!']);
    }
}
