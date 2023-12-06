@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Presensi')
@php
    use Carbon\Carbon;
    setlocale(LC_TIME, 'id_ID');
    Carbon::setLocale('id_ID');
@endphp
<style>
    .centered-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
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
        /* padding: 0;
        margin: -25px 0; */
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

    * ::-webkit-scrollbar {
        display: none;
    }
    
</style>
@section('content')

    <div class=" bg-white rounded-lg pl-[20px] pr-[600px] h-[800px] overflow-auto">
        <div class="w-full h-[80px] sticky top-0 left-[30.97px] bg-white z-40">
            <h2
                class="w-[272.78px] h-[29.99px] left-[0px] top-[25px] absolute text-center text-neutral-800 text-[25px] font-bold font-['Inria Sans']">
                AKTIVITAS PRESENSI</h2>

        </div>
        <ol class=" border-l border-neutral-300">
            @forelse($presensiTimeline as $presensi)
                <li class="custom-timeline-item">
                    <div class="flex-start flex items-center pt-3">
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
                    </div>
                </li>
            @empty
                <p class="empty-data">Data tidak tersedia</p>
            @endforelse
        </ol>
    </div>
    {{-- @isset($dataPresensi)
    <div
    class="w-[681.35px] h-[266.90px] left-[50.03px] top-[102.96px] absolute bg-white rounded-[10px] justify-start items-start inline-flex">

        <table
            class="w-full text-md text-left rtl:text-right text-neutral-800 rounded-lg border border-gray-200">
            <thead class="text-md text-center text-white bg-red-700">
                <tr>
                    <th scope="col" class="px-6 py-1 rounded-tl border-r">NIS</th>
                    <th scope="col" class="px-6 py-1 border-r">Tanggal</th>
                    <th scope="col" class="px-6 py-1 border-r">Status</th>
                </tr>
            </thead>
            <tbody class="text-center">
                @foreach ($dataPresensi as $request)
                    <tr class="bg-gray-100 odd:bg-white hover:bg-gray-100">
                        <td class="px-6 py-2 rounded-bl border-r">{{ $request->nis }}</td>
                        <td class="px-6 py-2 rounded-bl border-r">{{ $request->tanggal_presensi }}</td>
                        <td class="px-6 py-2 rounded-bl border-r">{{ $request->status_presensi }}</td>

                    </tr>
                @endforeach
            </tbody>
        </table>
</div>

@else
    <p>Data tidak ditemukan</p>
@endisset --}}

@endsection
