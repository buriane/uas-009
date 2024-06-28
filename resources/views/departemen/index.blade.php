@extends('layouts.main')

@section('title', 'Data Departemen')

@section('content')
<div class="text-center">
    <h3>Data Departemen</h3>
    <hr class="divider">
</div>
<div class="card border-0 shadow rounded mb-5">
    <div class="card-body">
        <a href="{{ route('departemen.create') }}" class="btn btn-success mb-3">Tambah Departemen</a>
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Departemen</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($data_departemen as $departemen)
                    <tr>
                        <td>{{ $departemen->nama_departemen }}</td>
                        <td class="text-center">
                            <form onsubmit="return confirm('Apakah Anda Yakin ?');"
                                action="{{ route('departemen.destroy', $departemen->id) }}"
                                method="POST">
                                <a href="{{ route('departemen.show', $departemen->id) }}"
                                    class="btn btn-sm btn-warning">Show</a>
                                <a href="{{ route('departemen.edit', $departemen->id) }}"
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