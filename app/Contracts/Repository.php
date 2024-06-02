<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Repository
{
    public function create(array $data): bool;
    public function all(): ?Collection;
    public function find(int $id);
    public function update(int $id, array $data): ?Model;
    public function delete(int $id): bool;
    public function findBy(string $column, $param): ?Model;
}
