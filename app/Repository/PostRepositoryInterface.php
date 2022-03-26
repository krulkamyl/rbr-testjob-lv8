<?php

namespace App\Repository;

use App\Models\Post;

interface PostRepositoryInterface
{
    public function find($id): ?Post;
    public function randomPost(): ?Post;
}
