@extends('modules.preloader')
@extends('modules.partials')

@section('title', 'Dokumentasi')

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
    {{-- <form action="<?php echo BASE_URL . "module/kategori/action.php?kategori_id=$kategori_id"; ?>" method="POST">

        <div class="element-form">
            <label>Jurusan</label>
            <span>
                <input type="text" name="jurusan" value="<?php echo $kategori; ?>" />
            </span>
        </div>
        <div class="element-form">
            <label>Status</label>
            <span>
                <input type="radio" name="status" value="on" <?php if ($status == 'on') {
                    echo "checked='true'";
                } ?> /> On
                <input type="radio" name="status" value="off" <?php if ($status == 'off') {
                    echo "checked='true'";
                } ?> /> Off
            </span>
        </div>
        <div class="element-form">
            <span>
                <input type="submit" name="button" value="<?php echo $button; ?>" />
            </span>
        </div>

    </form> --}}
@endsection
