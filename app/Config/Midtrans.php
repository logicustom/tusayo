<?php

namespace Config;

public $serverKey;

public function __construct()
{
    $this->serverKey = env('MIDTRANS_SERVER_KEY');
    $this->clientKey = env('MIDTRANS_CLIENT_KEY');
}


class Midtrans
{
    public $serverKey = $this->serverKey;

    public $clientKey = $this->clientKey;

    public $isProduction = false;
}