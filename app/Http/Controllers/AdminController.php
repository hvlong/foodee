<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 9/27/2017
 * Time: 9:23 AM
 */

namespace App\Http\Controllers;

use App\Repositories\CategoryRepository;
use App\Repositories\FoodRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends BaseController
{

    private $userRepository;
    private $foodRepository;
    private $categoryRepository;

    public function __construct(UserRepository $userRepository, FoodRepository $foodRepository, CategoryRepository $categoryRepository)
    {
        $this->userRepository = $userRepository;
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        $msgError = null;
        try {
            if ($credentials != null) {
                if ($token = JWTAuth::attempt($credentials)) {
                    session(['email' => $request->get('email'), 'password' => bcrypt($request->get('password'))]);
                    return redirect()->action('AdminController@index');
                } else {
                    $msgError = 'Email or password is wrong, please login again';
                }
            }
        } catch (JWTAuthException $e) {
            $msgError = 'Error, please login again';
        }
        return view('admin.login', ['message' => $msgError]);
    }

    public function index()
    {
        if (session('email') && session('password')) {
            $users = $this->userRepository->all();
            return view('admin.index')->with(['users' => $users]);
        }
        return view('admin.login');
    }

    public function logout(Request $request)
    {
        // Remove all session
        $request->session()->flush();
        return redirect()->action('AdminController@login');
    }

    public function getAllUser()
    {
        if (session('email') && session('password')) {
            $users = $this->userRepository->all();
            return view('admin.index', ['users' => $users]);
        }
        return view('admin.login');
    }

    public function getAllFood()
    {
        if (session('email') && session('password')) {
            $foods = $this->foodRepository->all();
            return view('admin.food', ['foods' => $foods]);
        }
        return view('admin.login');
    }

    public function addFood(Request $request)
    {
        if (session('email') && session('password')) {

            $data = array();
            $rs = null;
            $data['name'] = $request->get('name');
            $data['price'] = $request->get('price');
            $data['description'] = $request->get('description');
            $data['is_feature'] = $request->get('is-feature') === 1 ? 1 : 0;
            $categorys = explode('|', $request->get('category'));
            $data['category_id'] = $categorys[0];
            if ($data['name'] && $data['price']) {

//                $filename = $request->file('thumbnail')->getClientOriginalName();
                $file = $request->input('thumbnail');
                $photo = $request->file('thumbnail')->getClientOriginalName();
                $destination = base_path() . '/public/foods';



                $data['thumbnail'] = $filename;
                $rs = $this->foodRepository->create($data);
            }

            return view('admin.addfood', ['categorys' => $this->getAllCategoryFood(), '$data' => $data, 'message' => $rs]);
        }
        return view('admin.login');
    }

    private function getAllCategoryFood()
    {
        $categoryFoods = $this->categoryRepository->all();
        return $categoryFoods;
    }
}