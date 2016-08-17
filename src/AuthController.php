<?php

namespace MX;

use App\User;
use Illuminate\Http\Request;

class AuthController extends \App\Http\Controllers\Auth\AuthController
{
    /**
     * Override the usual login request
     * -> Returns the salt if only username is sent
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function hijackLogin(Request $request)
    {
        $loginUsername = $this->loginUsername();
        $login = $request->get($loginUsername);
        $ppf = require_once(__DIR__.'/config/main.php');

        if (!empty($login) && !$request->has('password')) {
            $usalt = User::where($loginUsername, $login)->get(['salt'])
                         ->first();
            $data = $ppf['ssalt'];

            if (is_null($usalt) || is_null($usalt->salt)) {
                $data .= $ppf['salt'];
            } else {
                $data .= $usalt->salt;
                unset($usalt);
            }
            $data .= $login;

            return [
                'salt' => hash('sha256', $data),
                'cost' => $ppf['cost'],
                'block' => $ppf['block'],
            ];
        }

        return $this->login($request);
    }
}
