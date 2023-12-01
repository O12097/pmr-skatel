@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Pendaftar')


<style>
    .centered-text {
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        text-align: center;
    }

    .action-icons {
        display: flex;
        justify-content: end;
        align-items: center;
        padding-bottom: 10px
    }

    .action-icons a {
        margin: 0 5px;
        cursor: pointer;
    }
</style>

@section('content')
    @isset($dataPendaftar)
        @if (session('statusBerhasil'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('statusBerhasil') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        <div class="relative  sm:rounded-lg">
            <div class="action-icons">
                <button id="delete-button"
                    class="inline-flex justify-end items-end px-10 py-1.5 text-sm font-medium bg-red-600 text-white rounded-lg focus:outline-none hover:bg-red-700 focus:ring-4 focus:ring-gray-200 ms-2">
                    Hapus (<span id="deleted-item-count">0</span>)
                </button>
            </div>

            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                        class="inline-flex items-center text-gray-500 bg-white border mt-[15px] border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 font-medium rounded-lg text-sm px-3 py-1.5"
                        type="button">
                        <svg class="w-3 h-3 text-gray-500 me-3" aria-hidden="true" viewBox="0 0 2048 2048">
                            <path fill="currentColor"
                                d="M1024 0q141 0 272 36t244 104t207 160t161 207t103 245t37 272q0 141-36 272t-104 244t-160 207t-207 161t-245 103t-272 37q-141 0-272-36t-244-104t-207-160t-161-207t-103-245t-37-272q0-141 36-272t104-244t160-207t207-161T752 37t272-37zm0 1558q77 0 149-21t136-62t114-96t84-126l-156-74q-23 47-57 85t-77 65t-92 42t-101 15q-72 0-137-28t-117-78h126v-128H512v384h128v-142q75 78 175 121t209 43zm512-662V512h-128v142q-75-78-175-121t-209-43q-77 0-149 21t-136 62t-114 96t-84 126l156 74q22-47 56-85t78-65t92-42t101-15q72 0 137 28t117 78h-126v128h384z" />
                        </svg>
                        Status pendaftar
                        <svg class="w-2.5 h-2.5 ms-2.5" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none"
                            viewBox="0 0 10 6">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m1 1 4 4 4-4" />
                        </svg>
                    </button>
                    <!-- Dropdown menu -->
                    <div id="dropdownRadio" class="z-10 hidden w-40 bg-white divide-y divide-gray-100 rounded-lg shadow"
                        data-popper-reference-hidden="" data-popper-escaped="" data-popper-placement="top"
                        style="position: absolute; inset: auto auto 0px 0px; margin: 0px; transform: translate3d(522.5px, 3847.5px, 0px);">
                        <ul class="p-3 space-y-1 text-sm text-gray-700" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-all" type="radio" value="all" name="filter-radio"
                                        class="w-4 h-4 text-gray-600 accent-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-500 focus:ring-0">
                                    <label for="filter-radio-example-all"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Semua status</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-1" type="radio" value="" name="filter-radio"
                                        class="w-4 h-4 text-gray-600 accent-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-500 focus:ring-0">
                                    <label for="filter-radio-example-1"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Diterima</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                    <input checked="" id="filter-radio-example-2" type="radio" value=""
                                        name="filter-radio"
                                        class="w-4 h-4 text-gray-600 accent-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-500 focus:ring-0">
                                    <label for="filter-radio-example-2"
                                        class="w-full ms-2 text-sm font-medium text-gray-900 rounded">Pending</label>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"></path>
                        </svg>
                    </div>
                    <input type="text" id="table-search"
                        class="block p-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 "
                        placeholder="Cari data">
                </div>
            </div>

            <table class="w-full mt-[15px] text-md text-left rtl:text-right text-gray-500">
                <thead class="text-md text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500  focus:ring-2 ">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">NIS</th>
                        <th scope="col" class="px-6 py-3">Nama Siswa</th>
                        <th scope="col" class="px-6 py-3">Kelas</th>
                        <th scope="col" class="px-6 py-3">Jurusan</th>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">No Telp</th>
                        <th scope="col" class="px-6 py-3">Status</th>
                    </tr>
                </thead>
                <tbody id="table-body">
                    @foreach ($dataPendaftar as $index => $item)
                        <tr class="bg-white border-b hover:bg-gray-50">
                            <div onclick="window.location='{{ route('anggota.pendaftar.detail', ['id' => $item->id_pendaftar]) }}';"
                                style="cursor: pointer;">
                                <td class="w-4 p-4">
                                    <div class="flex items-center">
                                        <input id="checkbox-table-search-1" type="checkbox"
                                            class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 ">
                                        <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                    </div>
                                </td>
                                <td class="px-6 py-6">{{ $index + 1 }}</td>
                                <td class="px-6 py-6">{{ $item->nis }}</td>
                                <td scope="row" class="px-6 py-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->nama_siswa }}</td>
                                <td class="px-6 py-6">{{ $item->kelas->kelas }}</td>
                                <td class="px-6 py-6">{{ $item->jurusan->jurusan }}</td>
                                <td class="px-6 py-6">{{ $item->email }}</td>
                                <td class="px-6 py-6">{{ $item->no_telp }}</td>
                            </div>
                            <td class="flex items-center px-6 py-6">
                                @if ($item->status == 'pending')
                                    <a href="javascript:void(0);" title="Terima"
                                        onclick="handleStatus('{{ route('anggota.pendaftar.updateStatus', ['id' => $item->id_pendaftar]) }}', 'terima')"
                                        class="font-medium text-neutral-600  hover:underline">Terima
                                    </a>
                                    <a href="javascript:void(0);" title="Tidak Terima"
                                        onclick="handleStatus('{{ route('anggota.pendaftar.updateStatus', ['id' => $item->id_pendaftar]) }}', 'tidak')"
                                        class="font-medium text-red-600  hover:underline ms-3">Tolak
                                    </a>
                                @elseif($item->status == 'terima')
                                    Diterima
                                @endif
                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
            <nav class="flex items-center flex-column flex-wrap md:flex-row justify-between pt-4"
                aria-label="Table navigation">
                <span
                    class="text-sm font-normal text-gray-500 dark:text-gray-400 mb-4 md:mb-0 block w-full md:inline md:w-auto">Showing
                    <span class="font-semibold text-gray-900 dark:text-white">1-10</span> of <span
                        class="font-semibold text-gray-900 dark:text-white">1000</span></span>
                <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-8">
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Previous</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">1</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">2</a>
                    </li>
                    <li>
                        <a href="#" aria-current="page"
                            class="flex items-center justify-center px-3 h-8 text-blue-600 border border-gray-300 bg-blue-50 hover:bg-blue-100 hover:text-blue-700 dark:border-gray-700 dark:bg-gray-700 dark:text-white">3</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">4</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">5</a>
                    </li>
                    <li>
                        <a href="#"
                            class="flex items-center justify-center px-3 h-8 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">Next</a>
                    </li>
                </ul>
            </nav>
            <p id="data-not-found" class="px-6 py-6 text-center" style="display: none;">Data tidak ditemukan</p>
        </div>
    @else
        <p>Data tidak ditemukan</p>
    @endisset

    <script>
        function handleStatus(url, action) {
            if (confirm('Apakah Anda yakin ingin mengubah status?')) {
                const form = document.createElement('form');
                form.method = 'POST';
                form.action = url;

                const statusInput = document.createElement('input');
                statusInput.type = 'hidden';
                statusInput.name = 'status';

                statusInput.value = (action === 'terima') ? 'terima' : 'tidak';
                form.appendChild(statusInput);

                // tambahkan token CSRF ke formulir
                const csrfInput = document.createElement('input');
                csrfInput.type = 'hidden';
                csrfInput.name = '_token';
                csrfInput.value = '{{ csrf_token() }}'; // ambil token CSRF dari Blade
                form.appendChild(csrfInput);

                // tambahkan formulir ke body dan kirim
                document.body.appendChild(form);
                form.submit();
            }
        }
    </script>
    <script src="https://flowbite.com/docs/flowbite.min.js"></script>
    <script src="https://flowbite.com/docs/datepicker.min.js"></script>
    <script>
        const anchorTags = document.querySelectorAll('a');
        anchorTags.forEach(function(a) {
            a.addEventListener('click', function(ev) {
                ev.preventDefault();
            })
        });

        const dropdownEl = document.querySelector('[data-dropdown-toggle]');
        const radioAll = document.getElementById('filter-radio-example-all');

        if (dropdownEl) {
            dropdownEl.click();
        }

        radioAll.checked = true;

        const radioButtons = document.querySelectorAll('input[name="filter-radio"]');
        radioButtons.forEach(function(radio) {
            radio.addEventListener('change', function() {
                handleStatusFilter(this.value);
            });
        });
    </script>
    <script>
        $(document).ready(function() {
            $("#table-search").on("keyup", function() {
                var value = $(this).val().toLowerCase();
                var visibleRows = $("#table-body tr").filter(function() {
                    return $(this).text().toLowerCase().indexOf(value) > -1;
                });

                // Toggle the visibility of rows
                $("#table-body tr").hide();
                visibleRows.show();

                // Display the message if no rows are visible
                if (visibleRows.length === 0) {
                    $("#data-not-found").show();
                } else {
                    $("#data-not-found").hide();
                }
            });
        });
    </script>
@endsection
