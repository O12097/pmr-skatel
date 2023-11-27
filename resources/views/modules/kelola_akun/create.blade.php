@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Tambah')

@section('content')
    <h1>Tambah Akun Pengelola</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('kelola.akun.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="nama_siswa" class="form-label">Nama</label>
            <input type="text" class="form-control" id="nama_siswa" name="nama_siswa" value="{{ old('nama_siswa') }}" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" value="{{ old('email') }}" required>
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" class="form-control" id="password" name="password" required>
        </div>
        <div class="mb-3">
            <label for="nis" class="form-label">NIS</label>
            <input type="text" class="form-control" id="nis" name="nis" value="{{ old('nis') }}">
        </div>
        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
