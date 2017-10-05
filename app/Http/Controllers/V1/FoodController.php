<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/3/2017
 * Time: 2:32 PM
 */

namespace App\Http\Controllers;

use App\Http\Controllers\V1\Controller;
use App\Models\User;
use App\Repositories\CategoryRepository;
use App\Repositories\ContactRepository;
use App\Repositories\FoodRepository;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Routing\Controller as BaseController;
use PDOException;

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

    public function postFood(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required|max:255',
                'price' => 'required',
            ]);

            $data = array();
            $rs = null;
            $data['name'] = $request->get('name');
            $data['price'] = $request->get('price');
            $data['description'] = $request->get('description');
            $data['is_feature'] = $request->get('is-feature');
            $data['category_id'] = $request->get('category');
            $image = $request->file('thumbnail');
            $path = $image->store('');
            if ($path !== false) {
                $data['thumbnail'] = $path;
                $rs = $this->foodRepository->create($data);
                if (isset($rs)) {
                    return $this->responseSuccess($rs, 'Add successfully', 200);
                }
            }
            return $this->responseError('error', 404);
        } catch (Exception $e) {
            return $this->responseError('Oops!, Error unknown', 404);
        }
    }

}