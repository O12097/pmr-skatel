@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Dashboard')

<style>
    .alert {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }
</style>

@section('content')
    <section class="section-content">
            <div class="w-full h-[770px] pt-[50px] relative">
                <div class="w-[376.41px] h-[458.83px] left-[836.21px] top-[362.17px] absolute">
                    <div class="w-[376.41px] h-[458.83px] left-0 top-0 absolute bg-white rounded-[20px] shadow"></div>
                    <h2
                        class="w-[272.78px] h-[29.99px] left-[30.97px] top-[33.99px] absolute text-center text-neutral-800 text-[25px] font-bold font-['Inria Sans']">
                        AKTIVITAS PRESENSI</h2>
                    <p
                        class="left-[130px] top-[221px] absolute text-center text-neutral-500 text-base font-normal font-['Inria Sans']">
                        Data tidak tersedia</p>
                </div>
                <div class="w-[782.60px] h-[456.21px] left-0 top-[361.17px] absolute">
                    <div class="w-[782.60px] h-[456.21px] left-0 top-0 absolute bg-white rounded-[20px] shadow"></div>
                    <h2
                        class="w-[449.07px] h-[25.99px] left-[3.57px] top-[34.99px] absolute text-center text-neutral-800 text-[25px] font-bold font-['Inria Sans']">
                        PERMINTAAN BERGABUNG</h2>
                    <div
                        class="w-[681.35px] h-[266.90px] left-[50.03px] top-[102.96px] absolute bg-white rounded-[10px] justify-start items-start inline-flex">
                    </div>
                    <button
                        class="w-[170.34px] h-[34.99px] px-[29.06px] pt-[9.33px] pb-[8.55px]  left-[570.57px] top-[30px] absolute   justify-center items-center inline-flex text-center text-white text-[15px] font-bold font-['Inria Sans'] rounded-[5px] transition ease-in-out delay-50 bg-red-700 hover:bg-red-800 duration-300">
                        Unduh PDF</button>
                    <p
                        class="left-[330px] top-[221px] absolute text-center text-neutral-500 text-base font-normal font-['Inria Sans']">
                        Data tidak tersedia</p>

                </div>
                <div class="w-[1210.24px] h-[68.82px] left-[2.38px] top-0 absolute">
                    <div class="w-[1210.24px] h-[68.82px] left-0 top-0 absolute bg-white rounded-[10px] shadow">
                    </div>
                    <div
                        class="w-[545.56px] h-6 left-[71.47px] top-[23.29px] absolute text-neutral-700 text-xl font-bold font-['Inria Sans']">
                        Selamat datang kembali!</div>
                    <div class="w-[24.58px] h-[24.58px] left-[26.73px] top-[23.60px] absolute"><iconify-icon
                            icon="ic:outline-notifications-active" style="color: #252525; opacity: 50%;" height="24.58px"
                            width="24.58px"></iconify-icon></div>
                </div>
                <div class="w-[1212.62px] h-[232.04px] left-[2.38px] top-[87.51px] absolute">
                    <div class="w-[345.44px] h-[232.04px] left-0 top-0 absolute">
                        <div class="w-[345.44px] h-[183.86px] left-0 top-[48.18px] absolute bg-white rounded-[20px] shadow">
                        </div>
                        <h2
                            class="w-[345.44px] h-[25.56px] left-0 top-[115.04px] absolute text-center text-neutral-800 text-xl font-bold font-['Inria Sans']">
                            PERMINTAAN BERGABUNG</h2>
                        <h1
                            class="w-[345.44px] h-[36.38px] left-0 top-[155.35px] absolute text-center text-red-700 text-[35px] font-bold font-['Inria Sans']">
                            N/A</h1>
                        <div
                            class="w-[97.96px] h-[96.35px] left-[114.35px] top-0 absolute bg-white rounded-full shadow border-8 border-red-700">
                        </div>
                        <div class="w-[48.18px] h-[48.18px] left-[139.03px] top-[24.58px] text-neutral-700 absolute">
                            <iconify-icon icon="fluent-mdl2:message-friend-request" width="48.18"
                                height="48.18"></iconify-icon>
                        </div>
                    </div>
                    <div class="w-[346.63px] h-[232.04px] left-[434.78px] top-0 absolute">
                        <div class="w-[345.44px] h-[183.86px] left-0 top-[48.18px] absolute bg-white rounded-[20px] shadow">
                        </div>
                        <h1
                            class="w-[345.44px] h-[36.38px] left-0 top-[155.35px] absolute text-center text-red-700 text-[35px] font-bold font-['Inria Sans']">
                            N/A</h1>
                        <h1
                            class="w-[346.63px] h-[25.56px] left-0 top-[115.04px] absolute text-center text-neutral-800 text-xl font-bold font-['Inria Sans']">
                            ANGGOTA</h1>
                        <div
                            class="w-[97.96px] h-[96.35px] left-[114.35px] top-0 absolute bg-white rounded-full shadow border-8 border-red-700">
                        </div>
                        <div class="w-[48.18px] h-[48.18px] left-[140.22px] top-[24.58px] absolute"><iconify-icon
                                icon="ph:users-three" style="color: #444;" width="48.18" height="48.18"></iconify-icon>
                        </div>
                    </div>
                    <div class="w-[343.06px] h-[232.04px] left-[869.56px] top-0 absolute">
                        <div class="w-[340.68px] h-[183.86px] left-0 top-[48.18px] absolute bg-white rounded-[20px] shadow">
                        </div>
                        <h1
                            class="w-[340.68px] h-[36.38px] left-0 top-[155.35px] absolute text-center text-red-700 text-[35px] font-bold font-['Inria Sans']">
                            N/A</h1>
                        <h2
                            class="w-[343.06px] h-[25.56px] left-0 top-[115.04px] absolute text-center text-neutral-800 text-xl font-bold font-['Inria Sans']">
                            PRESENSI BULAN INI</h2>
                        <div
                            class="w-[97.96px] h-[96.35px] left-[111.97px] top-0 absolute bg-white rounded-full shadow border-8 border-red-700">
                        </div>
                        <div class="w-[48.18px] h-[48.18px] left-[135.46px] top-[24.58px] absolute"><iconify-icon
                                icon="material-symbols:file-present-outline-rounded" style="color: #444;" width="48.18"
                                height="48.18"></iconify-icon></div>
                    </div>
                </div>
            </div>
    </section>
@endsection
