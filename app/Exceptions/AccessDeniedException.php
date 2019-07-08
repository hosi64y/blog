<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;

class AccessDeniedException extends Exception
{
    public function __construct($message = "", $code = 0, Throwable $previous = null)
    {
        $message=__('شما مجوز دسترسی به این صفحه را ندارید.');
        parent::__construct($message, $code,  $previous);
    }

    public function render(Request $request)
    {
        if ($request->isJson()){
            return response(['error'=>$this->message],401);
        }
    }
}
