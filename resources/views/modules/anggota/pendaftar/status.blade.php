@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Ubah Status')


@section('content')
<form method="post" action="{{ route('anggota.pendaftar.updateStatus', ['id' => $pendaftar->id_pendaftar]) }}">
    @csrf
    <label for="status">Status:</label>
    <select name="status" id="status">
        <option value="kosong" {{ $pendaftar->status == 'kosong' ? 'selected' : '' }}>Kosong</option>
        <option value="terima" {{ $pendaftar->status == 'terima' ? 'selected' : '' }}>Terima</option>
        <option value="tidak" {{ $pendaftar->status == 'tidak' ? 'selected' : '' }}>Tidak</option>
    </select>
    <button type="submit">Update Status</button>
</form>
@endsection