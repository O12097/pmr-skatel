@extends('modules.preloader')
@extends('modules.partials')

@section('content')
    {{-- <form action="{{ route('anggota.data.update', ['nis' => $siswa->nis]) }}" method="POST">
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
    </form> --}}
    <div class="w-[1020px] h-[761px]">
        <div class="w-[1020px] h-[861px] absolute bg-white rounded-[5px] shadow   px-[90px]">
            <form action="{{ route('anggota.data.update', ['nis' => $siswa->nis]) }}" method="POST">
                @csrf
                @method('PUT')
        
                <input type="text" placeholder="NIS" name="nis" id="nis" value="{{ $siswa->nis }}"
                    class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[54px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans'] cursor-not-allowed"
                    readonly />
                {{-- END FIELD NIS --}}
                <div id="nisCheckMessage"
                    class="text-red-700 text-[14px] font-normal font-['Inria Sans'] left-[100px] top-[120px] absolute ">
                </div>


                {{-- FIELD EMAIL --}}
                <input type="email" placeholder="E-mail" name="email" id="email" value="{{ $siswa->email }}"
                    class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[151px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />
                <div id="emailCheckMessage"
                    class="text-red-700 text-[14px] font-normal font-['Inria Sans'] left-[100px] top-[220px] absolute">
                </div>
                {{-- END FIELD EMAIL --}}

                {{-- FIELD NAME --}}
                <input type="text" placeholder="Nama Lengkap" name="nama_siswa" value="{{ $siswa->nama_siswa }}"
                    class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[249px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />
                {{-- END FIELD NAME --}}

                {{-- FIELD KELAS --}}
                <select name="id_kelas"
                    class="select-wrapper w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[349px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[645px] inline-flex text-xl font-normal font-['Inria Sans']"
                    style="appearance: none;">
                    <option value="" disabled selected hidden>Pilih Kelas</option>
                    @foreach ($dataKelas as $kelas)
                        @if ($kelas->status === 'on')
                            <option value="{{ $kelas->id_kelas }}"
                                {{ $siswa->kelas->id_kelas == $kelas->id_kelas ? 'selected' : '' }}>
                                {{ $kelas->kelas }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <iconify-icon icon="ep:arrow-down" class="w-[15px] h-[15px] left-[899px] top-[373.50px] absolute"
                    style="color: #444;"></iconify-icon>
                {{-- END FIELD KELAS --}}

                {{-- FIELD JURUSAN --}}
                <select name="id_jurusan"
                    class="select-wrapper w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[449px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[645px] inline-flex text-xl font-normal font-['Inria Sans']"
                    style="appearance: none;">
                    <option value="" disabled selected hidden>Jurusan</option>
                    @foreach ($dataJurusan as $jurusan)
                        @if ($jurusan->status === 'on')
                            <option value="{{ $jurusan->id_jurusan }}"
                                {{ $siswa->jurusan->id_jurusan == $jurusan->id_jurusan ? 'selected' : '' }}>
                                {{ $jurusan->jurusan }}
                            </option>
                        @endif
                    @endforeach
                </select>
                <iconify-icon icon="ep:arrow-down" class="w-[15px] h-[15px] left-[899px] top-[473.50px] absolute"
                    style="color: #444;"></iconify-icon>
                {{-- END FIELD JURUSAN --}}

                {{-- FIELD NO TELEPON --}}
                <input type="text" placeholder="Nomor Telepon" name="no_telp" value="{{ $siswa->no_telp }}"
                    class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[549px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                    pattern="[0-9+]+" />
                {{-- END FIELD TELEPON --}}
                <select name="status"
                    class="select-wrapper w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[649px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[645px] inline-flex text-xl font-normal font-['Inria Sans']"
                    style="appearance: none;">
                    <option value="" disabled selected hidden>Pilih status</option>
                    <option value="aktif" {{ $siswa->status == 'aktif' ? 'selected' : '' }}>Aktif</option>
                    <option value="tidak_aktif" {{ $siswa->status == 'tidak_aktif' ? 'selected' : '' }}>Tidak Aktif
                    </option>
                </select>
                <iconify-icon icon="ep:arrow-down" class="w-[15px] h-[15px] left-[899px] top-[673.50px] absolute"
                    style="color: #444;"></iconify-icon>

                <button type="submit"class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[749px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                    <div class="text-white text-xl font-bold font-['Inria Sans']">UPDATE</div>
                </button>
            </form>
        </div>
    </div>
    </div>
@endsection
