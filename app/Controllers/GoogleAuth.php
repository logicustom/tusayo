<?php

namespace App\Controllers;

use App\Models\UserModel;
use Google\Client;

class GoogleAuth extends BaseController
{
    protected function getClient(){
        $config = config('Google');
        $client = new Client();

        $client->setClientId(
            $config->clientId
        );

        $client->setClientSecret(
            $config->clientSecret
        );

        $client->setRedirectUri(
            $config->redirectUri
        );
        $client->addScope('email');
        $client->addScope('profile');

        return $client;
    }

    public function login(){
        $client = $this->getClient();
        return redirect()->to(
            $client->createAuthUrl()
        );
    }

    public function callback(){
        $client = $this->getClient();
        $client->fetchAccessTokenWithAuthCode(
            $this->request->getGet('code')
        );

        $oauth = new \Google_Service_Oauth2(
            $client
        );

        $googleUser = $oauth->userinfo->get();
        $userModel  = new UserModel();
        $user = $userModel
            ->where('email', $googleUser->email)
            ->first();
        if (!$user) {
            $userId = $userModel->insert([
                'google_id' => $googleUser->id,
                'name'      => $googleUser->name,
                'email'     => $googleUser->email,
                'avatar'    => $googleUser->picture,
                'provider'  => 'google'
            ]);

            $user = $userModel->find($userId);
        }

        session()->set([
            'user_id'   => $user['id'],
            'name'      => $user['name'],
            'email'     => $user['email'],
            'logged_in' => true
        ]);

        return redirect()->to('/');
    }
}