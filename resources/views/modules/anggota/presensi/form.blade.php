@extends('modules.partials');
@extends('modules.preloader')

<style>
    body {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }
</style>

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<body>
    <div class="w-full h-screen flex items-center justify-center relative bg-stone-50">
        <div class="w-full h-[100px] left-0 top-0 absolute">
            <div class="w-full h-[100px] left-0 top-0 absolute bg-white border-b border-neutral-200"></div>
            <img class="w-[73.58px] h-[75.43px] left-[66px] top-[12px] absolute"
                src="{{ asset('images/logo-pmr.png') }}" />
        </div>

        @if (session('nisTidakTerdaftar'))
            <script>
                $(document).ready(function() {
                    Alert.warning("{{ session('nisTidakTerdaftar') }}", 'Peringatan', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        @if (session('presensiBerhasil'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('presensiBerhasil') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif





        <!-- Breadcrumb -->
        <nav class="w-[123px] h-[38px] left-[545px] top-[123px] absolute justify-start items-center z-40"
            aria-label="Breadcrumb">
            <ol class="inline-flex items-center space-x-1 md:space-x-2 rtl:space-x-reverse">
                <li class="inline-flex items-center">
                    <a href="/"
                        class="inline-flex items-center text-md font-medium text-red-700 hover:text-red-800 ">
                        <svg class="w-3 h-3 me-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg"
                            fill="currentColor" viewBox="0 0 20 20">
                            <path
                                d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                        </svg>
                        Beranda
                    </a>
                </li>

                <li aria-current="page">
                    <div class="flex items-center">
                        <svg class="rtl:rotate-180  w-3 h-3 mx-1 text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 6 10">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 9 4-4-4-4" />
                        </svg>
                        <span class="ms-1 text-md font-medium text-gray-500 md:ms-2 ">Presensi</span>
                    </div>
                </li>
            </ol>
        </nav>



        <div class="w-[1020px] h-[647px] absolute">
            <div class="w-[1020px] h-[647px] left-0 top-0 absolute bg-white rounded-[5px] shadow mx-[90px] px-[90px]">
                {{-- FORM PRESENSI --}}
                <form action="{{ route('anggota.presensi.submit') }}" method="POST">
                    {{-- @csrf --}}
                    <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
                    {{-- FIELD NIS --}}
                    <input type="text" placeholder="NIS" name="nis" id="nisPresensi"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[54px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                        required />
                    {{-- END FIELD NIS --}}
                    <div id="nisPresensiCheckMessage"
                        class="text-red-700 text-[14px] font-normal font-['Inria Sans'] left-[100px] top-[120px] absolute">
                    </div>


                    {{-- FIELD NAMA SISWA YANG MELAKUKAN PRESENSI  --}}
                    <input type="text" id="nama_siswa" placeholder="Nama anggota" name="nama_siswa"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[161px] absolute bg-white rounded-[15px] border border-zinc-400 justify-start items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans'] cursor-not-allowed"
                        readonly />
                    {{-- END NAMA SISWA YANG MELAKUKAN PRESENSI --}}

                    {{-- FIELD STATUS --}}
                    {{-- <div class="w-[137px] h-[154px] left-[103px] top-[260px] absolute">
                    <label
                        class="w-[400px] h-[30px] left-0 top-0 absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                        Status Presensi</label>

                    <span>
                        <input type="radio" id="hadir" name="status_presensi" value="hadir"
                            class="w-[18px] h-[18px] left-[4px] top-[50px] absolute bg-white rounded-full border border-zinc-400"
                            required>
                        <label for="hadir"
                            class="w-[103px] h-[30px] left-[34px] top-[45px] absolute focus:ring-neutral-500  text-neutral-900 text-xl font-normal font-['Inria Sans']">
                            Hadir
                        </label>

                        <input type="radio" id="sakit" name="status_presensi" value="sakit"
                            class="w-[18px] h-[18px] left-[4px] top-[90px] absolute bg-white focus:ring-neutral-500  rounded-full border border-zinc-400"
                            required>
                        <label for="sakit"
                            class="w-[103px] h-[30px] left-[34px] top-[84px] absolute text-neutral-900  focus:ring-neutral-500 text-xl font-normal font-['Inria Sans']">
                            Sakit
                        </label>

                        <input type="radio" id="izin" name="status_presensi" value="izin"
                            class="w-[18px] h-[18px] left-[4px] top-[130px] absolute bg-white rounded-full border border-zinc-400"
                            required>
                        <label for="izin"
                            class="w-[103px] h-[30px] left-[34px] top-[124px] absolute text-neutral-900 text-xl focus:ring-neutral-500 font-normal font-['Inria Sans']">
                            Izin
                        </label>
                    </span>
                </div> --}}
                    <h3 class="relative items-center text-[20px] font-medium text-gray-900 sm:flex top-[250px] ">Presensi</h3>
                    <ul
                        class="relative items-center  text-[20px] font-medium text-gray-900 bg-white border border-zinc-400 rounded-[15px] sm:flex top-[260px]">
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center ps-3">
                                <input  type="radio" id="hadir"
                                    name="status_presensi" value="hadir"
                                    class="w-4 h-[62px] accent-gray-500 bg-gray-100 border-gray-300"
                                    required>
                                <label for="hadir"
                                    class="w-full py-3 ms-2 font-medium text-gray-500  ">Hadir
                                </label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0 sm:border-r">
                            <div class="flex items-center ps-3">
                                <input type="radio" id="izin"
                                    name="status_presensi" value="izin"
                                    class="w-4 h-[62px] accent-gray-500 bg-gray-100 border-gray-300 "
                                    required>
                                <label for="horizontal-list-radio-id"
                                    class="w-full py-3 ms-2 font-medium text-gray-500  ">Izin</label>
                            </div>
                        </li>
                        <li class="w-full border-b border-gray-200 sm:border-b-0">
                            <div class="flex items-center ps-3">
                                <input type="radio" id="sakit"
                                    name="status_presensi" value="sakit"
                                    class="w-4 h-[62px] accent-gray-500 bg-gray-100 border-gray-300"
                                    required>
                                <label for="sakit"
                                    class="w-full py-3 ms-2 font-medium text-gray-500  ">Sakit
                                </label>
                            </div>
                        </li>
                    </ul>
                    {{-- END FIELD STATUS --}}

                    {{-- FIELD BUTTON KIRIM --}}
                    <button type="submit"
                        class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[480px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                        <div class="text-white text-xl font-bold font-['Inria Sans']">KIRIM</div>
                    </button>
                    {{-- END FIELD KIRIM --}}

                </form>
                {{-- END FORM PRESENSI --}}
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const nisPresensiInput = document.getElementById('nisPresensi');
        const nisPresensiCheckMessage = document.getElementById('nisPresensiCheckMessage');

        nisPresensiInput.addEventListener('input', function() {
            const nisPresensi = nisPresensiInput.value;

            $.ajax({
                type: 'POST',
                url: '{{ route('anggota.cekNISPresensi') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    nis: nisPresensi
                },
                success: function(response) {
                    if (!response.exists) {
                        nisPresensiCheckMessage.innerHTML =
                            'NIS tidak terdaftar sebagai anggota';
                    } else {
                        nisPresensiCheckMessage.innerHTML = '';
                    }
                },
                error: function(error) {
                    console.error('Error checking NIS for presensi:', error);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        document.body.style.opacity = 1;
    });
</script>
<script>
    $(document).ready(function() {
        $('#nisPresensi').on('input', function() {
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
