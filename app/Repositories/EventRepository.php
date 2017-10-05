<?php
/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 10/5/2017
 * Time: 10:21 AM
 */

namespace App\Repositories;


use App\Models\Event;
use Prettus\Repository\Eloquent\BaseRepository;

class EventRepository extends BaseRepository
{

    /**
     * Specify Model class name
     *
     * @return string
     */
    public function model()
    {
        return Event::class;
    }

    public function getNearestEventList($today, $paginate)
    {
        return $this->scopeQuery(function ($query) use ($today) {
            return $query->whereDate('date_end', '>', $today);
        })->paginate($paginate, null);
    }

}