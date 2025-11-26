<?php

use Illuminate\Foundation\Application;
use Illuminate\Foundation\Configuration\Exceptions;
use Illuminate\Foundation\Configuration\Middleware;

return Application::configure(basePath: dirname(__DIR__))
    ->withRouting(
        web: __DIR__.'/../routes/web.php',
        commands: __DIR__.'/../routes/console.php',
        health: '/up',
    )
    ->withMiddleware(function (Middleware $middleware): void {
        $middleware->alias([
            'admin' => \App\Http\Middleware\CheckAdmin::class,
            'throttle.contact' => \App\Http\Middleware\ThrottleContactForm::class,
        ]);
    })
    ->withProviders([
        \App\Providers\AuthServiceProvider::class,
    ])
    ->withExceptions(function (Exceptions $exceptions): void {
        // Handle validation exceptions
        $exceptions->renderable(function (\Illuminate\Validation\ValidationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Validation failed',
                    'errors' => $e->errors()
                ], 422);
            }
        });

        // Handle model not found exceptions
        $exceptions->renderable(function (\Illuminate\Database\Eloquent\ModelNotFoundException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Resource not found'
                ], 404);
            }
            
            return redirect()->route('home')->with('error', 'The requested resource was not found.');
        });

        // Handle authorization exceptions
        $exceptions->renderable(function (\Illuminate\Auth\Access\AuthorizationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthorized action'
                ], 403);
            }
            
            return redirect()->back()->with('error', 'You are not authorized to perform this action.');
        });

        // Handle authentication exceptions
        $exceptions->renderable(function (\Illuminate\Auth\AuthenticationException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Unauthenticated'
                ], 401);
            }
            
            return redirect()->route('login')->with('error', 'Please login to continue.');
        });

        // Handle throttle exceptions (rate limiting)
        $exceptions->renderable(function (\Illuminate\Http\Exceptions\ThrottleRequestsException $e, $request) {
            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'Too many attempts. Please try again later.'
                ], 429);
            }
            
            return redirect()->back()->with('error', 'Too many attempts. Please slow down.');
        });

        // Handle database exceptions
        $exceptions->renderable(function (\Illuminate\Database\QueryException $e, $request) {
            \Illuminate\Support\Facades\Log::error('Database error', [
                'message' => $e->getMessage(),
                'sql' => $e->getSql() ?? 'N/A',
                'bindings' => $e->getBindings() ?? []
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'A database error occurred'
                ], 500);
            }
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'A database error occurred. Please try again.');
        });

        // Handle general exceptions (catch-all)
        $exceptions->renderable(function (\Throwable $e, $request) {
            // Don't handle in debug mode - let Laravel show detailed error
            if (config('app.debug')) {
                return null;
            }

            \Illuminate\Support\Facades\Log::error('Unhandled exception', [
                'message' => $e->getMessage(),
                'file' => $e->getFile(),
                'line' => $e->getLine(),
                'trace' => $e->getTraceAsString()
            ]);

            if ($request->expectsJson()) {
                return response()->json([
                    'message' => 'An unexpected error occurred'
                ], 500);
            }
            
            return redirect()->back()
                ->withInput()
                ->with('error', 'An unexpected error occurred. Please try again.');
        });
    })->create();
