@extends('layouts.main')

@section('title', 'Detail Data Jabatan')

@section('content')
<div class="container mt-5 mb-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card border-0 shadow-sm rounded">
                <div class="card-header bg-dark text-white">
                    <h4 class="card-title">{{ $data_jabatan->nama_jabatan }}</h4>
                </div>
                <div class="card-body">
                    <div class="text-center mt-4">
                        <a href="{{ route('jabatan.index') }}" class="btn btn-md btn-danger">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection