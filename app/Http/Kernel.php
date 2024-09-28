<?php
// File: app/Http/Kernel.php

namespace App\Http;

use Illuminate\Foundation\Http\Kernel as HttpKernel;

class Kernel extends HttpKernel
{
    // Middleware lainnya

    protected $routeMiddleware = [
        // Middleware lainnya
        'no-cache' => \App\Http\Middleware\NoCache::class,
    ];
}