<!-- Menggunakan Bootstrap agar tampilan lebih bagus, Anda dapat menggantinya sesuai kebutuhan Anda -->

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
        justify-content: space-around;
        align-items: center;
    }

    .action-icons a {
        margin: 0 5px;
        cursor: pointer;
    }
</style>

@section('content')
    @isset($dataPendaftar)
        <div class="relative overflow-x-auto shadow-md sm:rounded-lg">
            <table class="w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400">
                <caption
                    class="p-5 text-lg font-semibold text-left rtl:text-right text-gray-900 bg-white">
                    Our products
                    <p class="mt-1 text-xl font-normal text-gray-500 dark:text-gray-400">Browse a list of Flowbite products
                        designed to help you work and play, stay organized, get answers, keep in touch, grow your business, and
                        more.</p>
                </caption>
                <thead class="text-xl text-gray-700 uppercase bg-gray-50 ">
                    <tr>
                        <th scope="col" class="p-4">
                            <div class="flex items-center">
                                <input id="checkbox-all-search" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-all-search" class="sr-only">checkbox</label>
                            </div>
                        </th>
                        <th scope="col" class="px-6 py-3">No</th>
                        <th scope="col" class="px-6 py-3">NIS</th>
                        <th scope="col" class="px-6 py-3">Nama Siswa</th>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Kelas
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        <th scope="col" class="px-6 py-3">
                            <div class="flex items-center">
                                Jurusan
                                <a href="#"><svg class="w-3 h-3 ms-1.5" aria-hidden="true"
                                        xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 24 24">
                                        <path
                                            d="M8.574 11.024h6.852a2.075 2.075 0 0 0 1.847-1.086 1.9 1.9 0 0 0-.11-1.986L13.736 2.9a2.122 2.122 0 0 0-3.472 0L6.837 7.952a1.9 1.9 0 0 0-.11 1.986 2.074 2.074 0 0 0 1.847 1.086Zm6.852 1.952H8.574a2.072 2.072 0 0 0-1.847 1.087 1.9 1.9 0 0 0 .11 1.985l3.426 5.05a2.123 2.123 0 0 0 3.472 0l3.427-5.05a1.9 1.9 0 0 0 .11-1.985 2.074 2.074 0 0 0-1.846-1.087Z" />
                                    </svg></a>
                            </div>
                        <th scope="col" class="px-6 py-3">Email</th>
                        <th scope="col" class="px-6 py-3">No Telp</th>
                        <th scope="col" class="px-6 py-3"></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($dataPendaftar as $index => $item)
                        <tr class="bg-white border-b hover:bg-gray-50  "
                            onclick="window.location='{{ route('anggota.pendaftar.detail', ['id' => $item->id_pendaftar]) }}';"
                            style="cursor: pointer;">
                            <td class="w-4 p-4">
                                <div class="flex items-center">
                                    <input id="checkbox-table-search-1" type="checkbox"
                                        class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                    <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                                </div>
                            </td>
                            <td class="px-6 py-6">{{ $index + 1 }}</td>
                            <td class="px-6 py-6">{{ $item->nis }}</td>
                            <td scope="row" class="px-6 py-6 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                {{ $item->nama_siswa }}</td>
                            <td class="px-6 py-6">{{ $item->kelas->kelas }}</td>
                            <td class="px-6 py-6">{{ $item->jurusan->jurusan }}</td>
                            <td class="px-6 py-6">{{ $item->email }}</td>
                            <td class="px-6 py-6">{{ $item->no_telp }}</td>
                            {{-- <td class="action-icons px-6 py-6">
                                <a href="#" title="Terima"
                                    onclick="handleStatus('{{ route('anggota.pendaftar.updateStatus', ['id' => $item->id_pendaftar, 'status' => 'terima']) }}')">
                                    <iconify-icon icon="akar-icons:check-circle"></iconify-icon>
                                </a>
                                <a href="#" title="Tidak Terima"
                                    onclick="handleStatus('{{ route('anggota.pendaftar.updateStatus', ['id' => $item->id_pendaftar, 'status' => 'tidak']) }}')">
                                    <iconify-icon icon="akar-icons:close-circle"></iconify-icon>
                                </a>
                            </td> --}}
                            <td class="flex items-center px-6 py-6">
                                <a href="#" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                                <a href="#"
                                    class="font-medium text-red-600 dark:text-red-500 hover:underline ms-3">Remove</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <p>Data tidak ditemukan</p>
    @endisset

    <script>
        function handleStatus(url) {
            if (confirm('Apakah Anda yakin ingin mengubah status?')) {
                window.location.href = url;
            }
        }
    </script>
@endsection
