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
        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
