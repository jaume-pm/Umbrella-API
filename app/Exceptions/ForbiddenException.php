<?php

namespace App\Exceptions;

use Exception;

class ForbiddenException extends Exception
{
    public function render($request)
    {
        return response()->json(['error' => 'Forbidden. You do not have a valid token to perform this action.'], 403);
    }
}