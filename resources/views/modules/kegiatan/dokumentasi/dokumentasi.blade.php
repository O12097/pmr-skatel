@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Dokumentasi')
<link href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.css" rel="stylesheet" />

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
    @if (session('successKegiatan'))
        <script>
            $(document).ready(function() {
                Alert.success("{{ session('successKegiatan') }}", 'Berhasil', {
                    displayDuration: 5000
                });
            });
        </script>
    @endif
    @if (session('successUpdateKegiatan'))
        <script>
            $(document).ready(function() {
                Alert.success("{{ session('successUpdateKegiatan') }}", 'Berhasil', {
                    displayDuration: 5000
                });
            });
        </script>
    @endif
    @if (session('successDeleteKegiatan'))
        <script>
            $(document).ready(function() {
                Alert.success("{{ session('successDeleteKegiatan') }}", 'Berhasil', {
                    displayDuration: 5000
                });
            });
        </script>
    @endif

    <div class="flex">
        <!-- Left Section - Card View -->
        <div class="w-3/5 p-4 text-xl">
            <a href="{{ route('kegiatan.dokumentasi.createForm') }}" class="btn btn-primary">Tambah Kegiatan</a>

            @isset($dataKegiatan)
                <div class="grid grid-cols-1 gap-4">
                    @foreach ($dataKegiatan as $item)
                        <div class="border p-5 rounded relative flex justify-between items-center">
                            <a href="{{ route('kegiatan.dokumentasi.detail', ['id' => $item->id_kegiatan]) }}" class="w-full">
                                <p class="text-2xl font-bold">{{ $item->nama_kegiatan }}</p>
                                <p class="text-xl">{{ $item->deskripsi }}</p>
                                <p class="text-sm text-gray-500">
                                    @if ($item->created_at != $item->updated_at)
                                        Dimodifikasi pada {{ $item->updated_at->format('d M Y H:i:s') }}
                                    @else
                                        Dibuat pada {{ $item->created_at->format('d M Y H:i:s') }}
                                    @endif
                                </p>
                            </a>
                            <div class="cursor-pointer" onclick="toggleMenu({{ $item->id_kegiatan }})">
                                <iconify-icon icon="tabler:dots" width="25" height="25"></iconify-icon>
                            </div>
                            <div id="menu-{{ $item->id_kegiatan }}"
                                class="hidden z-50 absolute top-0 right-0 mt-20 bg-white p-2 px-6 rounded shadow">
                                <a href="{{ route('kegiatan.dokumentasi.editForm', ['id' => $item->id_kegiatan]) }}"
                                    class="block py-2">Edit</a>
                                <a href="javascript:void(0);" onclick="confirmDelete({{ $item->id_kegiatan }})"
                                    class="block py-2 text-red-500">Hapus</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            @else
                <p>Data tidak ditemukan</p>
            @endisset
        </div>
        <!-- Right Section - Calendar -->
        <div class="w-2/5 p-4">
            <h3 class="text-xl mb-4">Calendar</h3>
            <!-- FullCalendar Container -->
            <div id="calendar"></div>

            <!-- FullCalendar Initialization Script -->
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.10.2/fullcalendar.min.js"></script>

            <script>
                document.addEventListener('DOMContentLoaded', function() {
                    // Initialize FullCalendar
                    $('#calendar').fullCalendar({
                        header: {
                            left: 'prev,next today',
                            center: 'title',
                            right: 'month,agendaWeek,agendaDay'
                        },
                        events: [
                            @foreach ($dataKegiatan as $item)
                                {
                                    id: {{ $item->id_kegiatan }},
                                    title: '{{ $item->nama_kegiatan }}',
                                    start: '{{ $item->tanggal }}',
                                    url: '{{ route('kegiatan.dokumentasi.detail', ['id' => $item->id_kegiatan]) }}'
                                },
                            @endforeach
                        ],
                        eventClick: function(event) {
                            window.location.href = '/kegiatan/dokumentasi/' + event.id;
                        },
                        eventRender: function(event, element) {
                            // Customize the rendering of each event
                            element.find('.fc-title').html('<a href="' + event.url + '">' + event.title +
                                '</a>');
                        }
                    });
                });

                function confirmDelete(id) {
                    if (confirm('Are you sure you want to delete this kegiatan?')) {
                        window.location.href = '{{ url('/kegiatan/dokumentasi') }}/' + id + '/delete';
                    }
                }

                function toggleMenu(id) {
                    const menu = document.getElementById(`menu-${id}`);
                    menu.classList.toggle('hidden');
                }
            </script>
        </div>
    </div>
@endsection
