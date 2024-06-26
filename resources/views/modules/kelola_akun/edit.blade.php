@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Edit')

@section('content')
    {{-- <form action="{{ route('kelola.akun.editProcess', $user->id_user) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" name="nama_siswa" value="{{ $user->nama_siswa }}" >

        <label for="nis">NIS</label>
        <input type="text" name="nis" value="{{ $user->nis }}" >

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" >

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit">Simpan Perubahan</button>
    </form> --}}
    <div class="h-screen flex items-center justify-center relative -mt-[100px] -ml-[80px]">
        <div class="w-[1020px] h-[647px] absolute">
            <div class="w-[1020px] h-[647px] left-0 top-0 absolute bg-white rounded-[5px] shadow mx-[90px] px-[90px]">
                {{-- FORM PRESENSI --}}
                <form action="{{ route('kelola.akun.editProcess', $user->id_user) }}" method="post"> {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                    @csrf
                    @method('PUT')
                    <input type="text" placeholder="NIS" name="nis" id="nis"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[55px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" value="{{ $user->nis }}"/>
                    <div id="nisError"
                        class="text-red-700 text-[14px] font-normal font-['Inria Sans'] left-[100px] top-[120px] absolute">
                    </div>
                    <input type="text" placeholder="Nama anggota" name="nama_siswa" id="nama_siswa" readonly value="{{ $user->nama_siswa }}"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[155px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />

                    <input type="email" placeholder="E-mail" name="email" id="email" value="{{ $user->email }}"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[255px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />

                    <input type="password" placeholder="Kata sandi" name="password" id="password"
                        class="w-[843px] px-[20px] py-4 left-[89px] top-[355px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />
                    {{-- END FIELD STATUS --}}

                    {{-- FIELD BUTTON KIRIM --}}
                    <button type="submit"
                        class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[480px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                        <div class="text-white text-xl font-bold font-['Inria Sans']">SIMPAN PERUBAHAN</div>
                    </button>
                    {{-- END FIELD KIRIM --}}

                </form>
                {{-- END FORM PRESENSI --}}
            </div>
        </div>
    </div>
    <script>
        $(document).ready(function() {
            $('#nis').on('input', function() {
                var nis = $(this).val();

                // tolong jangan betingkah
                $.ajax({
                    url: '/get-siswa-by-nis/' + nis,
                    method: 'GET',
                    success: function(response) {
                        $('#nama_siswa').val(response.nama_siswa);
                    },
                    error: function() {
                        console.error('Error retrieving siswa data');
                    }
                });
            });
        });
    </script>

@endsection
