<?php

namespace App\Repository\Eloquent;

use App\Repository\PostRepositoryInterface;
use App\Models\Post;

class PostRepository extends BaseRepository implements PostRepositoryInterface
{

    public function __construct(Post $model)
    {
        parent::_construct($model);
    }

    public function find($id): ?Post
    {
        return $this->model->with('comments')->find($id);
    }

    public function randomPost(): ?Post {
        return $this->model->select('id')->inRandomOrder()->first();
    }
}
