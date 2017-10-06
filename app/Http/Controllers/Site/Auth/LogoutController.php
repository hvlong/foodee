<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/6/2017
 * Time: 9:27 AM
 */

namespace App\Http\Controllers\Site\Auth;

use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;

class LogoutController extends BaseController
{

    public function logout(Request $request)
    {
        // Remove all session
        $request->session()->flush();
        return redirect()->action('Site\Auth\LoginController@login');
    }
}