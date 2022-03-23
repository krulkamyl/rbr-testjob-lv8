<?php

namespace App\Http\Repository\Eloquent;

use App\Http\Repository\PostRepositoryInterface;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function __construct(Post $model)
    {
        parent::_construct($model);
    }
}