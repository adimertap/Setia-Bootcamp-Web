<?php

return [
    'serverKey' => env('MIDTRANS_SERVER_KEY', null),
    'isProduction' => env('MIDTRANS_IS_PRODUCTION', false),
    'isSanitized' => env('MIDTRANS_IS_SANITIZED', false),
    'is3ds' => env('MIDTRANS_IS_3DS', false),
];
