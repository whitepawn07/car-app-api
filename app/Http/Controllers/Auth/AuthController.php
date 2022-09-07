<?php

namespace App\Http\Controllers\Auth;

use App\Http\FormRequest\RegistrationRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
//use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Controllers\Controller;
use App\Http\FormRequest\LoginRequest;
use App\Repository\UserRepository\EloquentUserRepository;

class AuthController extends Controller
{
//    use AuthenticatesUsers;

    /**
     * @var EloquentUserRepository
     */
    protected EloquentUserRepository $eloquentUser;
    public function __construct(EloquentUserRepository $eloquentUser) {
        $this->eloquentUser = $eloquentUser;
    }

    public function username() {
        return 'hashed_email';
    }
    /**
     * @param LoginRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function doLogin(LoginRequest $request): JsonResponse
    {
        return response()->json($this->eloquentUser->login($request));
    }

    /**
     * @param RegistrationRequest $request
     * @return JsonResponse
     */
    public function doRegister(RegistrationRequest $request): JsonResponse
    {
        return response()->json($this->eloquentUser->register($request));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout(): JsonResponse
    {
        //
        return response()->json([]);
    }


}
