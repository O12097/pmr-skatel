@php
    use Carbon\Carbon;
    setlocale(LC_TIME, 'id_ID');
    Carbon::setLocale('id_ID');
@endphp


@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Dashboard')


<style>
    .alert {
        opacity: 0;
        transition: opacity 1s ease-in-out;
    }

    .timeline {
        position: relative;
        width: 100%;
        overflow: hidden;
    }

    .timeline-item {
        position: relative;
        width: 100%;
        padding: 20px;
        border-bottom: 1px solid #e0e0e0;
    }

    .timeline-item:last-child {
        border-bottom: none;
    }

    .timeline-date {
        font-weight: bold;
        color: #555;
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
    }

    .timeline-content {
        margin-top: 10px;
        color: #333;
    }

    .timeline-content span {
        display: inline-block;
        margin-top: 55px;
    }

    .timeline-content .activity-name {
        margin-right: 5px;
    }

    .empty-data {
        text-align: center;
        color: #777;
        margin-top: 20px;
    }

    .custom-timeline {
        list-style-type: none;
        padding: 0;
        margin: -25px 0;
        border-left: 2px solid #e0e0e0;
        margin-left: 30px;
    }

    .custom-timeline-item {
        position: relative;
        margin: 10px 0;
        padding-left: 20px;
    }

    .custom-timeline-item:before {
        content: "";
        position: absolute;
        left: -6px;
        top: 50%;
        transform: translateY(-50%);
        width: 10px;
        height: 10px;
        border-radius: 50%;
        background-color: #e0e0e0;
        border: 2px solid #ffffff;
    }

    .custom-timeline-item .timeline-date {
        font-weight: bold;
        color: #555;
    }

    .custom-timeline-item .timeline-content {
        margin-top: 10px;
        color: #333;
    }
</style>

@section('content')
    <section class="section-content">
        <div class="w-full h-[770px] mx-[60px] relative">


            {{-- INI WIDGET AKTIVITAS PRESENSI, TERLETAK DISAMPING WIDGET PERMINTAAN --}}
            <div class="w-[376.41px] h-[458.83px] left-[836.21px] top-[362.17px] absolute">
                <div class="w-[376.41px] h-[458.83px] left-0 top-0 absolute backdrop-blur-sm bg-white/30 rounded-[20px] shadow overflow-auto">
                    <div class="w-full h-[80px] sticky top-0 left-[30.97px] bg-w z-40">
                        <h2
                            class="w-[272.78px] h-[29.99px] left-[30.97px] top-[25px] absolute text-center text-neutral-800 text-[25px] font-bold font-['Inria Sans']">
                            AKTIVITAS PRESENSI</h2>
                    </div>
                    <ol class="custom-timeline">
                        @forelse($presensiTimeline as $presensi)
                            <li class="custom-timeline-item">
                                <div class="timeline-date text-sm">
                                    {{ Carbon::parse($presensi->tanggal_presensi)->isoFormat('dddd, D MMMM YYYY') }}</div>
                                <div class="timeline-content ">
                                    @if ($presensi->siswa)
                                        <span class="activity-name text-red-700 text-md font-bold font-['Inria Sans']">
                                            {{ ucfirst($presensi->siswa->nama_siswa) }}
                                        </span><span class="text-neutral-700 text-md font-bold font-['Inria Sans']"
                                            style="margin-right: 5px;">mengisi
                                            presensi</span><span
                                            class="status text-red-700 text-md font-bold font-['Inria Sans']">{{ ucfirst($presensi->status_presensi) }}
                                        @else
                                            <span>Data tidak ditemukan</span>
                                    @endif
                                </div>
                            </li>
                        @empty
                            <p class="empty-data">Data tidak tersedia</p>
                        @endforelse
                    </ol>
                </div>
            </div>
            {{-- END WIDGET PRESENSI --}}


            {{-- INI WIDGET YANG MENAMPILKAN TABLE PENDAFTAR, TERLETAK DISEBELAH KIRI SETELAHKUMPULAN TIGA WIDGET CARD PENGHITUNG --}}
            <div class="w-[782.60px] h-[456.21px] left-0 top-[361.17px] absolute">
                <div class="w-[782.60px] h-[456.21px] left-0 top-0 absolute bg-white rounded-[20px] shadow"></div>
                <h2
                    class="w-[449.07px] h-[25.99px] left-[-30px] top-[34.99px] absolute text-center text-neutral-800 text-[25px] font-bold font-['Inria Sans']">
                    PERMINTAAN BERGABUNG</h2>
                <button onclick="openPdfDialog(event)"
                    class="w-[220.34px] h-[34.99px] px-[29.06px] pt-[9.33px] pb-[8.55px]  left-[510.57px] top-[40px] absolute   justify-center items-center inline-flex text-center text-white text-[15px] font-bold font-['Inria Sans'] rounded-[5px] transition ease-in-out delay-50 bg-red-700 hover:bg-red-800 duration-300">
                    PDF Pendaftar diterima</button>
                <div
                    class="w-[681.35px] h-[266.90px] left-[50.03px] top-[102.96px] absolute bg-white rounded-[10px] justify-start items-start inline-flex">

                    @if (count($pendingRegistrationRequests) > 0)
                        <table
                            class="w-full text-md text-left rtl:text-right text-neutral-800 rounded-lg border border-gray-200">
                            <thead class="text-md text-center text-white bg-red-700">
                                <tr>
                                    <th scope="col" class="px-6 py-1 rounded-tl border-r">NIS</th>
                                    <th scope="col" class="px-6 py-1 border-r">Nama Siswa</th>
                                    <th scope="col" class="px-6 py-1 border-r">Kelas</th>
                                    <th scope="col" class="px-6 py-1 border-r">Jurusan</th>
                                    <th scope="col" class="px-6 py-1 rounded-tr">Aksi</th>
                                </tr>
                            </thead>
                            <tbody class="text-center">
                                @foreach ($pendingRegistrationRequests as $request)
                                    <tr class="bg-gray-100 odd:bg-white hover:bg-gray-100">
                                        <td class="px-6 py-2 rounded-bl border-r">{{ $request->nis }}</td>
                                        <td class="px-6 py-2 border-r">{{ $request->nama_siswa }}</td>
                                        <td class="px-6 py-2 border-r">{{ $request->kelas->kelas }}</td>
                                        <td class="px-6 py-2 border-r">{{ $request->jurusan->jurusan }}</td>
                                        <!-- Add more columns as needed -->
                                        <td class="flex items-center px-6 py-4 rounded-br">
                                            <a href="javascript:void(0);" title="Terima"
                                                onclick="handleStatus('{{ route('anggota.pendaftar.updateStatus', ['id' => $request->id_pendaftar]) }}')"
                                                class="font-medium text-green-600  hover:underline">Terima
                                            </a>
                                            <a href="javascript:void(0);" title="Tidak Terima"
                                                onclick="handleStatus('{{ route('anggota.pendaftar.updateStatus', ['id' => $request->id_pendaftar]) }}')"
                                                class="font-medium text-red-600  hover:underline ms-3">Tolak
                                            </a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    @else
                        <p>No pending registration requests.</p>
                    @endif
                </div>
            </div>
            {{-- END WIDGET YANG MENAMPILKAN TABLE PENDAFTAR --}}


            {{-- INI WIDGET SALAM YANG TERLETAK DI PALING ATAS --}}
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
            {{-- END WIDGET SALAM --}}


            {{-- GABUNGAN TIGA WIDGET YANG TERLETAK DIBAWAH WIDGET SALAM --}}
            <div class="w-[1212.62px] h-[232.04px] left-[2.38px] top-[87.51px] absolute">

                {{-- INI WIDGET CARD PERMINTAAN BERGABUNG --}}
                <div class="w-[345.44px] h-[232.04px] left-0 top-0 absolute">
                    <div class="w-[345.44px] h-[183.86px] left-0 top-[48.18px] absolute bg-white rounded-[20px] shadow">
                    </div>
                    <h2
                        class="w-[345.44px] h-[25.56px] left-0 top-[115.04px] absolute text-center text-neutral-800 text-xl font-bold font-['Inria Sans']">
                        PERMINTAAN BERGABUNG</h2>
                    <h1
                        class="w-[345.44px] h-[36.38px] left-0 top-[155.35px] absolute text-center text-red-700 text-[35px] font-bold font-['Inria Sans']">
                        {{ $pendingJoinRequests ?: 'N/A' }}</h1>
                    <div
                        class="w-[97.96px] h-[96.35px] left-[114.35px] top-0 absolute bg-white rounded-full shadow border-8 border-red-700">
                    </div>
                    <div class="w-[48.18px] h-[48.18px] left-[139.03px] top-[24.58px] text-neutral-700 absolute">
                        <iconify-icon icon="fluent-mdl2:message-friend-request" width="48.18"
                            height="48.18"></iconify-icon>
                    </div>
                </div>
                {{-- END WIDGET CARD PENGHITUNG PERMINTAAN BERGABUNG --}}


                {{-- INI WIDGET CARD PENGHITUNG TOTAL ANGGOTA --}}
                <div class="w-[346.63px] h-[232.04px] left-[434.78px] top-0 absolute">
                    <div class="w-[345.44px] h-[183.86px] left-0 top-[48.18px] absolute bg-white rounded-[20px] shadow">
                    </div>
                    <h1
                        class="w-[345.44px] h-[36.38px] left-0 top-[155.35px] absolute text-center text-red-700 text-[35px] font-bold font-['Inria Sans']">
                        {{ $totalMembers ?: 'N/A' }}</h1>
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
                {{-- END WIDGET CARD PENGHITUNG TOTAL ANGGOTA --}}

                {{-- INI WIDGET CARD PENGHITUNG PRESENSI PERBULAN(PADA SAAT TERJADI) --}}
                <div class="w-[343.06px] h-[232.04px] left-[869.56px] top-0 absolute">
                    <div class="w-[340.68px] h-[183.86px] left-0 top-[48.18px] absolute bg-white rounded-[20px] shadow">
                    </div>

                    <h1
                        class="w-[340.68px] h-[36.38px] left-0 top-[155.35px] absolute text-center text-red-700 text-[35px] font-bold font-['Inria Sans']">
                        {{ $totalAttendanceThisMonth > 0 ? $totalAttendanceThisMonth : 'N/A' }} </h1>
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
                {{-- END WIDGET PENGHITNG PRESENSI PERBULAN --}}
            </div>
        </div>
        <div id="pdfContainer"></div>

    </section>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script>
        function openPdfDialog(event) {
            event.preventDefault();

            console.log("Button clicked");

            // Fetch the PDF content
            fetch("{{ route('download.pdf') }}")
                .then(response => response.blob())
                .then(blob => {
                    // Create a Blob URL for the PDF content
                    var pdfUrl = URL.createObjectURL(blob);

                    // Create an iframe to display the PDF content
                    var iframe = document.createElement('iframe');
                    iframe.style.width = '100%';
                    iframe.style.height = '600px';
                    iframe.src = pdfUrl;

                    // Add the iframe to the dashboard or a specific element
                    document.getElementById('pdfContainer').appendChild(iframe);
                })
                .catch(error => {
                    console.error("Error fetching PDF:", error);
                });
        }
    </script>
    <script>
        function handleStatus(url) {
            if (confirm('Apakah Anda yakin ingin mengubah status?')) {
                // Buat formulir tersembunyi
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;

                // Tambahkan input status ke formulir
                const statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'status';
                statusInput.value = 'terima';
                form.appendChild(statusInput);

                // Tambahkan token CSRF ke formulir
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}'; // Ambil token CSRF dari Blade
                form.appendChild(csrfInput);

                // Tambahkan formulir ke body dan kirim
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>

@endsection
