@extends('modules.preloader')
@extends('modules.partials')



@section('content')
    @isset($dataSiswa)
        <div class="w-[889px] h-[597px] bg-white rounded-lg border border-zinc-400 justify-start items-start inline-flex">
            <div
                class="w-[146px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <div
                    class="self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-center text-white text-xl font-bold font-['Inria Sans']">NIS</div>
                </div>
                @foreach ($dataSiswa as $item)
                    <div class="self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                        <div class="grow shrink basis-0 text-center text-black text-xl font-normal font-['Inria Sans']">
                            {{ $item->nis }}</div>
                    </div>
                @endforeach
            </div>
            <div
                class="w-[207px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <div
                    class="self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-center text-white text-xl font-bold font-['Inria Sans']">Nama Siswa</div>
                </div>
                @foreach ($dataSiswa as $item)
                    <div class="self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                        <div class="grow shrink basis-0 text-center text-black text-xl font-normal font-['Inria Sans']">
                            {{ $item->nama_siswa }}</div>
                    </div>
                @endforeach
            </div>
            <div
                class="grow shrink basis-0 h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <div
                    class="self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-center text-white text-xl font-bold font-['Inria Sans']">Kelas
                    </div>
                </div>
                @foreach ($dataSiswa as $item)
                    <div class="self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                        <div class="grow shrink basis-0 text-center text-black text-xl font-normal font-['Inria Sans']">
                            {{ $item->kelas->kelas }}</div>
                    </div>
                @endforeach
            </div>
            <div
                class="grow shrink basis-0 h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <div
                    class="self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-center text-white text-xl font-bold font-['Inria Sans']">Jurusan
                    </div>
                </div>
                @foreach ($dataSiswa as $item)
                    <div class="self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                        <div class="grow shrink basis-0 text-center text-black text-xl font-normal font-['Inria Sans']">
                            {{ $item->jurusan->jurusan }}</div>
                    </div>
                @endforeach
            </div>
            <div
                class="w-[116px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <div
                    class="self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-center text-white text-xl font-bold font-['Inria Sans']">No Telepon
                    </div>
                </div>
                @foreach ($dataSiswa as $item)
                    <div class="self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                        <div class="grow shrink basis-0 text-center text-black text-xl font-normal font-['Inria Sans']">
                            {{ $item->no_telp }}</div>
                    </div>
                @endforeach
            </div>
            <div
                class="w-[104px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <div
                    class="self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-center text-white text-xl font-bold font-['Inria Sans']">Status
                    </div>
                </div>
                @foreach ($dataSiswa as $item)
                    <div class="self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                        <div class="grow shrink basis-0 text-center text-black text-xl font-normal font-['Inria Sans']">
                            {{ $item->status }}</div>
                    </div>
                @endforeach
            </div>
            <div
                class="w-[122px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <div
                    class="self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                    <div class="grow shrink basis-0 text-center text-white text-xl font-bold font-['Inria Sans']">Aksi
                    </div>
                </div>
                @foreach ($dataSiswa as $item)
                    <div class="self-stretch h-[55px] justify-center items-center gap-2.5 inline-flex">
                        <iconify-icon icon="akar-icons:edit" class="w-[30px] h-[30px] text-[#444]" relative"></iconify-icon>
                        <iconify-icon icon="fluent:delete-12-regular" class="w-[30px] h-[30px] text-[#CC0606] relative"></iconify-icon>
                    </div>
                @endforeach
            </div>
        </div>
    @else
        <p>Data tidak ditemukan</p>
    @endisset
@endsection
