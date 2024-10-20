<?php
namespace App\Repositories\Interfaces;

use App\Models\User;

interface UserRepositoryInterface {
    public function register(array $data);
    // public function getAllUsers();
    // public function getUser($id);
    // public function update(array $data, User $user);
    // public function disableUser(User $user);
}