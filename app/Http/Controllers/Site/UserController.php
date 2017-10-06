<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/6/2017
 * Time: 9:36 AM
 */

namespace App\Http\Controllers\Site;


use App\Repositories\UserRepository;
use Illuminate\Routing\Controller as BaseController;

class UserController extends BaseController
{
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function index()
    {
        $users = $this->userRepository->all();
        return view('admin.index')->with(['users' => $users]);
    }

}