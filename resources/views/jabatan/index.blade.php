@extends('layouts.main')

@section('title', 'Data Jabatan')

@section('content')
<div class="text-center">
    <h3>Data Jabatan</h3>
    <hr class="divider">
</div>
<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <a href="{{ route('jabatan.create') }}" class="btn btn-success mb-3">Tambah Jabatan</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_jabatan as $jabatan)
                    <tr>
                        <td>{{ $jabatan->nama_jabatan }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('jabatan.destroy', $jabatan->id) }}"
                                method="POST">
                                <a href="{{ route('jabatan.show', $jabatan->id) }}"
                                    class="btn btn-sm btn-warning">Show</a>
                                <a href="{{ route('jabatan.edit', $jabatan->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection