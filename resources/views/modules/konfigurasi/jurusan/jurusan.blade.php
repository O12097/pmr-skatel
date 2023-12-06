{{-- @extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Jurusan')

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
    @if (session('successJurusan'))
        <script>
            $(document).ready(function() {
                Alert.success("{{ session('successJurusan') }}", 'Berhasil', {
                    displayDuration: 5000
                });
            });
        </script>
    @endif
    @if (session('successUpdateJurusan'))
        <script>
            $(document).ready(function() {
                Alert.success("{{ session('successUpdateJurusan') }}", 'Berhasil', {
                    displayDuration: 5000
                });
            });
        </script>
    @endif
    <a href="{{ route('konfigurasi.jurusan.form') }}" class="btn btn-primary">Create Jurusan</a>
    @isset($dataJurusan)
        <table border="1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Jurusan</th>
                    <th>Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($dataJurusan as $item)
                    <tr>
                        <td>{{ $item->id_jurusan }}</td>
                        <td>{{ $item->jurusan }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="{{ route('konfigurasi.jurusan.edit', ['id' => $item->id_jurusan]) }}"
                                class="btn btn-warning">Edit</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    @else
        <p>Data tidak ditemukan</p>
    @endisset
@endsection --}}
@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Data Anggota')

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
    @isset($dataJurusan)

        @if (session('successJurusan'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('successJurusan') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif
        @if (session('successUpdateJurusan'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('successUpdateJurusan') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        <div class="relative bg-white rounded-lg shadow sm:rounded-lg px-14 py-6">

                <div class="action-icons">

                </div>

                <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                    
                    <label for="table-search" class="sr-only">Search</label>
                    <div class="relative">
                        <div
                            class="absolute inset-y-0 left-0 rtl:inset-r-0 rtl:right-0 flex items-center ps-3 pointer-events-none">
                            <svg class="w-5 h-5 text-gray-500 " aria-hidden="true" fill="currentColor" viewBox="0 0 20 20"
                                xmlns="http://www.w3.org/2000/svg">
                                <path fill-rule="evenodd"
                                    d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                    clip-rule="evenodd"></path>
                            </svg>
                        </div>
                        <input type="text" id="table-search"
                            class="block p-2 h-12 ps-10 text-md text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-gray-500 focus:border-gray-500 "
                            placeholder="Cari data">
                    </div>
                    <a href="{{ route('konfigurasi.jurusan.form') }}"
                        class="inline-flex justify-end items-end px-10 py-1.5 text-md font-medium bg-red-600 text-white rounded-lg focus:outline-none hover:bg-red-700 focus:ring-4 focus:ring-gray-200 ms-2">
                        + Tambah
                    </a>
                </div>

                <table
                    class="w-full mt-[15px] text-md text-left rtl:text-right text-neutral-600 rounded-lg border border-gray-200">
                    <thead class="text-md text-center text-white bg-red-700 ">
                        <tr>

                            <th scope="col" class="px-6 py-3 border-r">No</th>
                            <th scope="col" class="px-6 py-3 border-r">Id_jurusan</th>
                            <th scope="col" class="px-6 py-3 border-r">Jurusan</th>
                            <th scope="col" class="px-6 py-3 border-r">Status</th>
                            <th scope="col" class="px-6 py-3 border-r">Aksi</th>

                        </tr>
                    </thead>
                    <tbody id="table-body" class="text-center">
                        @foreach ($dataJurusan as $index => $item)
                            <tr class="bg-gray-100 odd:bg-white hover:bg-gray-100" data-status="{{ $item->status }}"
                                data-id-pendaftar="{{ $item->id_jurusan }}">
                                <td class="px-6 py-2 rounded-bl border-r">
                                    {{ $index + 1 }}</td>
                                <td class="px-6 py-2 rounded-bl border-r">
                                    {{ $item->id_jurusan }}</td>
                                <td scope="row"
                                    class="px-6 py-2 rounded-bl border-r font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->jurusan }}</td>
                                <td class="px-6 py-2 rounded-bl border-r">
                                    {{ $item->status }}</td>

                                <td class="flex items-center text-center px-6 py-4 rounded-br">
                                    {{-- <a href="{{ route('konfigurasi.jurusan.edit', ['id' => $item->id_jurusan]) }}">
                                    Edit
                                </a> --}}
                                    <a  href="{{ route('konfigurasi.jurusan.edit', ['id_jurusan' => $item->id_jurusan]) }}" class="edit-link">Edit</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
        </div>
        </table>
        <p id="data-not-found" class="px-6 py-6 text-center" style="display: none;">Data tidak ditemukan</p>

        {{-- PAGINATION --}}
        <nav id="pagination" class="flex items-center flex-column flex-wrap md:flex-row justify-end pt-8"
            aria-label="Table navigation">
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-12">
                <li>
                    <button id="prevPage"
                        class="flex items-center justify-center px-4 h-12 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Sebelumnya</button>
                </li>
                <li>
                    <a href="#" id="page-1"
                        class="flex items-center justify-center px-4 w-12 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">1</a>
                </li>
                <li>
                    <a href="#" id="page-2"
                        class="flex items-center justify-center px-4 w-12 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">2</a>
                </li>
                <li>
                    <a href="#" id="page-3"
                        class="flex items-center justify-center px-4 w-12 h-12 text-gray-600 border border-gray-300 bg-gray-50 hover:bg-gray-100 hover:text-gray-700">3</a>
                </li>
                <li>
                    <a href="#" id="page-4"
                        class="flex items-center justify-center px-4 w-12 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">4</a>
                </li>
                <li>
                    <a href="#" id="page-5"
                        class="flex items-center justify-center px-4 w-12 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 ">5</a>
                </li>
                <li>
                    <button id="nextPage"
                        class="flex items-center justify-center px-4 h-12 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 ">Selanjutnya</button>
                </li>
            </ul>
        </nav>
    @else
        <p>Data tidak ditemukan</p>
    @endisset

    <script src="https://flowbite.com/docs/flowbite.min.js"></script>
    <script src="https://flowbite.com/docs/datepicker.min.js"></script>
    {{-- dropdown filter data --}}


    
    <script>
        // Fungsi untuk menangani perubahan status radio button
        function handleStatusFilter(status) {
            const rows = document.querySelectorAll('#table-body tr');

            rows.forEach(row => {
                const rowData = row.dataset.status; // Ambil status dari atribut data-status

                if (status === 'all' || rowData === status) {
                    row.style.display = ''; // Tampilkan baris jika status sesuai atau semua dipilih
                } else {
                    row.style.display = 'none'; // Sembunyikan baris jika status tidak sesuai
                }
            });

            // Perbarui pesan jika tidak ada data yang sesuai
            const dataNotFound = document.getElementById('data-not-found');
            if (rows.length === 0) {
                dataNotFound.style.display = 'block';
            } else {
                dataNotFound.style.display = 'none';
            }
        }
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
    {{-- pagination --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const tableBody = document.getElementById('table-body');
            const dataNotFound = document.getElementById('data-not-found');
            const pageSize = 10; // Jumlah data per halaman
            let currentPage = 1; // Halaman saat ini

            // Function untuk menampilkan data pada halaman tertentu
            function showDataOnPage(page) {
                const startIdx = (page - 1) * pageSize;
                const endIdx = startIdx + pageSize;
                const rows = tableBody.querySelectorAll('tr');

                rows.forEach((row, index) => {
                    if (index >= startIdx && index < endIdx) {
                        row.style.display = '';
                    } else {
                        row.style.display = 'none';
                    }
                });

                // Perbarui tampilan tombol pagination
                updatePaginationButtons();
            }

            // Function untuk memperbarui tampilan tombol pagination
            function updatePaginationButtons() {
                const pagination = document.getElementById('pagination');
                const prevPageButton = document.getElementById('prevPage');
                const nextPageButton = document.getElementById('nextPage');

                // Sembunyikan atau tampilkan tombol Sebelumnya berdasarkan halaman saat ini
                prevPageButton.style.display = currentPage > 1 ? 'inline-flex' : 'none';

                // Hitung jumlah halaman
                const totalRows = tableBody.querySelectorAll('tr').length;
                const totalPages = Math.ceil(totalRows / pageSize);

                // Buat tombol pagination sesuai dengan jumlah halaman
                const paginationButtons = [];
                for (let i = 1; i <= totalPages; i++) {
                    paginationButtons.push(
                        `<li><a href="#" class="flex items-center justify-center px-4 w-12 h-12 leading-tight text-gray-500 bg-white border border-gray-300 hover:bg-gray-100 hover:text-gray-700 " id="page-${i}">${i}</a></li>`
                    );
                }

                pagination.innerHTML = `
            <ul class="inline-flex -space-x-px rtl:space-x-reverse text-sm h-12">
                <li>
                    <button id="prevPage" class="flex items-center justify-center px-4 h-12 ms-0 leading-tight text-gray-500 bg-white border border-gray-300 rounded-s-lg hover:bg-gray-100 hover:text-gray-700 ">Sebelumnya</button>
                </li>
                ${paginationButtons.join('')}
                <li>
                    <button id="nextPage" class="flex items-center justify-center px-4 h-12 leading-tight text-gray-500 bg-white border border-gray-300 rounded-e-lg hover:bg-gray-100 hover:text-gray-700 ">Selanjutnya</button>
                </li>
            </ul>`;

                // Tambahkan event listener ke tombol-tombol pagination
                const pageButtons = pagination.querySelectorAll('[id^="page-"]');
                pageButtons.forEach(button => {
                    button.addEventListener('click', function() {
                        currentPage = parseInt(this.innerText);
                        showDataOnPage(currentPage);
                    });
                });

                // Tambahkan event listener ke tombol Sebelumnya dan Selanjutnya
                document.getElementById('prevPage').addEventListener('click', function() {
                    if (currentPage > 1) {
                        currentPage--;
                        showDataOnPage(currentPage);
                    }
                });

                // Tambahkan event listener ke tombol Selanjutnya
                document.getElementById('nextPage').addEventListener('click', function() {
                    const nextPage = currentPage + 1;
                    const totalPages = Math.ceil(tableBody.querySelectorAll('tr').length / pageSize);
                    if (nextPage <= totalPages) {
                        currentPage = nextPage;
                        showDataOnPage(currentPage);
                    }
                });
            }

            // Panggil function untuk menampilkan data pada halaman pertama
            showDataOnPage(currentPage);

            // Event listener untuk tombol-tombol pagination
            updatePaginationButtons();
        });
    </script>

@endsection
