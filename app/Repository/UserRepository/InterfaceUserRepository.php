<?php

namespace App\Repository\UserRepository;

use Illuminate\Http\Request;

interface InterfaceUserRepository
{
    public function register(Request $request);
    public function login(Request $request);

}
