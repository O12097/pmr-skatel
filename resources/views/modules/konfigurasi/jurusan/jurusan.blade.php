@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Jurusan')

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
    <a href="{{ route('konfigurasi.jurusan.form') }}" class="btn btn-primary">Create Jurusan</a>
    @isset($dataJurusan)
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataJurusan as $item)
                    <tr>
                        <td>{{ $item->id_jurusan }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('konfigurasi.jurusan.edit', ['id' => $item->id_jurusan]) }}"
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
