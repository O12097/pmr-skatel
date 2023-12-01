@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Kelola Akun')


@section('content')
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <a href="{{ route('kelola.akun.form-tambah') }}">Tambah Akun</a>
    
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama Siswa</th>
                <th>NIS</th>
                <th>Email</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($akunList as $akun)
                <tr>
                    <td>{{ $akun->id_user }}</td>
                    <td>{{ $akun->nama_siswa }}</td>
                    <td>{{ $akun->nis }}</td>
                    <td>{{ $akun->email }}</td>
                    <td>
                        <a href="{{ route('kelola.akun.form-edit', $akun->id_user) }}">Edit</a>
                        <form action="{{ route('kelola.akun.destroy', $akun->id_user) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                onclick="return confirm('Apakah Anda yakin ingin menghapus akun ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
            @endforeach
        </tbody>
</table>@endsection
