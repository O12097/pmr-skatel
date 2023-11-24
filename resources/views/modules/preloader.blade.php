<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        @keyframes rotate {
            0% {    
                transform: translate(-50%, -50%) rotate(0deg);
            }

            100% {
                transform: translate(-50%, -50%) rotate(360deg);
            }
        }
    </style>
</head>

<body>
    {{-- <div x-show="loaded" x-init="window.addEventListener('DOMContentLoaded', () => { setTimeout(() => loaded = false, 500) })"
        class="fixed left-0 top-0 z-999999 flex h-screen w-screen items-center justify-center bg-white">
        <div class="h-16 w-16 animate-spin rounded-full border-4 border-solid border-primary border-t-transparent"></div>
    </div> --}}

    <div id="splash-loading" class="fixed left-0 top-0 z-50 flex h-screen w-screen items-center justify-center bg-black bg-opacity-75">
        <img src="{{ asset('images/logo-pmr.png') }}" alt="Splash Loading Image" width="50" height="50" class="animate-spin" />
    </div>

    <script>
        window.addEventListener('DOMContentLoaded', () => { 
            var splashLoading = document.getElementById('splash-loading');
            setTimeout(function() {
                splashLoading.style.display = 'none';
            }, 500);
        });
    </script>
</body>

</html>
