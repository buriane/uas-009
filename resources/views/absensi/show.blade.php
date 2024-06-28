@extends('layouts.main')

@section('title', 'Detail Data Absensi')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title">Detail Absensi</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-subtitle mb-2 text-muted">Tanggal</h5>
                    <p class="card-text">{{ $data_absensi->tanggal }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Jam Masuk</h5>
                    <p class="card-text">{{ $data_absensi->jam_masuk }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Jam Keluar</h5>
                    <p class="card-text">{{ $data_absensi->jam_keluar }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Pegawai</h5>
                    <p class="card-text">{{ $data_absensi->pegawai->nama }}</p>
                    <div class="text-center mt-4">
                        <a href="{{ route('absensi.index') }}" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection