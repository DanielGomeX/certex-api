<?php

namespace App\Helpers;

class APIHelper
{
    public static function response($code, $messages, $data = [])
    {
        return json_encode([
            'code' => $code,
            'messages' => $messages,
            'data' => $data
        ]);
    }
}
