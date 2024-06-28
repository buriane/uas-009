@extends('layouts.main')

@section('title', 'Data Absensi')

@section('content')
<div class="text-center">
    <h3>Data Absensi</h3>
    <hr class="divider">
</div>
<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <a href="{{ route('absensi.create') }}" class="btn btn-success mb-3">Tambah Absensi</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Tanggal</th>
                    <th>Jam Masuk</th>
                    <th>Jam Keluar</th>
                    <th>Pegawai</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_absensi as $absensi)
                    <tr>
                        <td>{{ $absensi->tanggal }}</td>
                        <td>{{ $absensi->jam_masuk }}</td>
                        <td>{{ $absensi->jam_keluar ?? 'Belum diisi' }}</td>
                        <td>{{ $absensi->pegawai->nama }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('absensi.destroy', $absensi->id) }}"
                                method="POST">
                                <a href="{{ route('absensi.show', $absensi->id) }}"
                                    class="btn btn-sm btn-warning">Show</a>
                                <a href="{{ route('absensi.edit', $absensi->id) }}"
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