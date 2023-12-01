<!-- search-results.blade.php -->

@isset($dataSiswa)
    <div class="w-[889px] h-[597px] bg-white rounded-lg border border-zinc-400 justify-start items-start inline-flex">
        <!-- ... (Sesuaikan struktur HTML sesuai kebutuhan) -->
        @foreach ($dataSiswa as $item)
            <!-- Tampilkan data siswa sesuai kebutuhan -->
            <div>{{ $item->nama_siswa }}</div>
            <!-- ... (Tampilkan data lainnya) -->
        @endforeach
    </div>
@else
    <p>Data tidak ditemukan</p>
@endisset
