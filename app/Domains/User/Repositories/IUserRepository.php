<?php

namespace App\Domains\User\Repositories;

use App\Models\User;

interface IUserRepository {

    public function create(array $userDate): User;
}