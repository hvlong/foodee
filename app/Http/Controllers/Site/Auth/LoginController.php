<?php

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;

class LoginController extends BaseController
{
    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        $msgError = null;
        try {
            if ($credentials != null) {
                if ($token = JWTAuth::attempt($credentials)) {
                    session(['email' => $request->get('email'), 'password' => bcrypt($request->get('password'))]);
                    return redirect()->action('Site\UserController@index');
                } else {
                    $msgError = 'Email or password is wrong, please login again';
                }
            }
        } catch (JWTAuthException $e) {
            $msgError = 'Error, please login again';
        }
        return view('admin.login', ['message' => $msgError]);
    }
}