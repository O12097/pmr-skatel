{{-- @extends('modules.preloader')
@extends('modules.partials')

@section('content')

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
            justify-content: space-around;
            align-items: center;
        }

        .action-icons a {
            margin: 0 5px;
            cursor: pointer;
        }
    </style>


    @isset($dataSiswa)
    @if (session('updateDataAnggota'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('updateDataAnggota') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        <div class="table-container">
            <table class="table">
                <thead>
                    <tr>
                        <th>NIS</th>
                        <th>Nama Siswa</th>
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
                            <td>{{ $item->kelas->kelas }}</td>
                            <td>{{ $item->jurusan->jurusan }}</td>
                            <td>{{ $item->no_telp }}</td>
                            <td>{{ $item->status }}</td>
                            <td>
                                <a href="{{ route('anggota.data.edit', $item->nis) }}">
                                    Edit
                                </a>
                                <a href="{{ route('anggota.data.delete', $item->nis) }}"
                                    onclick="event.preventDefault(); document.getElementById('delete-form-{{ $item->nis }}').submit();">
                                    Hapus
                                </a>
                                <form id="delete-form-{{ $item->nis }}"
                                    action="{{ route('anggota.data.delete', $item->nis) }}" method="POST" style="display: none;">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        
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
    @isset($dataSiswa)
        @if (session('updateDataAnggota'))
            <script>
                $(document).ready(function() {
                    Alert.success("{{ session('updateDataAnggota') }}", 'Berhasil', {
                        displayDuration: 5000
                    });
                });
            </script>
        @endif

        <div class="relative bg-white rounded-lg shadow sm:rounded-lg px-14 py-6">
            <div class="action-icons">
                <button id="delete-button"
                    class="inline-flex justify-end items-end px-10 py-1.5 text-md font-medium bg-red-600 text-white rounded-lg focus:outline-none hover:bg-red-700 focus:ring-4 focus:ring-gray-200 ms-2">
                    Hapus (<span id="deleted-item-count">0</span>)
                </button>
            </div>

            <div class="flex flex-column sm:flex-row flex-wrap space-y-4 sm:space-y-0 items-center justify-between pb-4">
                <div>
                    <button id="dropdownRadioButton" data-dropdown-toggle="dropdownRadio"
                        class="inline-flex items-center text-gray-500 bg-white border mt-[15px] border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-200 h-12 font-medium rounded-lg text-md px-3 py-1.5"
                        type="button">
                        <svg class="w-4 h-4 text-gray-500 me-3" aria-hidden="true" viewBox="0 0 2048 2048">
                            <path fill="currentColor"
                                d="M1024 0q141 0 272 36t244 104t207 160t161 207t103 245t37 272q0 141-36 272t-104 244t-160 207t-207 161t-245 103t-272 37q-141 0-272-36t-244-104t-207-160t-161-207t-103-245t-37-272q0-141 36-272t104-244t160-207t207-161T752 37t272-37zm0 1558q77 0 149-21t136-62t114-96t84-126l-156-74q-23 47-57 85t-77 65t-92 42t-101 15q-72 0-137-28t-117-78h126v-128H512v384h128v-142q75 78 175 121t209 43zm512-662V512h-128v142q-75-78-175-121t-209-43q-77 0-149 21t-136 62t-114 96t-84 126l156 74q22-47 56-85t78-65t92-42t101-15q72 0 137 28t117 78h-126v128h384z" />
                        </svg>
                        Status Anggota
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
                        <ul class="p-3 space-y-1 text-md text-gray-700" aria-labelledby="dropdownRadioButton">
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-all" type="radio" value="all" name="filter-radio"
                                        onchange="handleStatusFilter('all')"
                                        class="w-4 h-4 text-gray-600 accent-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-500 focus:ring-0">
                                    <label for="filter-radio-example-all"
                                        class="w-full ms-2 text-md font-medium text-gray-900 rounded">Semua status</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100">
                                    <input id="filter-radio-example-1" type="radio" value="aktif" name="filter-radio"
                                        onchange="handleStatusFilter('aktif')"
                                        class="w-4 h-4 text-gray-600 accent-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-500 focus:ring-0">
                                    <label for="filter-radio-example-1"
                                        class="w-full ms-2 text-md font-medium text-gray-900 rounded">Aktif</label>
                                </div>
                            </li>
                            <li>
                                <div class="flex items-center p-2 rounded hover:bg-gray-100 ">
                                    <input checked="" id="filter-radio-example-2" type="radio" value="tidak_aktif"
                                        onchange="handleStatusFilter('tidak_aktif')" name="filter-radio"
                                        class="w-4 h-4 text-gray-600 accent-gray-500 bg-gray-100 border-gray-300 focus:ring-gray-500 focus:ring-0">
                                    <label for="filter-radio-example-2"
                                        class="w-full ms-2 text-md font-medium text-gray-900 rounded">Tidak aktif</label>
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
                        class="block p-2 h-12 ps-10 text-md text-gray-900 border border-gray-300 rounded-lg w-80 bg-white focus:ring-gray-500 focus:border-gray-500 "
                        placeholder="Cari data">
                </div>
            </div>

            <table class="w-full mt-[15px] text-md text-left rtl:text-right text-neutral-600 rounded-lg border border-gray-200">
                <thead class="text-md text-center text-white bg-red-700 ">
                    <tr>

                        <th scope="col" class="px-6 py-3 border-r">No</th>
                        <th scope="col" class="px-6 py-3 border-r">NIS</th>
                        <th scope="col" class="px-6 py-3 border-r">Nama Siswa</th>
                        <th scope="col" class="px-6 py-3 border-r">Kelas</th>
                        <th scope="col" class="px-6 py-3 border-r">Jurusan</th>
                        <th scope="col" class="px-6 py-3 border-r">Email</th>
                        <th scope="col" class="px-6 py-3 border-r">No Telp</th>
                        <th scope="col" class="px-6 py-3 rounded-tr">Status</th>
                    </tr>
                </thead>
                <tbody id="table-body" class="text-center">
                    @foreach ($dataSiswa as $index => $item)
                        <tr class="bg-gray-100 odd:bg-white hover:bg-gray-100 cursor-pointer" data-status="{{ $item->status }}"
                            data-id-pendaftar="{{ $item->nis }}"
                            onclick="handleRowClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">

                            <td class="px-6 py-2 rounded-bl border-r cursor-pointer"
                                onclick="handleCellClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">
                                {{ $index + 1 }}</td>
                            <td class="px-6 py-2 rounded-bl border-r cursor-pointer"
                                onclick="handleCellClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">
                                {{ $item->nis }}</td>
                            <td scope="row"
                                class="px-6 py-2 rounded-bl border-r cursor-pointer font-medium text-gray-900 whitespace-nowrap"
                                onclick="handleCellClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">
                                {{ $item->nama_siswa }}</td>
                            <td class="px-6 py-2 rounded-bl border-r cursor-pointer"
                                onclick="handleCellClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">
                                {{ $item->kelas->kelas }}</td>
                            <td class="px-6 py-2 rounded-bl border-r cursor-pointer"
                                onclick="handleCellClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">
                                {{ $item->jurusan->jurusan }}</td>
                            <td class="px-6 py-2 rounded-bl border-r cursor-pointer"
                                onclick="handleCellClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">
                                {{ $item->email }}</td>
                            <td class="px-6 py-2 rounded-bl border-r cursor-pointer"
                                onclick="handleCellClick(event, '{{ route('anggota.data.detail', ['nis' => $item->nis]) }}');">
                                {{ $item->no_telp }}</td>
                            <td class="flex items-center text-center px-6 py-4 rounded-br no-click">
                                @if ($item->status == 'aktif')
                                   <p class="text-green-500 flex-grow"> Aktif</p>
                                @endif
                                @if ($item->status == 'tidak_aktif')
                                    <p class="flex-grow">Tidak aktif</p>
                                @endif
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
    {{-- dropdown filter data --}}
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
    </script>

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

    {{-- 
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

                // Update the row status in the table
                const row = form.closest('tr');
                if (row) {
                    const statusColumn = row.querySelector('td:last-child p');
                    if (statusColumn) {
                        statusColumn.innerText = (action === 'terima') ? 'Diterima' : 'Tidak Diterima';
                    }
                }
            }
        }
    </script> --}}
    {{-- end dropdown filter data --}}
    {{-- search --}}
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
    {{-- end search --}}

    {{-- function checkbox selecting data buat di delete --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const checkboxAll = document.getElementById('checkbox-all-search');
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');
            const deleteButton = document.getElementById('delete-button');
            const deletedItemCount = document.getElementById('deleted-item-count');

            // Function to update the visibility of the delete button and count
            function updateDeleteButtonVisibility() {
                const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                const isChecked = checkedCheckboxes.length > 0;

                if (isChecked) {
                    deleteButton.style.display = 'inline-flex';
                    if (checkedCheckboxes.length === checkboxes.length) {
                        // If all checkboxes are checked, display 'semua'
                        deletedItemCount.innerText = 'Semua';
                    } else {
                        deletedItemCount.innerText = checkedCheckboxes.length;
                    }
                } else {
                    deleteButton.style.display = 'none';
                }
            }

            // Initially hide the delete button
            deleteButton.style.display = 'none';

            // Add event listener to the "Select All" checkbox
            checkboxAll.addEventListener('change', function() {
                checkboxes.forEach(function(checkbox) {
                    checkbox.checked = checkboxAll.checked;
                });

                // Update the visibility of the delete button and count
                updateDeleteButtonVisibility();
            });

            // Add event listener to each checkbox in the table body
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Update the visibility of the delete button and count
                    updateDeleteButtonVisibility();

                    // Update the state of the "Select All" checkbox
                    checkboxAll.checked = [...checkboxes].every((cb) => cb.checked);
                });
            });
        });
    </script>
    <script>
        function confirmDelete() {
            const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');

            if (checkedCheckboxes.length > 0) {
                const itemCount = checkedCheckboxes.length;
                const confirmationMessage = `Apakah Anda yakin ingin menghapus ${itemCount} data?`;

                if (confirm(confirmationMessage)) {
                    // Ambil ID pendaftar yang akan dihapus
                    const idsToDelete = Array.from(checkedCheckboxes).map(checkbox => {
                        // Gunakan dataset.idPendaftar daripada dataset.pendaftarId
                        return checkbox.closest('tr').dataset.idPendaftar;
                    });
                    fetch('/anggota/data/delete-multiple', {
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                            body: JSON.stringify({
                                ids: idsToDelete
                            }),
                        })
                        .then(response => response.json())
                        .then(data => {
                            console.log(data); // Log the response for debugging
                            if (data.message === 'Data berhasil dihapus') {
                                // Hapus baris dari tabel setelah penghapusan berhasil
                                idsToDelete.forEach(id => {
                                    const rowToDelete = document.querySelector(`tr[data-pendaftar-id="${id}"]`);
                                    if (rowToDelete) {
                                        rowToDelete.remove();
                                    }
                                });

                                // Reset checkbox "Select All"
                                document.getElementById('checkbox-all-search').checked = false;

                                // Perbarui tampilan tombol delete
                                updateDeleteButtonVisibility();
                            } else {
                                // Handle other responses or errors
                                console.error('Error deleting data:', data.message);
                            }
                        })
                        .catch(error => {
                            console.error('Error deleting data:', error.message);
                        });
                }
            }
        }
    </script>
    {{-- end checkbox delete --}}


    <script>
        function handleRowClick(event, url) {
            // Check if the clicked element is not a td with class 'no-click'
            if (!event.target.classList.contains('no-click')) {
                window.location = url;
            }
        }

        function handleCellClick(event, url) {
            window.location = url;
        }
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
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            const deleteButton = document.getElementById('delete-button');
            const checkboxes = document.querySelectorAll('input[type="checkbox"]');

            // Add event listener to the delete button
            deleteButton.addEventListener('click', confirmDelete);

            // Function to handle the delete confirmation
            function confirmDelete() {
                const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');

                if (checkedCheckboxes.length > 0) {
                    const itemCount = checkedCheckboxes.length;
                    const confirmationMessage = `Apakah Anda yakin ingin menghapus ${itemCount} data?`;

                    if (confirm(confirmationMessage)) {
                        const idsToDelete = Array.from(checkedCheckboxes).map(checkbox => {
                            return checkbox.closest('tr').dataset.idPendaftar;
                        });

                        // Tampilkan pesan "Hapus data..." atau indikator loading di sini

                        // Panggil fungsi untuk menghapus data
                        deleteData(idsToDelete);
                    }
                }
            }

            // Fungsi untuk menghapus data dari server
            function deleteData(idsToDelete) {
                // Tampilkan pesan "Hapus data..." atau indikator loading di sini

                // Kirim permintaan ke endpoint deleteMultiple di server
                fetch('/anggota/pendaftar/delete-multiple', {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json',
                            'X-CSRF-TOKEN': '{{ csrf_token() }}',
                        },
                        body: JSON.stringify({
                            ids: idsToDelete
                        }),
                    })
                    .then(response => {
                        if (response.ok) {
                            // Hapus baris dari tabel setelah penghapusan berhasil
                            idsToDelete.forEach(id => {
                                const rowToDelete = document.querySelector(
                                    `tr[data-id-pendaftar="${id}"]`);
                                if (rowToDelete) {
                                    rowToDelete.remove();
                                }
                            });

                            // Reset checkbox "Select All"
                            document.getElementById('checkbox-all-search').checked = false;

                            // Perbarui tampilan tombol delete
                            updateDeleteButtonVisibility();
                        } else {
                            // Handle kesalahan jika diperlukan
                            console.error('Error deleting data:', response.statusText);
                        }
                    })
                    .catch(error => {
                        console.error('Error deleting data:', error.message);
                    })
                    .finally(() => {
                        // Sembunyikan pesan "Hapus data..." atau indikator loading di sini
                    });

            }


            // Function untuk memperbarui tampilan tombol delete
            function updateDeleteButtonVisibility() {
                const checkedCheckboxes = document.querySelectorAll('input[type="checkbox"]:checked');
                const deleteButton = document.getElementById('delete-button');

                if (checkedCheckboxes.length > 0) {
                    deleteButton.style.display = 'inline-flex';
                } else {
                    deleteButton.style.display = 'none';
                }
            }

            // Add event listener to each checkbox in the table body
            checkboxes.forEach(function(checkbox) {
                checkbox.addEventListener('change', function() {
                    // Update the visibility of the delete button
                    updateDeleteButtonVisibility();

                    // Update the state of the "Select All" checkbox
                    document.getElementById('checkbox-all-search').checked = [...checkboxes].every((
                        cb) => cb.checked);
                });
            });
        });
    </script>



@endsection
