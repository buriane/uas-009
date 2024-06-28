<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Absensi;
use App\Models\Pegawai;

class AbsensiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data_absensi = Absensi::with('pegawai')->latest()->get();
        return view('absensi.index', compact('data_absensi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pegawai = Pegawai::all();
        return view('absensi.create', compact('pegawai'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'required|date_format:H:i',
            'pegawai_id' => 'required|exists:pegawai,id',
        ]);
        Absensi::create([
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'pegawai_id' => $request->pegawai_id,
        ]);
        return redirect()->route('absensi.index')->with(['success' => 'Data absensi berhasil ditambahkan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data_absensi = Absensi::with('pegawai')->findOrFail($id);
        return view('absensi.show', compact('data_absensi'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pegawai = Pegawai::all();
        $data_absensi = Absensi::findOrFail($id);
        return view('absensi.edit', compact('data_absensi', 'pegawai'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'tanggal' => 'required|date',
            'jam_masuk' => 'required|date_format:H:i',
            'jam_keluar' => 'nullable|date_format:H:i',
            'pegawai_id' => 'required|exists:pegawai,id',
        ]);
        $data_absensi = Absensi::findOrFail($id);
        $data_absensi->update([
            'tanggal' => $request->tanggal,
            'jam_masuk' => $request->jam_masuk,
            'jam_keluar' => $request->jam_keluar,
            'pegawai_id' => $request->pegawai_id,
        ]);
        return redirect()->route('absensi.index')->with(['success' => 'Data absensi berhasil diupdate!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data_absensi = Absensi::findOrFail($id);
        $data_absensi->delete();
        return redirect()->route('absensi.index')->with(['success' => 'Data absensi berhasil dihapus!']);
    }
}
