<?php

namespace App\Contracts;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

interface Authentication
{
    public function authentication(array $credentials): string;
    public function verifyToken(string $token): bool;
    public function revokeToken(string $token): bool;
}
