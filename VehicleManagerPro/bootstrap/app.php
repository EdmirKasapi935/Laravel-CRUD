<?php

use App\Http\Middleware\GuestCheckMiddleware;
use App\Http\Middleware\IsAdminMiddleware;
use App\Http\Middleware\LoginCheckMiddleware;
use App\Http\Middleware\MyAuthMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;
use Illuminate\Console\Scheduling\Schedule;
use illuminate\Support\Facades\Storage;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        $middleware->alias(["is-user" => LoginCheckMiddleware::class,
                                     "is-guest" => GuestCheckMiddleware::class,
                                     "is-admin" => IsAdminMiddleware::class,
                                     "is-logged-in" => MyAuthMiddleware::class ]);
    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
