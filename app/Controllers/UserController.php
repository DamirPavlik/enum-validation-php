<?php

namespace app\Controllers;

use app\Models\User;
use app\Validation\BaseValidator;
use app\Validation\RegistrationValidator;

class UserController extends BaseController
{
    public function __construct(private readonly User $user = new User()) {}

    /**
     * @throws \Exception
     */
    public function register(array $request): void
    {
        BaseValidator::validate($request, RegistrationValidator::class);
        if (!$this->user->exists($request['email'])) {
            $this->user->register($request['email'], $request['password']);
        } else {
            echo "postoji vec";
        }
    }
}