<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Exceptions\UnauthorizedException;

class Authenticate extends Middleware
{
    protected function redirectTo($request): ?string
    {
        if ($this->isApiRequest($request)) {
            throw new UnauthorizedException();
        }

        return route('login');
    }

    protected function isApiRequest(Request $request): bool
    {
        return Str::startsWith($request->path(), 'api');
    }
}
