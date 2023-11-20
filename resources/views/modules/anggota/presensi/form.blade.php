@extends('modules.partials');
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

<style>
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

<div class="w-full h-screen flex items-center justify-center relative bg-stone-50">
    <div class="w-full h-[100px] left-0 top-0 absolute">
        <div class="w-full h-[100px] left-0 top-0 absolute bg-white border-b border-neutral-200"></div>
        <img class="w-[73.58px] h-[75.43px] left-[66px] top-[12px] absolute" src="{{ asset('images/logo-pmr.png') }}" />
    </div>

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
    </script>

    @if (session('nisTidakTerdaftar'))
        <script>
            $(document).ready(function() {
                Alert.warning("{{ session('nisTidakTerdaftar') }}", 'Peringatan', {
                    displayDuration: 3000
                });
            });
        </script>
    @endif

    @if (session('presensiBerhasil'))
        <script>
            $(document).ready(function() {
                Alert.success("{{ session('presensiBerhasil') }}", 'Berhasil', {
                    displayDuration: 3000
                });
            });
        </script>
    @endif


    <div
        class="w-[123px] h-[38px] left-[455px] top-[107px] absolute justify-start items-center gap-[9px] inline-flex z-50">
        <div class="text-neutral-700 text-[20px] font-normal font-['Inria Sans'] leading-[38.01px]">
            <a href="/">
                Kembali
            </a>
        </div>
        <iconify-icon icon="material-symbols:arrow-forward-ios-rounded"
            class="w-[15px] h-[15px] pl-[2.82px] pr-[2.67px] pt-px pb-[1.05px] justify-center items-center flex"></iconify-icon>
        <div class="text-red-700 text-[20px] font-bold font-['Inria Sans'] leading-[38.01px]">Presensi</div>
    </div>


    <div class="w-[1020px] h-[647px] absolute">
        <div class="w-[1020px] h-[647px] left-0 top-0 absolute bg-white rounded-[5px] shadow"></div>
        {{-- FORM PRESENSI --}}
        <form action="{{ route('anggota.presensi.submit') }}" method="POST">
            @csrf

            {{-- FIELD NIS --}}
            <input type="text" placeholder="NIS" name="nis"
                class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[54px] absolute bg-white rounded-[15px] border border-zinc-400 justify-center items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                required />
            {{-- END FIELD NIS --}}

            {{-- FIELD TANGGAL PRESENSI  --}}
            <input type="date" id="tanggal_presensi"
                class="w-[843px] h-[62px] px-[20px] py-4 left-[89px] top-[161px] absolute bg-white rounded-[15px] border border-zinc-400 justify-start items-center gap-[613px] inline-flex text-xl font-normal font-['Inria Sans']"
                required />
            {{-- END TANGGAL PRESENSI --}}

            {{-- FIELD STATUS --}}
            <div class="w-[137px] h-[154px] left-[103px] top-[260px] absolute">
                <label
                    class="w-[400px] h-[30px] left-0 top-0 absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                    Status Presensi</label>

                <span>
                    <input type="radio" id="hadir" name="status_presensi" value="hadir"
                        class="w-[18px] h-[18px] left-[4px] top-[50px] absolute bg-white rounded-full border border-zinc-400"
                        required>
                    <label for="hadir"
                        class="w-[103px] h-[30px] left-[34px] top-[45px] absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                        Hadir
                    </label>

                    <input type="radio" id="sakit" name="status_presensi" value="sakit"
                        class="w-[18px] h-[18px] left-[4px] top-[90px] absolute bg-white rounded-full border border-zinc-400"
                        required>
                    <label for="sakit"
                        class="w-[103px] h-[30px] left-[34px] top-[84px] absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                        Sakit
                    </label>

                    <input type="radio" id="izin" name="status_presensi" value="izin"
                        class="w-[18px] h-[18px] left-[4px] top-[130px] absolute bg-white rounded-full border border-zinc-400"
                        required>
                    <label for="izin"
                        class="w-[103px] h-[30px] left-[34px] top-[124px] absolute text-neutral-900 text-xl font-normal font-['Inria Sans']">
                        Izin
                    </label>
                </span>
            </div>
            {{-- END FIELD STATUS --}}

            {{-- FIELD BUTTON KIRIM --}}
            <button type="submit"
                class="w-[843px] h-[63px] px-[131px] py-3.5 left-[89px] top-[545px] absolute bg-red-700 rounded-[10px] shadow justify-center items-center gap-2.5 inline-flex">
                <div class="text-white text-xl font-bold font-['Inria Sans']">KIRIM</div>
            </button>
            {{-- END FIELD KIRIM --}}

        </form>
        {{-- END FORM PRESENSI --}}
    </div>
</div>
