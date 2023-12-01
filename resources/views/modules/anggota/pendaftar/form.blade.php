@extends('modules.partials')
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

        @if (session('daftarBerhasil'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('daftarBerhasil') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        @if (session('nisSudahTerdaftar'))
            <script>
                $(document).ready(function() {
                    Alert.info("{{ session('nisSudahTerdaftar') }}", 'Informasi', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif
        @if (session('nisSudahTerdaftar'))
            <script>
                $(document).ready(function() {
                    Alert.info("{{ session('nisSudahTerdaftar') }}", 'Informasi', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        <div
            class="w-[123px] h-[38px] left-[455px] top-[107px] absolute justify-start items-center gap-[9px] inline-flex z-40">
            <div class="text-neutral-700 text-[20px] font-normal font-['Inria Sans'] leading-[38.01px]">
                <a href="/">
                    Beranda
                </a>
            </div>
            <iconify-icon icon="material-symbols:arrow-forward-ios-rounded"
                class="w-[15px] h-[15px] pl-[2.82px] pr-[2.67px] pt-px pb-[1.05px] justify-center items-center flex"></iconify-icon>
            <div class="text-red-700 text-[20px] font-bold font-['Inria Sans'] leading-[38.01px]">Daftar</div>
        </div>

        <div class="absolute left-1/2 top-1/2 transform -translate-x-1/2 -translate-y-1/2">
            <div class="w-[1020px] h-[761px] mt-[-100px]">
                <div class="w-[1020px] h-[761px] left-0 top-0 absolute bg-white rounded-[5px] shadow"></div>
                <form method="POST" action="{{ route('anggota.pendaftaran.submit') }}">
                    @csrf
                    {{-- FIELD NIS --}}
                    <input type="text" placeholder="NIS" name="nis" id="nis"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[54px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                        required />
                    {{-- END FIELD NIS --}}
                    <div id="nisCheckMessage"
                        class="text-red-700 text-[14px] font-normal font-['Inria Sans'] left-[100px] top-[120px] absolute">
                    </div>


                    {{-- FIELD EMAIL --}}
                    <input type="email" placeholder="E-mail" name="email" id="email"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[151px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                        required />
                    <div id="emailCheckMessage"
                        class="text-red-700 text-[14px] font-normal font-['Inria Sans'] left-[100px] top-[220px] absolute">
                    </div>
                    {{-- END FIELD EMAIL --}}

                    {{-- FIELD NAME --}}
                    <input type="text" placeholder="Nama Lengkap" name="nama_siswa"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[249px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                        required />
                    {{-- END FIELD NAME --}}

                    {{-- FIELD KELAS --}}
                    <select name="kelas"
                        class="select-wrapper w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[349px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[645px] inline-flex text-xl font-normal font-['Inria Sans']"
                        style="appearance: none;" required>
                        <option value="" disabled selected hidden>Kelas</option>
                        @foreach ($dataKelas as $kelas)
                            @if ($kelas->status === 'on')
                                <option value="{{ $kelas->kelas }}">{{ $kelas->kelas }}</option>
                            @endif
                        @endforeach
                    </select>
                    <iconify-icon icon="ep:arrow-down" class="w-[15px] h-[15px] left-[899px] top-[373.50px] absolute"
                        style="color: #444;"></iconify-icon>
                    {{-- END FIELD KELAS --}}

                    {{-- FIELD JURUSAN --}}
                    <select name="jurusan"
                        class="select-wrapper w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[449px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[645px] inline-flex text-xl font-normal font-['Inria Sans']"
                        style="appearance: none;" required>
                        <option value="" disabled selected hidden>Jurusan</option>
                        @foreach ($dataJurusan as $jurusan)
                            @if ($jurusan->status === 'on')
                                <option value="{{ $jurusan->jurusan }}">{{ $jurusan->jurusan }}</option>
                            @endif
                        @endforeach
                    </select>
                    <iconify-icon icon="ep:arrow-down" class="w-[15px] h-[15px] left-[899px] top-[473.50px] absolute"
                        style="color: #444;"></iconify-icon>
                    {{-- END FIELD JURUSAN --}}

                    {{-- FIELD NO TELEPON --}}
                    <input type="text" placeholder="Nomor Telepon" name="no_telp"
                        class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[549px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                        pattern="[0-9+]+" required />
                    {{-- END FIELD TELEPON --}}

                    <button type="submit"
                        class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[649px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                        <div class="text-white text-xl font-bold font-['Inria Sans']">DAFTAR</div>
                    </button>
                </form>
            </div>
        </div>
    </div>
</body>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const nisInput = document.getElementById('nis');
        const nisCheckMessage = document.getElementById('nisCheckMessage');

        nisInput.addEventListener('input', function() {
            const nis = nisInput.value;

            // checking pakai ajax
            $.ajax({
                type: 'POST',
                url: '{{ route('anggota.cekNIS') }}',
                data: {
                    _token: '{{ csrf_token() }}',
                    nis: nis
                },
                success: function(response) {
                    if (response.siswaExists) {
                        nisCheckMessage.innerHTML = 'NIS sudah terdaftar';
                    } else if (response.pendaftarExists) {
                        nisCheckMessage.innerHTML = 'Anda sudah melakukan pendaftaran';
                    } else {
                        nisCheckMessage.innerHTML = '';
                    }
                },
                error: function(error) {
                    console.error('Error checking NIS:', error);
                }
            });
        });
    });
</script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const emailInput = document.getElementById('email');
        const emailCheckMessage = document.getElementById('emailCheckMessage');

        emailInput.addEventListener('input', function() {
            const email = emailInput.value;

            // checking pakai ajax
            $.ajax({
                type: 'POST',
                url: '{{ route('anggota.cekEmail') }}', // Sesuaikan dengan nama route yang digunakan untuk validasi email
                data: {
                    _token: '{{ csrf_token() }}',
                    email: email
                },
                success: function(response) {
                    if (!response.validEmail) {
                        emailCheckMessage.innerHTML = 'Gunakan e-mail dari sekolah';
                    } else {
                        emailCheckMessage.innerHTML = '';
                    }
                },
                error: function(error) {
                    console.error('Error checking email:', error);
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
