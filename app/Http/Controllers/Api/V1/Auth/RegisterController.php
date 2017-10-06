<?php

namespace App\Http\Controllers\Api\V1\Auth;

use App\Http\Controllers\Api\V1\Controller;
use App\Http\Requests\RegisterAccountRequest;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Validator;

class RegisterController extends Controller
{
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function register(RegisterAccountRequest $request)
    {
        DB::beginTransaction();
        try {
            $user = $this->user->create([
                'name' => $request->get('name'),
                'email' => $request->get('email'),
                'password' => bcrypt($request->get('password'))
            ]);
            DB::commit();
        } catch (Exception $e) {
            DB::rollBack();
            return $this->responseError(__('custom_validation.name_required'), $e->getCode());
        }
        return $this->responseSuccess([
            'is_registered' => true,
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'email' => $user->email,
            ]]);
    }
}
