<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $middlewareGroups = [
        'web' => [
            \App\Http\Middleware\EncryptCookies::class,
            \Illuminate\Cookie\Middleware\AddQueuedCookiesToResponse::class,
            // ...
            \App\Http\Middleware\VerifyCsrfToken::class,
            // ...
        ],
    ];
    protected $except = [
        'http://127.0.0.1:8000/presensi/proses',
        'http://127.0.0.1:8000/login/proses', //302 -> jadi redirection ke page presensi lagi namun sifatnya sementara
    ];
}
