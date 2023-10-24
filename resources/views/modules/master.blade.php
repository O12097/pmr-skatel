<!DOCTYPE html>
<html lang="en">

<head>
    <style>
        #splash-loading {
            position: fixed;
            top: 45%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50px;
            height: 50px;
            animation: rotate 2s linear infinite;
            z-index: 9999;
            background-position: center;
        }

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
    <div id="splash-loading">
        <img src="{{ asset('images/logo-pmr.png') }}" alt="Splash Loading Image" width="50" height="50" />
    </div>

    <script>
        window.addEventListener('load', function() {
            var splashLoading = document.getElementById('splash-loading');
            setTimeout(function() {
                splashLoading.style.display = 'none';
            }, 500);
        });
    </script>
</body>

</html>
