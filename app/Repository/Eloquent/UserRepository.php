<?php

namespace App\Repository\Eloquent;

use App\Repository\UserRepositoryInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserRepositoryInterface
{

    public function __construct(User $model)
    {
        parent::_construct($model);
    }

    public function whereEmail($email): ?User {
        return $this->model->where('email', 'LIKE', $email)->first();
    }
}
