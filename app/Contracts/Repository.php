<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Repository {
    public function create(array $data) : bool;
    public function getOne(string $columnName, string $param) : Model;
    public function delete(string $columnName, $param) : void;
}