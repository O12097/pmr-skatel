@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Edit Kegiatan')

@section('content')
    <h2>Edit Kegiatan</h2>
    <form method="post" action="{{ route('kegiatan.dokumentasi.edit', ['id' => $kegiatan->id_kegiatan]) }}">
        @csrf
        @method('PUT')
        <label for="nama_kegiatan">Nama Kegiatan:</label>
        <input type="text" name="nama_kegiatan" value="{{ $kegiatan->nama_kegiatan }}" required>
        <label for="tautan_dokumentasi">Tautan Dokumentasi:</label>
        <input type="url" name="tautan_dokumentasi" value="{{ $kegiatan->tautan_dokumentasi }}" required>
        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" required>{{ $kegiatan->deskripsi }}</textarea>
        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" value="{{ $kegiatan->tanggal }}" required>
        <button type="submit">Simpan</button>
    </form>
@endsection