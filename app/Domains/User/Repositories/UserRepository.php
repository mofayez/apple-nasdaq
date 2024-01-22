<?php

namespace App\Domains\User\Repositories;

use App\Models\User;

class UserRepository implements IUserRepository {


    public function create(array $userData): User { 

        return User::create($userData);
    }
}