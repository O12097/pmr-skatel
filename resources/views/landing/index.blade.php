<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>PMR SMK Telkom Banjarbaru</title>
    <link rel="icon" href="{{ asset('/images/logo-pmr.png') }}" type="image/png">
    @extends('modules.preloader')

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>

    <style>
        /* * {
           overflow-y   : hidden;
        } */
        body {
            background: #f6f6f6;
            font-family: 'Inria Sans';
            overflow-y: hidden;
            overflow-x: hidden;

        }

        form .placeholder {
            padding-left: 50px;
        }

        #showPass {
            cursor: pointer;
        }
    </style>

</head>

<body class=" bg-white">
    <div class="w-[880px] h-[838px] left-[575px] top-[102px] absolute"></div>
    <img class="w-[1200px] h-[980px] left-[720px] top-[33px] absolute" src="{{ asset('images/pmrskatel.png') }}" />
    <div class="w-[887px] h-[708px] left-[553px] top-[64px] absolute"></div>
    <div class="w-[771.67px] h-[1036.75px] left-[-105.73px] top-[-72.30px] absolute">
        <div
            class="w-[851.90px] h-[1951.32px] left-[57.19px] top-[80.11px] absolute origin-top-left rotate-[-7.44deg] bg-white bg-opacity-50">
        </div>
        <div
            class="w-[871.90px] h-[1200.32px] left-[-50px] top-[87.65px] absolute origin-top-left rotate-[-7.44deg] bg-red-600">
        </div>
        <a href="/daftar/form">
            <div
                class="w-auto h-[60.36px] px-[50px] py-3.5 left-[162.73px] top-[635.70px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                <div class="text-stone-50 text-2xl font-bold font-['Inria Sans']">DAFTAR SEKARANG</div>
            </div>
        </a>
    </div>
    <h1
        class="w-[672px] h-[146.03px] left-[58px] top-[274.21px] absolute text-white text-[40px] font-bold font-['Inria Sans']">
        Dapatkan pengalaman<br />berharga dengan bergabung<br />bersama kami!</h1>
    <div class="left-[42px] top-[25.11px] absolute justify-center items-center gap-[1455px] inline-flex">
        <img class="w-[66px] h-[70.03px]" src="{{ asset('images/white_logo-pmr.png') }}" />
        <div class="self-stretch justify-start items-center gap-[61px] inline-flex">
            <a href="/presensi">
                <div class="w-[86px] h-[26.27px] text-red-600 text-xl font-bold font-['Inria Sans']">PRESENSI</div>
            </a>

            <a href="/login">
                <div
                    class="w-[150px] h-[39.53px] px-[45px] py-3.5 transition ease-in-out delay-50 bg-red-600 hover:bg-red-700 duration-300 rounded-[10px] shadow justify-center items-center gap-2.5 flex">
                    <div class="w-[65px] h-[26px] text-white text-xl font-bold font-['Inria Sans']">MASUK</div>
                </div>
            </a>
        </div>
    </div>
</body>

</html>
