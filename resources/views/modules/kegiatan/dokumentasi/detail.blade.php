@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Detail Kegiatan')

@section('content')
    <h2>Detail Kegiatan</h2>
    <p>Nama Kegiatan: {{ $kegiatan->nama_kegiatan }}</p>
    <p>Tautan Dokumentasi: <a href="{{ $kegiatan->tautan_dokumentasi }}" target="_blank">{{ $kegiatan->tautan_dokumentasi }}</a></p>
@endsection
