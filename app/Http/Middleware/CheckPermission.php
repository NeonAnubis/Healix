<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckPermission
{
    public function handle(Request $request, Closure $next, string $permission): Response
    {
        $userRole = UserRole::from(session('mock_role', UserRole::Admin->value));

        if (!$userRole->hasPermission($permission)) {
            abort(403, 'Insufficient permissions.');
        }

        return $next($request);
    }
}
