@extends('modules.preloader')


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Log in page</title>
    <link rel="icon" href="{{ asset('/images/logo-pmr.png') }}" type="image/png">

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

        .alert-message {
            line-height: 20px;
            font-size: 15px;
            padding-bottom: 12px;
        }

        .cf,
        .alertt {
            zoom: 1;
        }

        .cf:before,
        .alertt:before,
        .cf:after,
        .alertt:after {
            display: table;
            content: "";
            line-height: 0;
        }

        .cf:after,
        .alertt:after {
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

        .alertt {
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

        .alertt:hover {
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

        .alertt i {
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
            border-color: #146200;
            background-color: #1b8700;
        }

        .alert-error {
            --tw-bg-opacity: 1;
            color: #fff;
            border-color: rgb(185 28 28 / var(--tw-bg-opacity));
            background-color: rgb(220 38 38 / var(--tw-bg-opacity));
        }
    </style>

</head>

<body class=" bg-neutral-100">

    @if (session('notLoginPage'))
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
                        .addClass("alertt")
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
            $(document).ready(function() {
                Alert.error('{{ session('notLoginPage') }}', 'Peringatan', {
                    displayDuration: 3000
                });
            });
        </script>
    @endif


    <div class="w-[914px] h-[580px] bg-white rounded-2xl shadow m-auto mt-32">

        {{-- RIGHT SECTION --}}
        <div class="w-[383px] h-[102px] left-[998px] top-[204px] absolute">
            <div
                class="logo-pmr w-[383px] h-[27px] left-0 top-[75px] absolute text-center text-black text-2xl font-bold font-['Inria Sans']">
                PALANG MERAH REMAJA</div>
            <img class="w-[73.58px] h-[75.43px] left-[149.58px] top-0 absolute"
                src="{{ asset('images/logo-pmr.png') }}" />
        </div>

        {{-- ALERT EMAIL/PASSWORD INCORRECT SECTION --}}
        <div class="w-[333px] h-[252px] left-[1025px] top-[333px] absolute">
            @if (Session::has('alert'))
                <div class="alert alert-danger transition ease-in delay-50">
                    <div class="w-[332px] h-[29px] left-0 top-0 bg-white rounded-[5px] shadow absolute"></div>
                    <div
                        class=" left-[14px] top-[7px] absolute justify-start items-center gap-2.5 inline-flex w-[286px] text-neutral-700 text-[10px] font-bold font-['Inria Sans']">
                        <iconify-icon icon="mingcute:warning-fill" style="color: #e4262c;" width="15" height="15"
                            class="justify-center items-center flex relative left-0 top-0"></iconify-icon>
                        {{ Session::get('alert') }}
                    </div>
                </div>
            @endif
        </div>
        {{-- END ALERT EMAIL/PASSWORD INCORRECT SECTION --}}

        <div class="w-[333px] h-[252px] left-[1025px] top-[383px] absolute">

            <form action="/login/proses" method="post">
                @csrf
                <input type="email" name="email" placeholder="E-mail"
                    class="placeholder w-[332px] h-[49px] opacity-90 bg-white rounded-[10px] border border-zinc-400  text-xl font-normal font-['Inria Sans']"
                    required>
                <iconify-icon icon="basil:user-solid" class="left-[14px] top-[14px] absolute" style="color: #9a9a9a;"
                    width="25" height="25"></iconify-icon>

                <input type="password" name="password" placeholder="Password"
                    class="placeholder w-[332px] h-[49px] left-0 top-[74px] absolute opacity-90 bg-white rounded-[10px] border border-zinc-400  text-xl font-normal font-['Inria Sans']"
                    id="myPass" required> {{--  minlength="8" --}}
                <iconify-icon icon="mdi:password-reset" style="color: #9a9a9a;" class="left-[14px] top-[88px] absolute"
                    width="25" height="25"></iconify-icon>

                {{-- SHOW/HIDE PASSWORD ICON --}}
                <span id="showPass">
                    <iconify-icon icon="iconoir:eye-alt" style="color: #9a9a9a;"
                        class="show-icon left-[290px] top-[87px] absolute" width="25" height="25"
                        aria-hidden="true"></iconify-icon>
                    <iconify-icon icon="fluent:eye-12-filled" style="color: #9a9a9a;"
                        class="hide-icon left-[290px] top-[87px] absolute" width="25" height="25"
                        aria-hidden="true" style="display:none;"></iconify-icon>
                </span>
                {{-- END SHOW/HIDE PASSWORD ICON --}}


                <button type="submit" name="submit"
                    class="w-[332px] h-[45px] px-[131px] py-3.5 left-0 top-[154px] absolute transition ease-in-out delay-50 bg-red-600 hover:bg-red-700 duration-300 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex text-white text-xl font-bold font-['Inria Sans']">LOGIN</button>
            </form>
        </div>

        {{-- END RIGHT SECTION --}}
        <div class="KembaliKeHalamanLanding left-[1055px] top-[605px] absolute text-neutral-700 text-xm font-normal font-['Inria Sans']">Kembali ke halaman landing?
  <span class=" text-red-700"><a href="/">Klik di sini</a></span> </div>

    </div>

    {{-- LEFT SECTION --}}
    <img class="w-[387px] h-[377px] left-[530px] top-[235px] absolute" src="images/skatel-assets.png" />
    {{-- END LEFT SECTION --}}

    </div>
    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 201" fill="none">
        <path
            d="M-18.3818 25.052C568.009 134.659 999.881 117.078 1440 25.052V201H-18.3818C-18.3818 201 -604.773 -84.5549 -18.3818 25.052Z"
            fill="#E4262C" />
    </svg>

</body>

<script id="rendered-js">
    $(document).ready(function() {
        var passwordField = $("#myPass");
        var showIcon = $(".show-icon");
        var hideIcon = $(".hide-icon");

        // nyembunyiin password dan menampilkan iconoir:eye-alt secara default
        passwordField.attr("type", "password");
        showIcon.show();
        hideIcon.hide();

        $("#showPass").click(function() {
            if (passwordField.attr("type") == "password") {
                passwordField.attr("type", "text");
                showIcon.hide();
                hideIcon.show();
            } else {
                passwordField.attr("type", "password");
                showIcon.show();
                hideIcon.hide();
            }
        });
    });
</script>

</html>
