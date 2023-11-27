@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Kelola Akun')


@section('content')
    <h1>Daftar Akun Pengelola</h1>

    <a href="{{ route('kelola.akun.create') }}" class="btn btn-primary mb-3">Tambah Akun</a>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <table class="table">
        <thead>
            <tr>
                <th>#</th>
                <th>Nama</th>
                <th>Email</th>
                <th>NIS</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($users as $user)
                <tr>
                    <td>{{ $user->id_user }}</td>
                    <td>{{ $user->nama_siswa }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->nis }}</td>
                    <td>
                        <a href="{{ route('kelola.akun.edit', $user) }}" class="btn btn-warning btn-sm">Edit</a>
                        <form action="{{ route('kelola.akun.destroy', $user) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection