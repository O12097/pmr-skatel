@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Kalender')

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
    <a href="{{ route('konfigurasi.kelas.form') }}" class="btn btn-primary">Create Kelas</a>
    @isset($dataKelas)
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Kelas</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataKelas as $item)
                    <tr>
                        <td>{{ $item->id_kelas }}</td>
                        <td>{{ $item->kelas }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('konfigurasi.kelas.edit', ['id' => $item->id_kelas]) }}"
                                class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Data tidak ditemukan</p>
    @endisset
@endsection
