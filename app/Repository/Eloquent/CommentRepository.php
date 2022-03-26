<?php

namespace App\Repository\Eloquent;

use App\Repository\CommentRepositoryInterface;
use App\Models\Comment;
use Illuminate\Pagination\LengthAwarePaginator;

class CommentRepository extends BaseRepository implements CommentRepositoryInterface
{

    public function __construct(Comment $model)
    {
        parent::_construct($model);
    }

    public function allPaginated(int $limit): LengthAwarePaginator {
        return $this->model->with('post')->paginate($limit);
    }
}
