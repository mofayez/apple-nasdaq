<?php

namespace App\Application;

use App\Domains\User\Repositories\IUserRepository;
use App\Domains\Repositories\UserRepository;
use App\Models\User;

class UserService {


    public function __construct(private IUserRepository $userRepository) {
        $this->userRepository = $userRepository;
    }

    public function createUser (array $userData): User {

        return $this->userRepository->create($userData);
    }
}