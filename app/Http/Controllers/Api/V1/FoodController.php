<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/3/2017
 * Time: 2:32 PM
 */

namespace App\Http\Controllers\Api\V1;

use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Exceptions\JWTException;

class FoodController extends Controller
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

    public function create(Request $request)
    {
        try {
            $data = array();
            $rs = null;
            $data['name'] = $request->get('name');
            $data['price'] = $request->get('price');
            $data['description'] = $request->get('description');
            $data['is_feature'] = $request->get('is-feature');
            $data['category_id'] = $request->get('category');
            $image = $request->file('thumbnail');
            $path = $image->store('');
            $data['thumbnail'] = $path;
            $rs = $this->foodRepository->create($data);
            return $this->responseSuccess($rs, __('messages.success'));
        } catch (Exception $e) {
            return $this->responseError(__('messages.something_went_wrong'), 404);
        }
    }

    public function index(Request $request)
    {
        try {
            if (empty($request->get('category_id'))) {
                $foods = $this->foodRepository->getAllFood($request->get('limit'));
            } else {
                $foods = $this->foodRepository->getFoodList($request->get('category_id'), $request->get('limit'));
            }
            return $this->responseSuccess($foods, __('messages.success'));
        } catch (Exeption $e) {
            return $this->responseError(__('messages.something_went_wrong'), $e->getCode());
        }
    }

    public function update($id, Request $request)
    {
        try {
            $data = array();
            $rs = null;
            $data['name'] = $request->get('name');
            $data['price'] = $request->get('price');
            $data['description'] = $request->get('description');
            $data['is_feature'] = $request->get('is-feature');
            $data['category_id'] = $request->get('category');
            $image = $request->file('thumbnail');
            $path = $image->store('');
            $data['thumbnail'] = $path;
            $food = $this->foodRepository->update($data, $id);
            return $this->responseSuccess($food, __('messages.success'));
        } catch (Exeption $e) {
            return $this->responseError(__('messages.something_went_wrong'), $e->getCode());
        }
    }

    public function delete($id)
    {
        try {
            $this->foodRepository->delete($id);
            return $this->responseSuccess(['food' => $id], __('messages.success'));
        } catch (Exeption $e) {
            return $this->responseError(__('messages.something_went_wrong'), $e->getCode());
        }
    }

    public function show($id)
    {
        try {
            $food = $this->foodRepository->find($id);
            $category = $this->categoryRepository->find($food->category_id);
            $nameCategory = $category->name;
            return $this->responseSuccess($food, __('messages.success'));
        }catch (Exeption $e) {
            return $this->responseError(__('messages.something_went_wrong'), $e->getCode());
        }
    }

}