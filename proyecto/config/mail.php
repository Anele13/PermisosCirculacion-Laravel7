<?php

    return [
        'driver' => env('MAIL_DRIVER', 'smtp'),
        'host' => env('MAIL_HOST', 'smtp.gmail.com'),
        'port' => env('MAIL_PORT', 465),
        'from' => ['address' => 'anelegaribaldi@gmail.com', 'name' => 'anele'],
        'encryption' => env('MAIL_ENCRYPTION', 'ssl'),
        'username' => 'anelegaribaldi@gmail.com',
        'password' => 'cxwlfovokgpaqljs',
        'sendmail' => '/usr/sbin/sendmail -t',
        'pretend' => false,

];