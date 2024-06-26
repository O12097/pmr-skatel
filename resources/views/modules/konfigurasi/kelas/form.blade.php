@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Form Kelas')

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
        {{-- <h2>Form Kelas</h2>

        @if (Session::has('success'))
            <div class="alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif

        <form method="post" action="{{ route('konfigurasi.kelas.create') }}">
            @csrf
            <div class="mb-3">
                <label for="kelas" class="form-label">Kelas</label>
                <input type="text" class="form-control" id="kelas" name="kelas" required>
            </div>
            <div class="mb-3">
                <label for="status" class="form-label">Status</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_aktif" name="status" value="on" checked>
                    <label class="form-check-label" for="status_aktif">Aktif</label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" id="status_non_aktif" name="status" value="off">
                    <label class="form-check-label" for="status_non_aktif">Tidak aktif</label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Kelas</button>
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
                    <form method="post" action="{{ route('konfigurasi.kelas.create') }}">
                        @csrf
                        {{-- <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}"> --}}
                        {{-- FIELD NIS --}}
                        <input type="text" placeholder="Kelas" name="kelas" id="kelas"
                            class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[161px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']" />
                        {{-- END FIELD NIS --}}

                        <h3 class="relative items-center text-[20px] font-medium text-gray-900 sm:flex top-[250px] ">
                            Status</h3>
                        <ul
                            class="relative items-center  text-[20px] font-medium text-gray-900 bg-white border border-zinc-400 rounded-[15px] sm:flex top-[260px]">
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input type="radio" id="status_aktif" name="status" value="on" checked
                                        class="w-4 h-[62px] accent-gray-500 bg-gray-100 border-gray-300">
                                    <label for="status_aktif" class="w-full py-3 ms-2 font-medium text-gray-500  ">Aktif
                                    </label>
                                </div>
                            </li>
                            <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                                <div class="flex items-center ps-3">
                                    <input type="radio" id="status_non_aktif" name="status" value="off"
                                        class="w-4 h-[62px] accent-gray-500 bg-gray-100 border-gray-300 ">
                                    <label for="status_non_aktif" class="w-full py-3 ms-2 font-medium text-gray-500  ">Tidak
                                        aktif</label>
                                </div>
                            </li>
                        </ul>
                        {{-- END FIELD STATUS --}}

                        {{-- FIELD BUTTON KIRIM --}}
                        <button type="submit"
                            class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[480px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                            <div class="text-white text-xl font-bold font-['Inria Sans']">TAMBAH</div>
                        </button>
                        {{-- END FIELD KIRIM --}}

                    </form>
                    {{-- END FORM PRESENSI --}}
                </div>
            </div>
        </div>
    </div>
@endsection
