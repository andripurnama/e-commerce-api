<?php

namespace App\Repositories;

use App\Contracts\Repository;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

abstract class BaseRepository implements Repository
{
    public function __construct(protected Model $model)
    {
    }

    public function create(array $data): bool
    {
        return $this->model->create($data);
    }
    public function all(): ?Collection
    {
        return $this->model->all();
    }
    public function find(int $id)
    {
        return $this->model->find($id);
    }
    public function update(int $id, array $data): ?Model
    {
        $record = $this->model->find($id);
        if ($record) {
            $record->update($data);
            return $record;
        }
        return null;
    }
    public function delete(int $id): bool
    {
        $record = $this->model->find($id);
        if ($record) {
            $record->delete();
            return true;
        }
        return false;
    }
    public function findBy(string $column, $value): ?Model
    {
        return $this->model->where($column, $value)->first();
    }
}
