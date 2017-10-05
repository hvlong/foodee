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

    public function getFeatureFood($isFeature, $paginate)
    {
        return $this->scopeQuery(function ($query) use ($isFeature) {
            return $query->where('is_feature', 1)
                ->orderBy('created_at', 'DESC');
        })->paginate($paginate, null);
    }

    public function getFoodsWithCategory($id, $paginate)
    {
        return $this->scopeQuery(function ($query) use ($id) {
            return $query->where('category_id', $id);
        })->paginate($paginate, null);
    }

}