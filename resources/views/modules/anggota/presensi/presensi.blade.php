@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Presensi')

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
    @isset($dataPresensi)
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>NIS</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataPresensi as $item)
                    <tr>
                        <td></td>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->tanggal_presensi }}</td>
                        <td>{{ $item->status_presensi }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Data tidak ditemukan</p>
    @endisset
@endsection
