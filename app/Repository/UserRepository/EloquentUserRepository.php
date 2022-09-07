<?php

namespace App\Repository\UserRepository;

use App\Http\Resources\AuthResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Exceptions\HttpResponseException;


class EloquentUserRepository implements InterfaceUserRepository
{
    public function login(Request $request) {
        $request['hashed_email'] = hashedEmail($request['email']);
        if (!Auth::attempt($request->only('hashed_email', 'password'))) {
            throw new HttpResponseException(response()->json([
                'success'   => false,
                'message'   => 'Invalid Credentials',
                'status'    => 401
            ], 401));
        }
        $user = User::where('hashed_email', $request['hashed_email'])->firstOrFail();
        return $this->generateToken($user);
    }

    public function register(Request $request) {
        $request['hashed_email'] = hashedEmail($request['email']);
        $user = User::create(
            $request->only('name', 'email', 'hashed_email', 'password')
        );
        return $this->generateToken($user);
    }

    private function generateToken(User $user) {
        $token = $user->createToken('auth_token')->plainTextToken;
        return new AuthResource([], [
            'user' => $user,
            'access_token' => $token,
            'token_type' => 'Bearer'
        ]);
    }
}
