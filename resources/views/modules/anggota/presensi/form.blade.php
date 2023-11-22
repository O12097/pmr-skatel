@extends('modules.partials');
@extends('modules.preloader')

<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<div class="w-full h-screen flex items-center justify-center relative bg-stone-50">
    <div class="w-full h-[100px] left-0 top-0 absolute">
        <div class="w-full h-[100px] left-0 top-0 absolute bg-white border-b border-neutral-200"></div>
        <img class="w-[73.58px] h-[75.43px] left-[66px] top-[12px] absolute" src="{{ asset('images/logo-pmr.png') }}" />
    </div>

    @if (session('nisTidakTerdaftar'))
        <script>
            $(document).ready(function() {
                Alert.warning("{{ session('nisTidakTerdaftar') }}", 'Peringatan', {
                    displayDuration: 3000
                });
            });
        </script>
    @endif

    @if (session('presensiBerhasil'))
        <script>
            $(document).ready(function() {
                Alert.success("{{ session('presensiBerhasil') }}", 'Berhasil', {
                    displayDuration: 3000
                });
            });
        </script>
    @endif


    <div
        class="w-[123px] h-[38px] left-[455px] top-[107px] absolute justify-start items-center gap-[9px] inline-flex z-50">
        <div class="text-neutral-700 text-[20px] font-normal font-['Inria Sans'] leading-[38.01px]">
            <a href="/">
                Kembali
            </a>
        </div>
        <iconify-icon icon="material-symbols:arrow-forward-ios-rounded"
            class="w-[15px] h-[15px] pl-[2.82px] pr-[2.67px] pt-px pb-[1.05px] justify-center items-center flex"></iconify-icon>
        <div class="text-red-700 text-[20px] font-bold font-['Inria Sans'] leading-[38.01px]">Presensi</div>
    </div>


    <div class="w-[1020px] h-[647px] absolute">
        <div class="w-[1020px] h-[647px] left-0 top-0 absolute bg-white rounded-[5px] shadow"></div>
        {{-- FORM PRESENSI --}}
        <form action="{{ route('anggota.presensi.submit') }}" method="POST">
            {{-- @csrf --}}
            <input type="hidden" name="_token" id="token" value="{{ csrf_token() }}">
            {{-- FIELD NIS --}}
            <input type="text" placeholder="NIS" name="nis"
                class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[54px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                required />
            {{-- END FIELD NIS --}}

            {{-- FIELD TANGGAL PRESENSI  --}}
            <input type="date" id="tanggal_presensi"
                class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[161px] absolute bg-white rounded-[15px] border border-zinc-400 justify-start items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                required />
            {{-- END TANGGAL PRESENSI --}}

            {{-- FIELD STATUS --}}
            <div class="w-[137px] h-[154px] left-[103px] top-[260px] absolute">
                <label
                    class="w-[400px] h-[30px] left-0 top-0 absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                    Status Presensi</label>

                <span>
                    <input type="radio" id="hadir" name="status_presensi" value="hadir"
                        class="w-[18px] h-[18px] left-[4px] top-[50px] absolute bg-white rounded-full border border-zinc-400"
                        required>
                    <label for="hadir"
                        class="w-[103px] h-[30px] left-[34px] top-[45px] absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                        Hadir
                    </label>

                    <input type="radio" id="sakit" name="status_presensi" value="sakit"
                        class="w-[18px] h-[18px] left-[4px] top-[90px] absolute bg-white rounded-full border border-zinc-400"
                        required>
                    <label for="sakit"
                        class="w-[103px] h-[30px] left-[34px] top-[84px] absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                        Sakit
                    </label>

                    <input type="radio" id="izin" name="status_presensi" value="izin"
                        class="w-[18px] h-[18px] left-[4px] top-[130px] absolute bg-white rounded-full border border-zinc-400"
                        required>
                    <label for="izin"
                        class="w-[103px] h-[30px] left-[34px] top-[124px] absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                        Izin
                    </label>
                </span>
            </div>
            {{-- END FIELD STATUS --}}

            {{-- FIELD BUTTON KIRIM --}}
            <button type="submit"
                class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[545px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                <div class="text-white text-xl font-bold font-['Inria Sans']">KIRIM</div>
            </button>
            {{-- END FIELD KIRIM --}}

        </form>
        {{-- END FORM PRESENSI --}}
    </div>
</div>
