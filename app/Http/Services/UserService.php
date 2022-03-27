<?php
namespace App\Http\Services;

use App\Http\Repositories\UserRepository;

class UserService
{
    /** @var UserRepository */
    protected $userRepository;

    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function get()
    {
        return $this->userRepository->get();
    }

}
