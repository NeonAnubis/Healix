<?php

namespace App\Http\Middleware;

use App\Enums\UserRole;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, string ...$roles): Response
    {
        $userRole = session('mock_role', UserRole::Admin->value);
        $allowedRoles = array_map(fn($r) => UserRole::from($r), $roles);
        $currentRole = UserRole::from($userRole);

        if (!in_array($currentRole, $allowedRoles)) {
            abort(403, 'Unauthorized. Required role: ' . implode(' or ', $roles));
        }

        return $next($request);
    }
}
