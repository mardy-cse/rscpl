<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Symfony\Component\HttpFoundation\Response;

class ThrottleContactForm
{
    /**
     * Handle an incoming request.
     *
     * Maximum 3 submissions per hour per email address.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $email = $request->input('email');

        if (!$email) {
            return $next($request);
        }

        $key = 'contact_form_' . md5($email);
        $attempts = Cache::get($key, 0);

        // Allow max 3 submissions per hour per email
        if ($attempts >= 3) {
            if ($request->ajax() || $request->wantsJson()) {
                return response()->json([
                    'success' => false,
                    'message' => 'Maximum contact form submissions reached. Please try again later.',
                ], 429);
            }

            return redirect()->back()
                ->with('error', 'Maximum contact form submissions reached. Please try again later.')
                ->withInput();
        }

        // Increment attempts counter (expires in 1 hour)
        Cache::put($key, $attempts + 1, now()->addHour());

        return $next($request);
    }
}
