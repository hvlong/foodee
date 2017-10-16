<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/16/2017
 * Time: 2:08 PM
 */

namespace App\Http\Controllers\Site\Auth;

use App\Http\Requests\RegisterAccountRequest;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Validation\Validator;

class RegisterController extends BaseController
{

    public function create()
    {
        return view('admin.register');
    }

    public function store(RegisterAccountRequest $request)
    {
        dd($request->validator);
        if (isset($request->validator) && $request->validator->fails()) {
            return view('admin.register', ['message' => 'Error, please login again']);
        }
        return view('admin.register');
    }
}