@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Kalender')

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
    <div
        class="Table w-[889px] h-[597px] left-[438px] top-[299px] absolute bg-white rounded-lg border border-zinc-400 justify-start items-start inline-flex">
        <div
            class="Column w-[146px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
            <div
                class="HeaderCell self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                <div class="Nis grow shrink basis-0 text-center text-white text-[15px] font-bold font-['Inria Sans']">NIS
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">1</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">2</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">3</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">4</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">5</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">6</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">7</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">8</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">9</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">10
                </div>
            </div>
        </div>
        <div
            class="Column w-[207px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
            <div
                class="HeaderCell self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="NamaAnggota grow shrink basis-0 text-center text-white text-[15px] font-bold font-['Inria Sans']">
                    Nama Anggota</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota1 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 1</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota2 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 2</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota3 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 3</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota4 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 4</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota5 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 5</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota6 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 6</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota7 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 7</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota8 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 8</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota9 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 9</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota10 grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    Anggota 10</div>
            </div>
        </div>
        <div
            class="Column grow shrink basis-0 h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
            <div
                class="HeaderCell self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                <div class="Kelas grow shrink basis-0 text-center text-white text-[15px] font-bold font-['Inria Sans']">
                    Kelas</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Xia grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIA
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Xib grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIB
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Xic grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIC
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Xid grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XID
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Xie grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIE
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Xif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIF
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Xig grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIG
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Xia grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIA
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Xib grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIB
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Xic grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">XIC
                </div>
            </div>
        </div>
        <div
            class="Column grow shrink basis-0 h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
            <div
                class="HeaderCell self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                <div class="Jurusan grow shrink basis-0 text-center text-white text-[15px] font-bold font-['Inria Sans']">
                    Jurusan</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Tjat grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    TJAT</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Tkj grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">TKJ
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Tkj grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">TKJ
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Rpl grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">RPL
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Rpl grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">RPL
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Dkv grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">DKV
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Ani grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">ANI
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Tjat grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    TJAT</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Tkj grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">TKJ
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Tkj grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">TKJ
                </div>
            </div>
        </div>
        <div
            class="Column w-[116px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
            <div
                class="HeaderCell self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                <div class="NoTelepon grow shrink basis-0 text-center text-white text-[15px] font-bold font-['Inria Sans']">
                    No Telepon</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="Anggota grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    ANGGOTA</div>
            </div>
        </div>
        <div
            class="Column w-[104px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
            <div
                class="HeaderCell self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                <div class="Status grow shrink basis-0 text-center text-white text-[15px] font-bold font-['Inria Sans']">
                    Status</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="Aktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    AKTIF</div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div
                    class="TidakAktif grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']">
                    TIDAK AKTIF</div>
            </div>
        </div>
        <div
            class="Column w-[122px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
            <div
                class="HeaderCell self-stretch h-[45px] bg-red-700 border-b border-neutral-200 justify-center items-center gap-2.5 inline-flex">
                <div class="Aksi grow shrink basis-0 text-center text-white text-[15px] font-bold font-['Inria Sans']">Aksi
                </div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-neutral-100 justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
            <div class="ItemCell self-stretch h-[55px] bg-zinc-100 justify-center items-center gap-2.5 inline-flex">
                <div class="AkarIconsEdit w-[30px] h-[30px] relative">
                    <div class="Group w-[21.25px] h-[21.25px] left-[5px] top-[3.75px] absolute">
                    </div>
                </div>
                <div class="FluentDelete12Regular w-[30px] h-[30px] relative"></div>
            </div>
        </div>
    </div>
    {{-- <p>Data tidak ditemukan</p> --}}
@endsection
