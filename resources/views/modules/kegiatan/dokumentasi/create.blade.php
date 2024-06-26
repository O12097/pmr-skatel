@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Tambah Kegiatan')

@section('content')
    {{-- <h2>Tambah Kegiatan</h2>
    <form method="post" action="{{ route('kegiatan.dokumentasi.create') }}">
        @csrf
        <label for="nama_kegiatan">Nama Kegiatan:</label>
        <input type="text" name="nama_kegiatan" required>

        <label for="tautan_dokumentasi">Tautan Dokumentasi:</label>
        <input type="url" name="tautan_dokumentasi" required>

        <label for="tanggal">Tanggal:</label>
        <input type="date" name="tanggal" required>
        <!-- You can customize the appearance or add additional validation as needed -->

        <label for="deskripsi">Deskripsi:</label>
        <textarea name="deskripsi" rows="4" required></textarea>
        <!-- You can customize the appearance or add additional validation as needed -->

        <button type="submit">Simpan</button>
    </form> --}}

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

    @if (Session::has('success'))
        <div class="alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif

    <div class="h-screen flex items-center justify-center relative -mt-[100px] -ml-[80px]">
        <div class="w-[1020px] h-[647px] absolute">
            <div class="w-[1020px] h-[647px] left-0 top-0 absolute bg-white rounded-[5px] shadow mx-[90px] px-[90px]">
                {{-- FORM PRESENSI --}}
                <form method="post" action="{{ route('kegiatan.dokumentasi.create') }}">
                    @csrf
                    {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                    <input type="text" placeholder="Nama kegiatan" name="nama_kegiatan" id="nama_kegiatan" required
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[55px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />

                    <input type="url" placeholder="Tautan Dokumentasi" name="tautan_dokumentasi" id="tautan_dokumentasi"
                        required
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[155px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />

                    <input type="date" placeholder="Tanggal Kegiatan" name="tanggal" id="tanggal" required
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[255px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />

                    <textarea rows="2" placeholder="Deskripsi" name="deskripsi" id="deskripsi" required
                        class="w-[843px] px-[20px] py-4 left-[89px] top-[355px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"></textarea>


                    {{-- FIELD BUTTON KIRIM --}}
                    <button type="submit"
                        class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[480px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                        <div class="text-white text-xl font-bold font-['Inria Sans']">TAMBAH KEGIATAN</div>
                    </button>
                    {{-- END FIELD KIRIM --}}

                </form>
                {{-- END FORM PRESENSI --}}
            </div>
        </div>
    </div>


@endsection
