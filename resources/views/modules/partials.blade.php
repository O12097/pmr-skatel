<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title')</title>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inria+Sans:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://unicons.iconscout.com/release/v4.0.0/css/line.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
        integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css">

    <link rel="canonical" href="https://codepen.io/sapan/pen/MyreMN" />
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600&amp;text=abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789%20"
        rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.min.css" />


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://code.iconify.design/iconify-icon/1.0.7/iconify-icon.min.js"></script>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script id="rendered-js">
        var Alert = undefined;

        (function(Alert) {
            var alert, error, trash, info, success, warning, _container;
            info = function(message, title, options) {
                return alert("info", message, title, "fa fa-info-circle", options);
            };
            warning = function(message, title, options) {
                return alert("warning", message, title, "fa fa-warning", options);
            };
            error = function(message, title, options) {
                return alert(
                    "error",
                    message,
                    title,
                    "fa fa-exclamation-circle",
                    options
                );
            };

            trash = function(message, title, options) {
                return alert("trash", message, title, "fa fa-trash-o", options);
            };

            success = function(message, title, options) {
                return alert(
                    "success",
                    message,
                    title,
                    "fa fa-check-circle",
                    options
                );
            };
            alert = function(type, message, title, icon, options) {
                var alertElem,
                    messageElem,
                    titleElem,
                    iconElem,
                    innerElem,
                    _container;
                if (typeof options === "undefined") {
                    options = {};
                }
                options = $.extend({}, Alert.defaults, options);
                if (!_container) {
                    _container = $("#alerts");
                    if (_container.length === 0) {
                        _container = $("<ul>").attr("id", "alerts").appendTo($("body"));
                    }
                }
                if (options.width) {
                    _container.css({
                        width: options.width,
                    });
                }
                alertElem = $("<li>")
                    .addClass("alert")
                    .addClass("alert-" + type);
                setTimeout(function() {
                    alertElem.addClass("open");
                }, 1);
                if (icon) {
                    iconElem = $("<i>").addClass(icon);
                    alertElem.append(iconElem);
                }
                innerElem = $("<div>").addClass("alert-block");
                //innerElem = $("<i>").addClass("fa fa-times");
                alertElem.append(innerElem);
                if (title) {
                    titleElem = $("<div>").addClass("alert-title").append(title);
                    innerElem.append(titleElem);
                }
                if (message) {
                    messageElem = $("<div>").addClass("alert-message").append(message);
                    //innerElem.append("<i class="fa fa-times"></i>");
                    innerElem.append(messageElem);
                    //innerElem.append("<em>Click to Dismiss</em>");
                    //      innerElemc = $("<i>").addClass("fa fa-times");
                }
                if (options.displayDuration > 0) {
                    setTimeout(function() {
                        leave();
                    }, options.displayDuration);
                } else {
                    innerElem.append("<em>Click to Dismiss</em>");
                }
                alertElem.on("click", function() {
                    leave();
                });

                function leave() {
                    alertElem.removeClass("open");
                    alertElem.one(
                        "webkitTransitionEnd otransitionend oTransitionEnd msTransitionEnd transitionend",
                        function() {
                            return alertElem.remove();
                        }
                    );
                }
                return _container.prepend(alertElem);
            };
            Alert.defaults = {
                width: "",
                icon: "",
                displayDuration: 3000,
                pos: "",
            };

            Alert.info = info;
            Alert.warning = warning;
            Alert.error = error;
            Alert.trash = trash;
            Alert.success = success;
            return (_container = void 0);
        })(Alert || (Alert = {}));

        this.Alert = Alert;

        $("#test").on("click", function() {
            Alert.info("Message");
        });
    </script>
    <style>
        .alert-message {
            line-height: 20px;
            font-size: 15px;
            padding-bottom: 12px;
        }

        .unstyled {
            margin: 0;
            list-style: none;
        }

        .unstyled a,
        .unstyled #test {
            width: 120px;
            text-decoration: none;
            padding: 0.5em 1em;
            background-color: #213347;
            border-radius: 4px;
            display: block;
            margin-bottom: 0.5em;
            font-size: 15px;
            font-weight: 300;
        }

        .unstyled a:hover,
        .unstyled #test:hover {
            background-color: #f25c5d;
        }

        .cf,
        .alert {
            zoom: 1;
        }

        .cf:before,
        .alert:before,
        .cf:after,
        .alert:after {
            display: table;
            content: "";
            line-height: 0;
        }

        .cf:after,
        .alert:after {
            clear: both;
        }

        #alerts {
            width: 400px;
            top: 12px;
            right: 50px;
            position: fixed;
            z-index: 9999;
            list-style: none;
        }

        .alert {
            width: 100%;
            margin-bottom: 8px;
            display: block;
            position: relative;
            border-left: 4px solid;
            right: -50px;
            opacity: 0;
            line-height: 1;
            padding: 0;
            transition: right 400ms, opacity 400ms, line-height 300ms 100ms,
                padding 300ms 100ms;
            display: table;
        }

        .alert:hover {
            cursor: pointer;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
        }

        .open {
            right: 0;
            opacity: 1;
            line-height: 2;
            padding: 3px 15px;
            transition: line-height 200ms, padding 200ms, right 350ms 200ms,
                opacity 350ms 200ms;
        }

        .alert-title {
            font-weight: bold;
        }

        .alert-block {
            width: 80%;
            width: -webkit-calc(100% - 10px);
            width: calc(100% - 10px);
            text-align: left;
        }

        .alert-block em,
        .alert-block small {
            font-size: 0.75em;
            opacity: 0.75;
            display: block;
        }

        .alert i {
            font-size: 2em;
            width: 1.5em;
            max-height: 48px;
            top: 50%;
            margin-top: -12px;
            display: table-cell;
            vertical-align: middle;
        }

        .alert-success {
            color: #fff;
            border-color: #539753;
            background-color: #8fbf2f;
        }

        .alert-error {
            color: #fff;
            border-color: #dc4a4d;
            background-color: #f25c5d;
        }

        .alert-trash {
            color: #fff;
            border-color: #dc4a4d;
            background-color: #f25c5d;
        }

        .alert-info {
            color: #fff;
            border-color: #076d91;
            background-color: #3397db;
        }

        .alert-warning {
            color: #fff;
            border-color: #dd6137;
            background-color: #f7931d;
        }


        body {
            background: #f8f8f8;
            font-family: 'Inria Sans';
            overflow-y: hidden;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            display: flex;

        }

        form .placeholder {
            padding-left: 20px;
        }

        .select-wrapper select {
            appearance: none;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        #showPass {
            cursor: pointer;
        }

        .sidebar {
            transform: translateX(-100%);
            width: 325px;
            transition: transform 0.8s ease;
            position: fixed;
            height: 100%;
            top: 0;
            left: 0;
            z-index: 1;
        }

        .sidebar.show {
            transform: translateX(0%);
        }

        .content-container {
            flex: 1;
            margin-left: 0;
            transition: margin-left 0.8s ease;
            z-index: 0;
        }

        .navbar {
            height: 98.36px;
            background-color: #ffffff;
            border-bottom: 1px solid #ccc;
            display: grid;
            grid-template-columns: auto 1fr auto;
            justify-content: space-between;
            align-items: center;
            padding: 0 20px;
            width: 100%;

        }

        .content {
            margin-left: 200px;
            padding: 20px;
            width: calc(100% - 40px);
        }

        .section-content {
            width: calc(100% - 200px);
        }

        .sidebar.show+.content-container {
            margin-left: 150px;

        }


        @media screen and (max-width: 768px) {

            .sidebar.show .page-title,
            .sidebar.show .sidebar-icon {
                left: 20px;
            }
        }

        .sidebar-icon,
        .page-title {
            transition: margin-left 0.8s ease;
        }

        .page-title,
        .sidebar-icon {
            margin-left: -325px;
        }

        @keyframes slideIn {
            from {
                margin-left: -325px;
            }

            to {
                margin-left: 0;
            }
        }

        .sidebar.show .page-title,
        .sidebar.show .sidebar-icon {
            animation: slideIn 0.8s ease forwards;
        }

        .sidebar-submenu {
            padding-top: 5px;
            padding-left: 56px;
            font-size: 20px;
            color: #444;
        }

        .sidebar-submenu li {
            margin-top: 20px
        }


        .sidebar-dropdown-toggle {
            position: relative;
        }

        .sidebar-dropdown-icon {
            position: absolute;
            right: 10px;
            top: 50%;
            transform: translateY(-50%);
        }

        .sidebar ul li.active>a,
        .sidebar ul li.active>a {
            background-color: #CC0606;
            color: #fff;
        }

        ul .sidebar-submenu li.active>a,
        .sidebar-submenu li.active>a {
            color: #CC0606;
            background-color: transparent;
        }

        .alert-message {
            line-height: 20px;
            font-size: 15px;
            padding-bottom: 12px;
        }

        .cf,
        .alert {
            zoom: 1;
        }

        .cf:before,
        .alert:before,
        .cf:after,
        .alert:after {
            display: table;
            content: "";
            line-height: 0;
        }

        .cf:after,
        .alert:after {
            clear: both;
        }

        #alerts {
            width: 400px;
            top: 12px;
            right: 50px;
            position: fixed;
            z-index: 9999;
            list-style: none;
        }

        .alert {
            width: 100%;
            margin-bottom: 8px;
            display: block;
            position: relative;
            border-left: 4px solid;
            right: -50px;
            opacity: 0;
            line-height: 1;
            padding: 0;
            transition: right 400ms, opacity 400ms, line-height 300ms 100ms,
                padding 300ms 100ms;
            display: table;
        }

        .alert:hover {
            cursor: pointer;
            box-shadow: 0 0 6px rgba(0, 0, 0, 0.3);
        }

        .open {
            right: 0;
            opacity: 1;
            line-height: 2;
            padding: 3px 15px;
            transition: line-height 200ms, padding 200ms, right 350ms 200ms,
                opacity 350ms 200ms;
        }

        .alert-title {
            font-weight: bold;
        }

        .alert-block {
            width: 80%;
            width: -webkit-calc(100% - 10px);
            width: calc(100% - 10px);
            text-align: left;
        }

        .alert-block em,
        .alert-block small {
            font-size: 0.75em;
            opacity: 0.75;
            display: block;
        }

        .alert i {
            font-size: 2em;
            width: 1.5em;
            max-height: 48px;
            top: 50%;
            margin-top: -12px;
            display: table-cell;
            vertical-align: middle;
        }

        .alert-success {
            color: #fff;
            border-color: #539753;
            background-color: #8fbf2f;
        }

        .alert-error {
            --tw-bg-opacity: 1;
            color: #fff;
            border-color: rgb(185 28 28 / var(--tw-bg-opacity));
            background-color: rgb(220 38 38 / var(--tw-bg-opacity));
        }
    </style>
    @stack('styles')
</head>

<body>
    @if (Auth::check())

        {{-- ALERT JS --}}
        @if (session('successLogin'))
            <script id="rendered-js">
                $(document).ready(function() {
                    Alert.success('{{ session('successLogin') }}', 'Log in berhasil', {
                        displayDuration: 3000
                    });
                });
            </script>
            {{-- END ALERT JS --}}
        @endif


        <nav class="sidebar bg-stone-50 w-[325px] h-[1047px] absolute shadow">
            <div class="w-full h-[105.63px] top-[50px] relative">
                <h1 class="text-center text-black text-2xl font-bold font-InriaSans absolute bottom-0 w-full mb-[25px]">
                    PALANG MERAH REMAJA
                </h1>
                <img class="w-[73.58px] h-[78.11px] absolute left-1/2 transform -translate-x-1/2 -translate-y-1/2"
                    src="{{ asset('images/logo-pmr.png') }}" alt="Logo PMR" />
            </div>

            <div
                class="w-[278px] h-[813px] absolute left-1/2 transform -translate-x-1/2 top-[146px] bg-white rounded-[5px] shadow">
                <ul class="mt-[10px]">
                    <li class="mb-3 active" id="dashboard">
                        <a href="/dashboard"
                            class="sidebar-dropdown-toggle flex items-center py-2 px-4 text-neutral-700 text-[20px] hover:bg-neutral-100 transition duration-300 rounded">
                            <iconify-icon icon="carbon:dashboard-reference" class="mr-2" height="25"
                                width="25"></iconify-icon>
                            Dashboard
                        </a>
                    </li>
                    <li class="mb-3 has-submenu relative" id="anggota">
                        <a href="#"
                            class="sidebar-dropdown-toggle flex items-center py-2 px-4 text-neutral-700 text-[20px] hover:bg-neutral-100 transition duration-300 rounded">
                            <iconify-icon icon="fluent:people-team-16-regular" class="mr-2" height="25"
                                width="25"></iconify-icon>
                            Anggota
                            <span class="absolute right-2 top-1/2 transform -translate-y-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 i-drop-down"
                                    data-icon="carbon:arrow-down" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 i-drop-up hidden"
                                    data-icon="carbon:arrow-up" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                        d="M5 15l7-7 7 7">
                                    </path>
                                </svg>
                            </span>
                        </a>
                        <ul class="ml-8 hidden sidebar-submenu">
                            <li class="mb-2">
                                <a href="{{ route('anggota.data') }}" class="text-neutral-700 hover:text-red-700"
                                    id="submenu-anggota-data">
                                    Data Anggota
                                </a>
                            </li>
                            <li class="mb-2">
                                <a href="{{ route('anggota.presensi') }}" class="text-neutral-700 hover:text-red-700"
                                    id="submenu-anggota-presensi">
                                    Presensi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('anggota.pendaftar') }}" class="text-neutral-700 hover:text-red-700"
                                    id="submenu-anggota-pendaftar">
                                    Pendaftar
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="mb-3 has-submenu relative" id="kegiatan">
                        <a href="#"
                            class="sidebar-dropdown-toggle flex items-center py-2 px-4 text-neutral-700 text-[20px] hover:bg-neutral-100 transition duration-300 rounded">
                            <iconify-icon icon="solar:calendar-linear" class="mr-2" height="25"
                                width="25"></iconify-icon>
                            Kegiatan
                            <span class="absolute right-2 top-1/2 transform -translate-y-1/2">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 i-drop-down"
                                    data-icon="carbon:arrow-down" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth={2}
                                        d="M19 9l-7 7-7-7">
                                    </path>
                                </svg>
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 i-drop-up hidden"
                                    data-icon="carbon:arrow-up" fill="none" viewBox="0 0 24 24"
                                    stroke="currentColor">
                                    <path strokeLinecap="round" strokeLinejoin="round" strokeWidth="2"
                                        d="M5 15l7-7 7 7">
                                    </path>
                                </svg>

                            </span>
                        </a>
                        <ul class="ml-8 hidden sidebar-submenu">
                            <li class="mb-2">
                                <a href="{{ route('kegiatan.dokumentasi') }}"
                                    class="text-neutral-700 hover:text-red-700" id="submenu-kegiatan-dokumentasi">
                                    Dokumentasi
                                </a>
                            </li>
                            <li>
                                <a href="{{ route('kegiatan.kalender') }}" class="text-neutral-700 hover:text-red-700"
                                    id="submenu-kegiatan-kalender">
                                    Kalender
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="absolute bottom-0 left-0 right-0">
                        <a href="" onclick="logoutConfirm()"
                            class="logout-link flex items-center py-2 px-4 text-white text-[20px] bg-red-700 hover:bg-red-800 transition duration-300 rounded">
                            <iconify-icon icon="codicon:sign-out" class="mr-2" height="25"
                                width="25"></iconify-icon>
                            Keluar
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

        <div class="content-container">
            <nav class="navbar flex justify-between items-center flex-grow px-4">
                <div class="navbar w-full h-[98.36px] left-[325px] top-0 absolute">
                    <div class="navbar w-full h-[98.36px] left-0 top-0 absolute border-neutral-200"></div>
                    <div
                        class="w-full h-[98.36px] left-[27px] top-0 absolute justify-start items-start gap-[369px] inline-flex">
                        <div class="justify-start items-start gap-[19px] flex">
                            <h1
                                class="page-title w-[324px] h-[41.31px] left-[86px] top-[29px] absolute text-neutral-800 text-[35px] font-bold font-['Inria Sans']">
                            </h1>
                            <iconify-icon id="sidebarIcon" icon="mdi:hamburger-open"
                                style="color: #cc0606; cursor: pointer;" height="40" width="40"
                                class="sidebar-icon left-[27px] top-[36.39px] absolute"></iconify-icon>
                        </div>

                        <div class="search-container w-[292px] h-[42.34px] left-[779px] top-[33px] relative">
                            <input
                                class="search-input w-[292px] h-[42.34px] pl-3 left-0 top-0 absolute bg-white rounded-[10px] border-2 border-neutral-200 text-neutral-700 text-[20px]" />
                            <div
                                class="w-[45.72px] h-[42.34px] left-[246.28px] top-0 absolute transition ease-in-out delay-50 bg-red-700 hover:bg-red-800 duration-300 rounded-tr-[10px] rounded-br-[10px]">
                            </div>
                            <iconify-icon icon="ic:round-search" style="color: #f8f8f8;" height="25"
                                width="25"
                                class="w-[25.98px] h-[26.46px] left-[256.67px] top-[8.47px] absolute"></iconify-icon>
                        </div>
                    </div>
                </div>

            </nav>

            <div class="content">
                <section class="section-content">
                    @yield('content')
                </section>
            </div>
        </div>
    @endif
</body>

<script>
    $(document).ready(function() {
        var sidebarTertutup = true;

        function toggleSidebar() {
            $(".sidebar").toggleClass("show", sidebarTertutup);
            if (sidebarTertutup) {
                $("#sidebarIcon").attr("icon", "mdi:hamburger-open");
            } else {
                $("#sidebarIcon").attr("icon", "mdi:hamburger-close");
            }
            $(".sidebar").toggleClass("show", sidebarTertutup);
            var sidebarIcon = $("#sidebarIcon");
            if (sidebarTertutup) {
                sidebarIcon.css("opacity", 1);
            } else {
                sidebarIcon.css("opacity", 1);
            }

            sidebarTertutup = !sidebarTertutup;
        }

        toggleSidebar();

        $("#sidebarIcon").on("click", function() {
            toggleSidebar();
        });
    });
</script>

<script>
    $(document).ready(function() {
        $('.sidebar-submenu').hide();

        $('.sidebar-dropdown-toggle').on('click', function(event) {
            event.preventDefault();

            $('.sidebar-submenu').slideUp();
            $('.sidebar-dropdown-toggle .i-drop-up').hide();
            $('.sidebar-dropdown-toggle .i-drop-down').show();

            var submenu = $(this).parent().find('.sidebar-submenu');
            var dropdownIconUp = $(this).parent().find('.i-drop-up');
            var dropdownIconDown = $(this).parent().find('.i-drop-down');
            var submenuIcon = $(this).find('svg');

            if (submenu.is(':hidden')) {
                submenu.slideDown();
                dropdownIconUp.show();
                dropdownIconDown.hide();
                submenuIcon.attr('data-icon',
                    'carbon:arrow-up'); // ikon ke panah atas saat submenu ditampilkan
            } else {
                submenu.slideUp();
                dropdownIconUp.hide();
                dropdownIconDown.show();
                submenuIcon.attr('data-icon',
                    'carbon:arrow-down'); // ikon ke panah bawah saat submenu disembunyikan
            }

            $('.sidebar-dropdown-toggle').not($(this).parent()).find('.sidebar-submenu').slideUp();

            var submenuLink = $(this).attr('href');
            if (submenuLink && submenuLink !== '#') {
                window.location.href = submenuLink;
            }
        });

        var sidebarTertutup = true;

        function toggleSidebar() {
            var marginLeft = sidebarTertutup ? '0' : '-325px';
            $('.page-title, .sidebar-icon').css('margin-left', marginLeft);
            sidebarTertutup = !sidebarTertutup;
        }

        toggleSidebar();

        $('#sidebarIcon').on('click', function() {
            toggleSidebar();
        });
    });
</script>

<script>
    $('.sidebar-submenu li a').on('click', function(event) {
        event.preventDefault();
        var parentMenuId = $(this).closest('.has-submenu').attr('id');

        // ngehapus kelas 'active' dari semua menu dan submenu
        $('.sidebar ul li').removeClass('active');
        $('.sidebar-submenu li').removeClass('active');

        // ini nandain menu yang aktif berdasarkan ID submenu
        $('#' + parentMenuId).addClass('active');
        $(this).parent().addClass('active');

        // ngarahin pengguna ke URL yang benar
        var submenuLink = $(this).attr('href');
        if (submenuLink && submenuLink !== '#') {
            window.location.href = submenuLink;
        }
    });
</script>

<script>
    $(document).ready(function() {
        function setActiveMenu(menuItem) {
            // ngehapus kelas 'active' dari semua menu dan submenu
            $('.sidebar ul li').removeClass('active');
            $('.sidebar-submenu li').removeClass('active');

            // nandain menu yang aktif berdasarkan path URL
            menuItem.addClass('active');

            var parentMenu = menuItem.closest('.has-submenu');
            if (parentMenu.length > 0) {
                parentMenu.addClass('active');
            }
        }

        var currentPath = window.location.pathname;
        var activeMenuItem = $('.sidebar ul li a[href="' + currentPath + '"]');
        setActiveMenu(activeMenuItem.parent());

        $('.sidebar ul li a, .sidebar-submenu li a').on('click', function(event) {
            // ngestack tindakan default mengklik hyperlink
            // event.preventDefault();

            // ngatur menu active saat submenu diklik
            if ($(this).parent().hasClass('has-submenu')) {
                setActiveMenu($(this).closest('.has-submenu'));
            } else {
                setActiveMenu($(this).parent());
            }
        });
        $('.logout-link').on('click', function(event) {
            event.preventDefault();
            window.location.href = '/logout';
        });
    });
</script>

<script>
    $(document).ready(function() {
        function updatePageTitle() {
            var path = window.location.pathname;
            var pageTitle = 'DASHBOARD';

            // menentukan judul halaman berdasarkan URL
            if (path.includes('/anggota/data') || path.includes('/anggota/presensi') || path.includes(
                    '/anggota/pendaftar')) {
                pageTitle = 'ANGGOTA';
            } else if (path.includes('/kegiatan/dokumentasi') || path.includes('/kegiatan/kalender')) {
                pageTitle = 'KEGIATAN';
            }

            $('.page-title').text(pageTitle);
        }

        // pemanggilan fungsi saat halaman dimuat dan saat navigasi berubah
        updatePageTitle();
        $(window).on('popstate', function() {
            updatePageTitle();
        });
    });
</script>

<script>
    function confirmLogout() {
        // Tampilkan alert konfirmasi
        var isConfirmed = confirm("Apakah Anda yakin ingin keluar?");

        // Jika dikonfirmasi, arahkan pengguna ke /logout
        if (isConfirmed) {
            window.location.href = "/logout";
        }
    }
</script>

<script>
    $(function() {
        $('a#logout').click(function() {
            if (confirm('Are you sure to logout')) {
                return true;
            }

            return false;
        });
    });
</script>

<script>
    function logoutConfirm() {
        if (confirm("Apakah Anda yakin ingin keluar?")) {
            location.href = '/logout';
        }
    }
</script>

</html>
