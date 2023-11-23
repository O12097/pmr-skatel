@extends('modules.preloader')
@extends('modules.partials')

{{-- <link
rel="stylesheet"
href="https://cdn.jsdelivr.net/npm/quasar@1.0.0-rc.4/dist/quasar.min.css"
/> --}}


@section('content')
    @isset($dataSiswa)
        {{-- <div class="w-[889px] h-[597px] bg-white rounded-lg border border-zinc-400 justify-start items-start inline-flex">
            <table
                class="w-full h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                <thead>
                    <tr>
                        <th
                            class="w-[146px] bg-red-700 text-white text-[15px] font-bold font-inria-sans grow shrink basis-0 text-center font-['Inria Sans']">
                            NIS</th>
                        <th
                            class="w-[207px] bg-red-700 text-white text-[15px] font-bold font-inria-sans grow shrink basis-0 text-center font-['Inria Sans']">
                            Nama Anggota</th>
                        <th
                            class="w-[207px] bg-red-700 text-white text-[15px] font-bold font-inria-sans grow shrink basis-0 text-center font-['Inria Sans']">
                            Kelas</th>
                        <th
                            class="w-[207px] bg-red-700 text-white text-[15px] font-bold font-inria-sans grow shrink basis-0 text-center font-['Inria Sans']">
                            Jurusan</th>
                        <th
                            class="w-[116px] bg-red-700 text-white text-[15px] font-bold font-inria-sans grow shrink basis-0 text-center font-['Inria Sans']">
                            No Telepon</th>
                        <th
                            class="w-[104px] bg-red-700 text-white text-[15px] font-bold font-inria-sans grow shrink basis-0 text-center font-['Inria Sans']">
                            Status</th>
                        <th
                            class="w-[122px] bg-red-700 text-white text-[15px] font-bold font-inria-sans grow shrink basis-0 text-center font-['Inria Sans']">
                            Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <div
                        class="Column w-[146px] h-[595px] rounded-[10px] border border-neutral-200 flex-col justify-start items-start inline-flex">
                        @foreach ($dataSiswa as $item)
                            <div class="self-stretch h-[55px] bg-white justify-center items-center gap-2.5 inline-flex">
                                <tr>
                                    <td
                                        class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans'] bg-white text-black text-[15px] font-normal font-inria-sans">
                                        {{ $item->nis }}</td>
                                    <td
                                        class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans'] bg-zinc-100 text-black text-[15px] font-normal font-inria-sans">
                                        {{ $item->nama_siswa }}
                                    </td>
                                    <td
                                        class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans'] bg-white text-black text-[15px] font-normal font-inria-sans">
                                        {{ $item->kelas }}</td>
                                    <td
                                        class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans'] bg-zinc-100 text-black text-[15px] font-normal font-inria-sans">
                                        {{ $item->jurusan }}</td>
                                    <td
                                        class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans'] bg-white text-black text-[15px] font-normal font-inria-sans">
                                        {{ $item->no_telp }}</td>
                                    <td
                                        class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans'] bg-zinc-100 text-black text-[15px] font-normal font-inria-sans">
                                        {{ $item->status }}</td>
                                    <td
                                        class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans'] bg-white text-black text-[15px] font-normal font-inria-sans">
                                        <div class="flex items-center gap-2.5">
                                            <div class="w-[30px] h-[30px] relative">
                                                <iconify-icon icon="akar-icons:edit"
                                                    class="left-[5px] top-[3.75px] absolute text-[#444]" width="21.25px"
                                                    height="21.25px"></iconify-icon>
                                            </div>
                                            <iconify-icon icon="fluent:delete-12-regular"
                                                class="w-[30px] h-[30px] relative text-[#CC0606]" width="21.25px"
                                                height="21.25px"></iconify-icon>
                                        </div>
                                    </td>
                                </tr>
                            </div>
                        @endforeach
                    </div>
                </tbody>
            </table>
        </div> --}}
        {{-- <table>
            <thead>
                <tr>
                    <th>NIS</th>
                    <th>Nama</th>
                    <th>Kelas</th>
                    <th>Jurusan</th>
                    <th>No Telepon</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataSiswa as $item)
                    <tr>
                        <td>{{ $item->nis }}</td>
                        <td>{{ $item->nama_siswa }}</td>
                        <td>{{ $item->kelas }}</td>
                        </td>
                        <td>{{ $item->jurusan }}</td>
                        </td>
                        <td>{{ $item->no_telp }}</td>
                        </td>
                        <td>{{ $item->status }}</td>
                        </td>
                        <td
                            class=" grow shrink basis-0 text-center text-black text-[15px] font-normal font-['Inria Sans']  text-black text-[15px] font-normal font-inria-sans">
                            <div class="flex items-center gap-2.5">
                                <div class="w-[30px] h-[30px] relative">
                                    <iconify-icon icon="akar-icons:edit" class="left-[5px] top-[3.75px] absolute text-[#444]"
                                        width="21.25px" height="21.25px"></iconify-icon>
                                </div>
                                <iconify-icon icon="fluent:delete-12-regular" class="w-[30px] h-[30px] relative text-[#CC0606]"
                                    width="21.25px" height="21.25px"></iconify-icon>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table> --}}
        {{-- <div class="q-table__middle scroll">
            <table class="q-table">
              <thead>
                <tr>
                  <th class="text-left sortable">
                    Dessert (100g serving)<i
                      aria-hidden="true"
                      class="material-icons q-icon q-table__sort-icon q-table__sort-icon--left"
                      >arrow_upward</i
                    >
                  </th>
                  <th class="text-center sortable">
                    Calories<i
                      aria-hidden="true"
                      class="material-icons q-icon q-table__sort-icon q-table__sort-icon--center"
                      >arrow_upward</i
                    >
                  </th>
                  <th class="text-right sortable" style="width: 10px">
                    <i
                      aria-hidden="true"
                      class="material-icons q-icon q-table__sort-icon q-table__sort-icon--right"
                      >arrow_upward</i
                    >Fat (g)
                  </th>
                  <th class="text-right">Carbs (g)</th>
                  <th class="text-right">Protein (g)</th>
                  <th class="text-right">Sodium (mg)</th>
                  <th class="text-right sortable">
                    <i
                      aria-hidden="true"
                      class="material-icons q-icon q-table__sort-icon q-table__sort-icon--right"
                      >arrow_upward</i
                    >Calcium (%)
                  </th>
                  <th class="text-right sortable">
                    <i
                      aria-hidden="true"
                      class="material-icons q-icon q-table__sort-icon q-table__sort-icon--right"
                      >arrow_upward</i
                    >Iron (%)
                  </th>
                  <th class="text-right">Actions</th>
                </tr>
              </thead> --}}

    {{-- @else --}}
        <p>Data tidak ditemukan</p>
    @endisset

@endsection
