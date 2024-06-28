@extends('layouts.main')

@section('title', 'Data Pegawai')

@section('content')
<div class="text-center">
    <h3>Data Pegawai</h3>
    <hr class="divider">
</div>
<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <a href="{{ route('pegawai.create') }}" class="btn btn-success mb-3">Tambah Pegawai</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Tanggal Lahir</th>
                    <th>Jenis Kelamin</th>
                    <th>Departemen</th>
                    <th>Jabatan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_pegawai as $pegawai)
                    <tr>
                        <td>{{ $pegawai->nama }}</td>
                        <td>{{ $pegawai->email }}</td>
                        <td>{{ $pegawai->tanggal_lahir }}</td>
                        <td>{{ $pegawai->jenis_kelamin }}</td>
                        <td>{{ $pegawai->departemen->nama_departemen }}</td>
                        <td>{{ $pegawai->jabatan->nama_jabatan }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('pegawai.destroy', $pegawai->id) }}"
                                method="POST">
                                <a href="{{ route('pegawai.show', $pegawai->id) }}"
                                    class="btn btn-sm btn-warning">Show</a>
                                <a href="{{ route('pegawai.edit', $pegawai->id) }}"
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