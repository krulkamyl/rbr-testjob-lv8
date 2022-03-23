<?php

namespace App\Http\Repository;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface EloquentRepositoryInterface
{

    public function all(): Collection;

    public function allPaginated(int $limit);

    public function create(array $attributes) : Model;

    public function find($id): ?Model;

    public function update(Model $model, array $data): ?Model;

    public function delete(Model $model): bool;
}
