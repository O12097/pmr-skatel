@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Tambah Kegiatan')

@section('content')
    <h2>Tambah Kegiatan</h2>
    <form method="post" action="{{ route('kegiatan.dokumentasi.create') }}">
        @csrf
        <label for="nama_kegiatan">Nama Kegiatan:</label>
        <input type="text" name="nama_kegiatan" required>
        <label for="tautan_dokumentasi">Tautan Dokumentasi:</label>
        <input type="url" name="tautan_dokumentasi" required>
        <button type="submit">Simpan</button>
    </form>
@endsection
