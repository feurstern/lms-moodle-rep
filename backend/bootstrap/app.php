<?php

use App\Http\Middleware\AdminMiddleware;
use App\Http\Middleware\CheckRoleMiddleware;
use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__ . '/../routes/web.php',
        api: __DIR__ . '/../routes/api.php',
        commands: __DIR__ . '/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware) {
        // globally
        // $middleware->append(CheckRoleMiddleware::class);

        // append to group
        $middleware->appendToGroup("test", [
            // we can implemet that group middleware aboeve in the route
            CheckRoleMiddleware::class,
            AdminMiddleware::class
        ]);


        // apend to the specific routes parent like web or api
        // $middleware->api(append:[
        //     CheckRoleMiddleware::class,
        //     AdminMiddleware::class,
        // ]);


        // you can use aallias to the middleware

        $middleware->alias([
            "checkRole" => CheckRoleMiddleware::class,
            "adminROle" => AdminMiddleware::class,
        ]);
        

    })
    ->withExceptions(function (Exceptions $exceptions) {
        //
    })->create();
