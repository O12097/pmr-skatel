@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Tambah')

@section('content')
    <form action="{{ route('kelola.akun.createProcess') }}" method="post" id="createForm">
        @csrf
        <label for="nis">NIS</label>
        <input type="text" name="nis" id="nis" required>
        <span id="nisError" class="text-danger"></span>

        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" name="nama_siswa" id="nama_siswa" readonly>

        <label for="email">Email</label>
        <input type="email" name="email" required>

        <label for="password">Password</label>
        <input type="password" name="password" required>

        <button type="submit">Simpan</button>
    </form>

    <script>
        $(document).ready(function() {
            $('#nis').on('input', function() {
                var nis = $(this).val();

                // tolong jangan betingkah
                $.ajax({
                    url: '/get-siswa-by-nis/' + nis,
                    method: 'GET',
                    success: function(response) {
                        $('#nama_siswa').val(response.nama_siswa);
                    },
                    error: function() {
                        console.error('Error retrieving siswa data');
                    }
                });
            });
        });
    </script>
@endsection
