@extends('layouts.main')

@section('title', 'Detail Data Pegawai')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title">{{ $data_pegawai->nama }}</h4>
                </div>
                <div class="card-body">
                    <h5 class="card-subtitle mb-2 text-muted">Email</h5>
                    <p class="card-text">{{ $data_pegawai->email }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Tanggal Lahir</h5>
                    <p class="card-text">{{ $data_pegawai->tanggal_lahir }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Jenis Kelamin</h5>
                    <p class="card-text">{{ $data_pegawai->jenis_kelamin }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Departemen</h5>
                    <p class="card-text">{{ $data_pegawai->departemen->nama_departemen }}</p>
                    <h5 class="card-subtitle mb-2 text-muted">Jabatan</h5>
                    <p class="card-text">{{ $data_pegawai->jabatan->nama_jabatan }}</p>
                    <div class="text-center mt-4">
                        <a href="{{ route('pegawai.index') }}" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection