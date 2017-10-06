<?php

namespace App\Http\Controllers\Site;

use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\EventRepository;
use App\Repositories\FoodRepository;
use Carbon\Carbon;
use Illuminate\Routing\Controller;

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

    private function getFeatureFood()
    {
        return $this->foodRepository->getFeatureFood(1, 6);
    }

    public function index()
    {
        $drinks = $this->foodRepository->getFoodList(1, 4);
        $seaFoods = $this->foodRepository->getFoodList(2, 4);
        $vegetables = $this->foodRepository->getFoodList(3, 4);
        $meats = $this->foodRepository->getFoodList(4, 4);
        $events = $this->eventRepository->getNearestEventList(Carbon::now()->toDateString(), 3);
        $categorys = $this->categoryRepository->all();
        $featureFood = $this->getFeatureFood();
        $contacts = $this->contactRepository->all();
        $contact = $contacts[0];
        return view('home', ['contact' => $contact, 'featureFood' => $featureFood, 'drinks' => $drinks, 'seaFoods' => $seaFoods, 'vegetables' => $vegetables, 'meats' => $meats, 'events' => $events, 'categorys' => $categorys]);
    }

}
