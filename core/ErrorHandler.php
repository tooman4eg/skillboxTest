<?php

namespace Core;

use ErrorException;

class  ErrorHandler
{
    public static function error($code, $message, $filename, $lineno)
    {
        throw new ErrorException($code, $message, $filename, $lineno);
    }

    public static function exception(\Throwable $exception)
    {
        exit("<pre>$exception</pre>");
    }
}
