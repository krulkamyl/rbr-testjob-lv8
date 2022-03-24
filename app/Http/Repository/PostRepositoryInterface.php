<?php

namespace App\Http\Repository;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function find($id): Post;
}
