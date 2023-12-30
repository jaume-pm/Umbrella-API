<?php

namespace App\Exceptions;

use Exception;

class UnauthorizedException extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'Unauthorized. Please provide a valid Token.'], 401);
    }
}