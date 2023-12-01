@extends('modules.preloader')
@extends('modules.partials')

@section('content')
    <form action="{{ route('anggota.data.update', ['nis' => $siswa->nis]) }}" method="POST">
        @csrf
        @method('PUT')

        <label for="nama_siswa">Nama Siswa:</label>
        <input type="text" name="nama_siswa" value="{{ $siswa->nama_siswa }}">

        <label for="kelas">Kelas:</label>
        <select name="id_kelas" style="appearance: none;">
            <option value="" disabled selected hidden>Pilih Kelas</option>
            @foreach ($dataKelas as $kelas)
                <option value="{{ $kelas->id_kelas }}" {{ $siswa->kelas->id_kelas == $kelas->id_kelas ? 'selected' : '' }}>
                    {{ $kelas->kelas }}
                </option>
            @endforeach
        </select>

        <label for="jurusan">Jurusan:</label>
        <select name="id_jurusan" style="appearance: none;">
            <option value="" disabled selected hidden>Pilih Jurusan</option>
            @foreach ($dataJurusan as $jurusan)
                <option value="{{ $jurusan->id_jurusan }}"
                    {{ $siswa->jurusan->id_jurusan == $jurusan->id_jurusan ? 'selected' : '' }}>
                    {{ $jurusan->jurusan }}
                </option>
            @endforeach
        </select>

        <label for="no_telp">No Telepon:</label>
        <input type="text" name="no_telp" value="{{ $siswa->no_telp }}">

        <label for="status">Status:</label>
        <select name="status" style="appearance: none;">
            <option value="aktif" {{ $siswa->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
            <option value="tidak_aktif" {{ $siswa->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif</option>
        </select>

        <button type="submit">Update</button>
    </form>
@endsection
