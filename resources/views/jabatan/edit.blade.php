@extends('layouts.main')

@section('title', 'Edit Data Jabatan')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow rounded">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title text-center">Edit Data Jabatan</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('jabatan.update', $data_jabatan->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Jabatan</label>
                            <input type="text" class="form-control @error('nama_jabatan') is-invalid @enderror" name="nama_jabatan" value="{{ old('nama_jabatan', $data_jabatan->nama_jabatan) }}" placeholder="Masukkan Nama Jabatan">
                            @error('nama_jabatan')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('jabatan.index') }}" class="btn btn-md btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection