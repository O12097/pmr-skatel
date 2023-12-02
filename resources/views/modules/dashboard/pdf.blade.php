<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Pendaftar</title>
</head>

<style>
    body,
    div,
    h1,
    h2,
    h3,
    p,
    table {
        margin: 0;
        padding: 0;
    }

    body {
        font-family: 'Arial', sans-serif;
    }

    /* Page styling */
    body {
        background-color: #f4f4f4;
    }

    .container {
        max-width: 800px;
        margin: 0 auto;
        padding: 20px;
        background-color: #fff;
    }

    /* Table styling */
    table {
        width: 100%;
        border-collapse: collapse;
        margin-top: 20px;
    }

    th,
    td {
        padding: 12px;
        text-align: left;
        border-bottom: 1px solid #ddd;
    }

    th {
        background-color: #f2f2f2;
    }

    /* Hover effect on table rows */
    tr:hover {
        background-color: #f5f5f5;
    }

    /* Link styling */
    a {
        color: #3498db;
        text-decoration: none;
    }

    a:hover {
        text-decoration: underline;
    }

    @media screen {
        .container {
            display: none;
        }
    }

    .status-terima {
        background-color: #7CFC00;
        /* Hijau Muda */
        color: #006400;
        /* Dark Green */
    }
</style>

<body onload="script:window.print()">
    @isset($dataPendaftar)
        <div class="container">
            <div class="relative overflow-x-auto sm:rounded-lg">
                <table class="w-full text-xl text-left rtl:text-right text-gray-500 dark:text-gray-400">
                    <thead class="text-xl text-gray-700 uppercase bg-red-50 ">
                        <tr>
                            <th scope="col" class="px-6 py-3">NIS</th>
                            <th scope="col" class="px-6 py-3">Nama Siswa</th>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Kelas
                                </div>
                            <th scope="col" class="px-6 py-3">
                                <div class="flex items-center">
                                    Jurusan
                                </div>
                            <th scope="col" class="px-6 py-3">Email</th>
                            <th scope="col" class="px-6 py-3">No Telp</th>
                            <th scope="col" class="px-6 py-3">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($dataPendaftar->where('status', 'terima') as $index => $item)
                            <tr class="bg-white border-b hover:bg-gray-50  "
                                onclick="window.location='{{ route('anggota.pendaftar.detail', ['id' => $item->id_pendaftar]) }}';"
                                style="cursor: pointer;">
                                <td class="px-6 py-6">{{ $item->nis }}</td>
                                <td scope="row" class="px-6 py-6 font-medium text-gray-900 whitespace-nowrap">
                                    {{ $item->nama_siswa }}</td>
                                <td class="px-6 py-6">{{ $item->kelas->kelas }}</td>
                                <td class="px-6 py-6">{{ $item->jurusan->jurusan }}</td>
                                <td class="px-6 py-6">{{ $item->email }}</td>
                                <td class="px-6 py-6">{{ $item->no_telp }}</td>
                                <td class="px-6 py-6  status-terima">Diterima</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @else
            <p>Data tidak ditemukan</p>
        </div>
    @endisset


</body>

</html>
