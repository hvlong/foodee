<?php

namespace App\Http\Controllers\V1;

use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\EventRepository;
use App\Repositories\FoodRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;


class HomeController extends Controller
{
    protected $contactRepository;
    protected $foodRepository;
    protected $categoryRepository;
    protected $eventRepository;
    protected $user;

    public function __construct(ContactRepository $contactRepository,
                                FoodRepository $foodRepository,
                                CategoryRepository $categoryRepository,
                                EventRepository $eventRepository,
                                User $user)
    {
        $this->contactRepository = $contactRepository;
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;
        $this->eventRepository = $eventRepository;
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
        $drinks = $this->foodRepository->getFoodsWithCategory(1, 4);
        $seaFoods = $this->foodRepository->getFoodsWithCategory(2, 4);
        $vegetables = $this->foodRepository->getFoodsWithCategory(3, 4);
        $meats = $this->foodRepository->getFoodsWithCategory(4, 4);
        $events = $this->eventRepository->getNearestEventList(Carbon::now()->toDateString(), 3);
        $categorys = $this->categoryRepository->all();
        $featureFood     = $this->getFeatureFood();
        $contacts = $this->contactRepository->all();
        $contact = $contacts[0];
        return view('home', ['contact' => $contact, 'featureFood' => $featureFood, 'drinks' => $drinks, 'seaFoods' => $seaFoods, 'vegetables' => $vegetables, 'meats' => $meats, 'events' => $events, 'categorys' => $categorys]);
    }

}
