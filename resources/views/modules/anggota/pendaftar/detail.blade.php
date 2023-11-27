<!-- modules/anggota/pendaftar/detail.blade.php -->

@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Detail Pendaftar')

<style>
    .centered-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }
</style>

@section('content')
    @isset($pendaftar)
        <h2>Detail Pendaftar</h2>
        <p>NIS: {{ $pendaftar->nis }}</p>
        <p>Nama Siswa: {{ $pendaftar->nama_siswa }}</p>
        <p>Kelas: {{ $pendaftar->kelas->kelas }}</p>
        <p>Jurusan: {{ $pendaftar->jurusan->jurusan }}</p>
        <p>Email: {{ $pendaftar->email }}</p>
        <p>No Telp: {{ $pendaftar->no_telp }}</p>

        <!-- Masukkan formulir status.blade.php -->
        {{-- @include('modules.anggota.pendaftar.status', ['pendaftar' => $pendaftar]) --}}
    @else
        <p>Data tidak ditemukan</p>
    @endisset
@endsection
