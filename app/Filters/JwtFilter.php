<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;

class JwtFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $token = session()->get('jwt_token');

        if (!$token) {
            return redirect()->to('admin');
        }

        try {

            $decoded = JWT::decode(
    $token,
    new Key(env('JWT_SECRET'), 'HS256')
);

session()->set('jwt_user', $decoded);

        } catch (\Exception $e) {

            session()->destroy();

            return redirect()->to('admin')
                ->with('error', 'Session expired');
        }
    }

    public function after(
        RequestInterface $request,
        ResponseInterface $response,
        $arguments = null
    ) {
    }
}