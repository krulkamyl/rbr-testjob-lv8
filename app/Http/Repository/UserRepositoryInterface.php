<?php

namespace App\Http\Repository;

use App\Models\User;

interface UserRepositoryInterface
{
    public function whereEmail($email): ?User;
}
