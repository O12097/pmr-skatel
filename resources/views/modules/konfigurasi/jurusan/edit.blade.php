@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Edit Jurusan')

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
    <div class="container">
        <h2>Edit Jurusan</h2>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('konfigurasi.jurusan.update', ['id' => $dataJurusan->id_jurusan]) }}">
            @csrf
            <div class="mb-3">
                <label for="jurusan" class="form-label">Jurusan</label>
                <input type="text" class="form-control" id="jurusan" name="jurusan" value="{{ $dataJurusan->jurusan }}" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_aktif" name="status" value="on" {{ $dataJurusan->status == 'on' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_aktif">Aktif</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_non_aktif" name="status" value="off" {{ $dataJurusan->status == 'off' ? 'checked' : '' }}>
                    <label class="form-check-label" for="status_non_aktif">Non-Aktif</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Update Jurusan</button>
        </form>
    </div>
@endsection
