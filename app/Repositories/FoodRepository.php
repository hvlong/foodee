<?php

namespace App\Repositories;

use App\Models\Food;
use Prettus\Repository\Eloquent\BaseRepository;

class FoodRepository extends BaseRepository
{

    function model()
    {
        return Food::class;
    }

    public function create(array $data)
    {
        $model = parent::create($data);
        $model->save();
        return $this->parserResult($model);
    }

    public function update(array $data, $id)
    {
        $model = parent::update($data, $id);
        $model->save();
        return $this->parserResult($model);
    }

    public function delete($id)
    {
        return parent::delete($id);
    }

    public function getFeatureFood($isFeature, $paginate)
    {
        return $this->scopeQuery(function ($query) use ($isFeature) {
            return $query->where('is_feature', 1)
                ->orderBy('created_at', 'DESC');
        })->paginate($paginate, null);
    }

    public function getFoodList($categoryId, $page)
    {
        return $data = $this->scopeQuery(function ($query) use ($categoryId) {
            return $query->where('category_id', $categoryId);
        })->paginate($page);
    }

    public function getAllFood($limit)
    {
        return $this->scopeQuery(function ($query) {
            return $query->select('*');
        })->paginate($limit);
    }

    public function show($id)
    {
        $food = $this->scopeQuery(function ($query) use ($id) {
            return $query->with('category');
        });
    }

}