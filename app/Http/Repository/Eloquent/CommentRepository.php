<?php

namespace App\Http\Repository\Eloquent;

use App\Http\Repository\CommentRepositoryInterface;
use App\Models\Comment;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    public function __construct(Comment $model)
    {
        parent::_construct($model);
    }
}
