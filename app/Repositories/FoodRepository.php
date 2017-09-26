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
        return $this->scopeQuery(function ($query) use ($isFeature, $paginate) {
            return $query->where('is_feature', 1);
        })->paginate($paginate, null);
    }
}