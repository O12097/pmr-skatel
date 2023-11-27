@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Dokumentasi')

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
    <a href="{{ route('kegiatan.dokumentasi.create') }}" class="btn btn-primary">Tambah Kegiatan</a>

    @isset($dataKegiatan)
        <table border="1">
            <thead>
                <tr>
                    <th>ID Kegiatan</th>
                    <th>Nama Kegiatan</th>
                    <th>Tautan Dokumentasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKegiatan as $item)
                    <tr>
                        <td>{{ $item->id_kegiatan }}</td>
                        <td>{{ $item->nama_kegiatan }}</td>
                        <td>{{ $item->tautan_dokumentasi }}</td>
                        <td>
                            <a href="{{ route('kegiatan.dokumentasi.detail', ['id' => $kegiatan->id_kegiatan]) }}">Detail</a>
                            <a href="{{ route('kegiatan.dokumentasi.edit', ['id' => $kegiatan->id_kegiatan]) }}">Edit</a>
                            <!-- Tambahkan tombol delete jika diperlukan -->
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Data tidak ditemukan</p>
    @endisset
@endsection
