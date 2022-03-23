<?php

namespace App\Http\Repository\Eloquent;

use App\Http\Repository\UserRepositoryInterface;
use App\Models\User;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::_construct($model);
    }
}
