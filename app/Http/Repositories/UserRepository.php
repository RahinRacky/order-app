<?php
namespace App\Http\Repositories;

use App\Models\User;

class UserRepository
{

    /** @var User */
    protected $user;

    public function __construct(User $user)
    {
        $this->user = $user;
    }

    public function get()
    {
        return $this->user->with('companyDetail')->get();
    }
}
