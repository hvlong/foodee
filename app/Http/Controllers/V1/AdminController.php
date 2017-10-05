<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 9/27/2017
 * Time: 9:23 AM
 */

namespace App\Http\Controllers\V1;

use App\Models\Food;
use App\Repositories\CategoryRepository;
use App\Repositories\FoodRepository;
use App\Repositories\UserRepository;
use Illuminate\Http\Request;
use Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class AdminController extends Controller
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

    public function index()
    {
        $users = $this->userRepository->all();
        return view('admin.index')->with(['users' => $users]);
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
                    return redirect()->action('V1\AdminController@index');
                } else {
                    $msgError = 'Email or password is wrong, please login again';
                }
            }
        } catch (JWTAuthException $e) {
            $msgError = 'Error, please login again';
        }
        return view('admin.login', ['message' => $msgError]);
    }

    public function logout(Request $request)
    {
        // Remove all session
        $request->session()->flush();
        return redirect()->action('V1\AdminController@login');
    }

    public function getAllUser()
    {
        $users = $this->userRepository->all();
        return view('admin.index', ['users' => $users]);
    }

    public function getAllFood()
    {
        $foods = $this->foodRepository->all();
        return view('admin.food', ['foods' => $foods]);

    }

    public function addFood()
    {
        $food = new Food();
        $categoryFoods = $this->categoryRepository->all();
        return view('admin.addfood', compact('categoryFoods', 'food'));

    }

    public function postFood(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'price' => 'required|int',
        ]);
        $message = array(
            'type' => 'Error',
            'content' => null);
        if ($validator->fails()) {
            $errors = $validator->errors();
            $message['content'] = $errors->all();
            return redirect('admin/addfood')->with('message', $message);
        }

        $data = array();
        $rs = null;
        $data['name'] = $request->get('name');
        $data['price'] = $request->get('price');
        $data['description'] = $request->get('description');
        $data['is_feature'] = $request->get('is-feature') === '1' ? 1 : 0;
        $categorys = explode('|', $request->get('category'));
        $data['category_id'] = $categorys[0];

        if ($data['name'] && $data['price']) {
            $image = $request->file('thumbnail');
            $path = $image->store('');
            if ($path !== false) {
                $data['thumbnail'] = $path;
                $rs = $this->foodRepository->create($data);
                if (!isset($rs)) {
                    $message['content'][] = 'Add food has error';
                } else {
                    $message['type'] = 'Success';
                    $message['content'][] = 'Add food successfully';
                }
            } else {
                $message['content'][] = 'Upload file error';
            }
        }

        return redirect('admin/addfood')->with('message', $message);
//        return redirect()->route('admin/addfood', [$message]);
    }

    public function foodDetail($id)
    {
        $food = $this->foodRepository->find($id);
        $category = $this->categoryRepository->find($food->category_id);
        $nameCategory = $category->name;
        return view('admin.fooddetail', compact('food', 'nameCategory'));
    }

    public function getInfoFood($id)
    {
        $food = $this->foodRepository->find($id);
        $categoryFoods = $this->categoryRepository->all();
        $categorySelected = $this->categoryRepository->find($food->category_id);
        return view('admin.editfood', compact('food', 'categoryFoods', 'categorySelected'));
    }

    public function editFood(Request $request, $id)
    {
        $food = $this->foodRepository->find($id);
        $food['name'] = $request->get('name');
        $food['price'] = $request->get('price');
        $food['description'] = $request->get('description');
        $food['is_feature'] = $request->get('is-feature') === '1' ? 1 : 0;
        $categorys = explode('|', $request->get('category'));
        $food['category_id'] = $categorys[0];
        $image = $request->file('thumbnail');
        if ($image != null) {
            $path = $image->store('');
            $food['thumbnail'] = $path;
        }

        $food->save();
        return redirect('admin/food-detail/' . $id);
    }

    public function deleteFood($id)
    {
        $food = $this->foodRepository->find($id);
        $food->forceDelete();
        return redirect('admin/foods');
    }

}