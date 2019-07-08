<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Throwable;

class LoginFaildException extends Exception
{
    public function __construct($message="" , $code = 0, Throwable $previous = null) {

        $message=__("کاربری با این مشخصات یافت نشد");
        parent::__construct($message, $code = 100,  $previous);
    }

    public function render(Request $request)
    {

        if ($request->isJson())
            return response(['error'=>$this->message],401);
    }

}
