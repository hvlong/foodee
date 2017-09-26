<?php

namespace App\Repositories;

use App\Models\Contact;
use Prettus\Repository\Eloquent\BaseRepository;

/**
 * Created by PhpStorm.
 * User: DELL
 * Date: 9/25/2017
 * Time: 8:42 AM
 */

class ContactRepository extends BaseRepository
{

    function model()
    {
        return Contact::class;
    }

    public function create(array $data)
    {
        $model = parent::create($data);
        $model->save();
    }
}