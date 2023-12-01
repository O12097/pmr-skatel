@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Edit')

@section('content')
    <form action="{{ route('kelola.akun.editProcess', $user->id_user) }}" method="post">
        @csrf
        @method('PUT')
        <label for="nama_siswa">Nama Siswa</label>
        <input type="text" name="nama_siswa" value="{{ $user->nama_siswa }}" >

        <label for="nis">NIS</label>
        <input type="text" name="nis" value="{{ $user->nis }}" >

        <label for="email">Email</label>
        <input type="email" name="email" value="{{ $user->email }}" >

        <label for="password">Password</label>
        <input type="password" name="password">

        <button type="submit">Simpan Perubahan</button>
    </form>
@endsection
