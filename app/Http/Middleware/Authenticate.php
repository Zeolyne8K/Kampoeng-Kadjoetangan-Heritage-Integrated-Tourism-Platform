<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        if (! $request->expectsJson()) {
            // Jika mencoba akses admin panel tanpa login, redirect ke admin login
            if ($request->is('admin/*')) {
                return route('admin.auth.showLoginForm');
            }
            
            // Default redirect ke login user
            return route('login');
        }

        return null;
    }
}
