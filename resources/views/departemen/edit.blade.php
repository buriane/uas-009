@extends('layouts.main')

@section('title', 'Edit Data Departemen')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow rounded">
                <div class="card-header bg-dark text-white">
                    <h5 class="card-title text-center">Edit Data Departemen</h5>
                </div>
                <div class="card-body">
                    <form action="{{ route('departemen.update', $data_departemen->id) }}" method="post">
                        @csrf
                        @method('PUT')
                        <div class="form-group">
                            <label class="font-weight-bold">Nama Departemen</label>
                            <input type="text" class="form-control @error('nama_departemen') is-invalid @enderror" name="nama_departemen" value="{{ old('nama_departemen', $data_departemen->nama_departemen) }}" placeholder="Masukkan Nama Departemen">
                            @error('nama_departemen')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="form-group text-center">
                            <button type="submit" class="btn btn-md btn-primary">Simpan</button>
                            <a href="{{ route('departemen.index') }}" class="btn btn-md btn-danger">Kembali</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection