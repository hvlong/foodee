<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Tymon\JWTAuth\Facades\JWTAuth;


class Controller extends BaseController
{
    protected $contactRepository;
    protected $foodRepository;
    protected $categoryRepository;
    protected $user;

    public function __construct(ContactRepository $contactRepository,
                                FoodRepository $foodRepository,
                                CategoryRepository $categoryRepository, User $user)
    {
        $this->contactRepository = $contactRepository;
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;
        $this->user = $user;
    }

    private function createContact()
    {
        $data = array();
        $data['address'] = 'Da Nang';
        $data['phone'] = '0123455';
        $data['email'] = 'hvlong@gmail.com';
        $data['website'] = 'www.foodet';
        $data['website'] = 'www.foodet';
        $data['about_us'] = 'www.foodet';
        $this->contactRepository->create($data);
    }

    private function createCategory()
    {
        $data = array();
//        $data['name'] = 'Fruit';
//        $data['name'] = 'Sea food';
//        $data['name'] = 'Vegetables';
        $data['name'] = 'Meat';
        $this->categoryRepository->create($data);
    }

    protected function createFood()
    {
        $data = array();
        $data['name'] = 'Mì Quảng';
        $data['price'] = 30.000;
        $data['thumbnail'] = 'https://upload.wikimedia.org/wikipedia/commons/thumb/c/c4/Banh-Canh-Noodle-Soup.jpg/120px-Banh-Canh-Noodle-Soup.jpg';
        $data['description'] = 'Được làm từ bột gạo, bột mì, hoặc bột sắn hoặc bột gạo pha bột sắn cán thành tấm và cắt ra thành sợi to và ngắn với nước dùng được nấu từ tôm, cá, giò heo... thêm gia vị tùy theo từng loại';
        $data['is_feature'] = 1;
        $data['category_id'] = 4;
        $this->foodRepository->create($data);
    }

    private function getFeatureFood()
    {
        return $this->foodRepository->getFeatureFood(1, 6);
    }

    public function getAllInfo()
    {
        $featureFood = $this->getFeatureFood();
        $contacts = $this->contactRepository->all();
        $contact = $contacts[0];
        return view('home', ['contact' => $contact, 'featureFood' => $featureFood]);
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');
        $token = null;
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
                return response()->json(['invalid_email_or_password'], 422);
            }
        } catch (JWTAuthException $e) {
            return response()->json(['failed_to_create_token'], 500);
        }
        return response()->json(compact('token'));
    }

    public function register(Request $request)
    {
        $user = $this->user->create([
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'password' => bcrypt($request->get('password'))
        ]);
        return response()->json(['status'=>true,'message'=>'User created successfully','data'=>$user]);
    }

    public function getAuthUser(Request $request)
    {
        $user = JWTAuth::toUser($request->token);
        return response()->json(['result' => $user]);
    }

}
