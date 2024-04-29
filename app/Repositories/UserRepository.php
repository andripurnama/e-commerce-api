<?php

namespace App\Repositories;

use App\Contracts\Repository;
use App\Models\User;


class UserRepository implements Repository 
{
    protected $user;
    public function __construct(User $user)
    {
        $this->user = $user;        
    }
    public function create(array $data) : bool
    {
        return $this->user->create($data);
    }

    public function getOne(string $columnName, string $param) : User
    {
        return $this->user->where($columnName,$param)->first();
    }

    public function delete(string $columnName, $param) : void
    {
        $this->user->where($columnName,$param)->delete();
    }
}