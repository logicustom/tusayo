<?php

namespace Config;

public string $clientId;
public string $clientSecret;

public function __construct()
{
    $this->clientId = env('GOOGLE_CLIENT_ID');
    $this->clientSecret = env('GOOGLE_CLIENT_SECRET');
}


class Google
{
    public $clientId = $this->clientId;

    public $clientSecret = $this->clientSecret;



    public $redirectUri =
        'https://fascism-audacity-sandbox.ngrok-free.dev/tokoonline/google/callback';
}