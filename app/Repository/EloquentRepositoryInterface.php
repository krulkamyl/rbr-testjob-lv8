<?php

namespace App\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\LengthAwarePaginator;

interface EloquentRepositoryInterface
{

    public function all(): Collection;

    public function allPaginated(int $limit): LengthAwarePaginator;

    public function create(array $attributes) : Model;

    public function find(int $id): ?Model;

    public function update(Model $model, array $data): ?Model;

    public function delete(Model $model): bool;
}
