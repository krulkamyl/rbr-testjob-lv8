<?php

namespace App\Http\Repository;

use Illuminate\Pagination\LengthAwarePaginator;

interface CommentRepositoryInterface
{
    public function allPaginated(int $limit): LengthAwarePaginator;
}
