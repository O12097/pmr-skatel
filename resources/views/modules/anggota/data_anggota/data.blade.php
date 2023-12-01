@extends('modules.preloader')
@extends('modules.partials')

@section('content')

    <style>
        .centered-text {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            text-align: center;
        }

        .action-icons {
            display: flex;
            justify-content: space-around;
            align-items: center;
        }

        .action-icons a {
            margin: 0 5px;
            cursor: pointer;
        }
    </style>


    @isset($dataSiswa)
    @if (session('updateDataAnggota'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('updateDataAnggota') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Jurusan</th>
                        <th>No Telepon</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataSiswa as $item)
                        <tr>
                            <td>{{ $item->nis }}</td>
                            <td>{{ $item->nama_siswa }}</td>
                            <td>{{ $item->kelas->kelas }}</td>
                            <td>{{ $item->jurusan->jurusan }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('anggota.data.edit', $item->nis) }}">
                                    Edit
                                </a>
                                <a href="{{ route('anggota.data.delete', $item->nis) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->nis }}').submit();">
                                    Hapus
                                </a>
                                <form id="delete-form-{{ $item->nis }}"
                                    action="{{ route('anggota.data.delete', $item->nis) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Data tidak ditemukan</p>
    @endisset
@endsection
