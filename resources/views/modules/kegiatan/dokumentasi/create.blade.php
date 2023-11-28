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

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required>
        <!-- You can customize the appearance or add additional validation as needed -->

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" rows="4" required></textarea>
        <!-- You can customize the appearance or add additional validation as needed -->

        <button type="submit">Simpan</button>
    </form>
@endsection
