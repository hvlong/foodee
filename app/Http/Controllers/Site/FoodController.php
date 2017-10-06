<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/6/2017
 * Time: 9:30 AM
 */

namespace App\Http\Controllers\Site;


use App\Models\Food;
use App\Repositories\CategoryRepository;
use App\Repositories\FoodRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use PDOException;
use Validator;

class FoodController extends Controller
{
    protected $foodRepository;
    protected $categoryRepository;

    public function __construct(FoodRepository $foodRepository, CategoryRepository $categoryRepository)
    {
        $this->foodRepository = $foodRepository;
        $this->categoryRepository = $categoryRepository;
    }

    public function index()
    {
        $foods = $this->foodRepository->all();
        return view('admin.food', ['foods' => $foods]);
    }

    public function create()
    {
        $food = new Food();
        $categoryFoods = $this->categoryRepository->all();
        return view('admin.addfood', compact('categoryFoods', 'food'));
    }

    public function store(Request $request)
    {
        try {
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
                return redirect('admin/foods/create')->with('message', $message);
            }
            $data = array();
            $rs = null;
            $data['name'] = $request->get('name');
            $data['price'] = $request->get('price');
            $data['description'] = $request->get('description');
            $data['is_feature'] = $request->get('is-feature') === '1' ? 1 : 0;
            $categorys = explode('|', $request->get('category'));
            $data['category_id'] = $categorys[0];
            $image = $request->file('thumbnail');
            $path = $image->store('');
            $data['thumbnail'] = $path;
            $this->foodRepository->create($data);
            $message['type'] = 'Success';
            $message['content'][] = 'Add food successfully';
        } catch (PDOException $e) {
            $message['content'][] = 'PDO Add food has error';
        } catch (Exception $e) {
            $message['content'][] = 'Add food has error';
        }
        return redirect('admin/foods/create')->with('message', $message);
    }

    public function show($id)
    {
        $food = $this->foodRepository->find($id);
        $category = $this->categoryRepository->find($food->category_id);
        $nameCategory = $category->name;
        return view('admin.fooddetail', compact('food', 'nameCategory'));
    }

    public function edit($id)
    {
        $food = $this->foodRepository->find($id);
        $categoryFoods = $this->categoryRepository->all();
        $categorySelected = $this->categoryRepository->find($food->category_id);
        return view('admin.editfood', compact('food', 'categoryFoods', 'categorySelected'));
    }

    public function update(Request $request, $id)
    {
        try {
            $data = array();
            $data['name'] = $request->get('name');
            $data['price'] = $request->get('price');
            $data['description'] = $request->get('description');
            $data['is_feature'] = $request->get('is-feature') === '1' ? 1 : 0;
            $categorys = explode('|', $request->get('category'));
            $data['category_id'] = $categorys[0];
            if ($request->file('thumbnail') !== null) {
                $image = $request->file('thumbnail');
                $path = $image->store('');
                $data['thumbnail'] = $path;
            }
            $this->foodRepository->update($data, $id);
            return redirect('admin/foods/' . $id);
        } catch (PDOException $e) {
            $message['content'][] = 'PDO Add food has error';
        } catch (Exception $e) {
            $message['content'][] = 'Add food has error';
        }
        return redirect('admin/foods/' . $id . '/edit')->with('message', $message);
    }

    public function destroy($id)
    {
        $this->foodRepository->delete($id);
        return redirect('admin/foods');
    }
}