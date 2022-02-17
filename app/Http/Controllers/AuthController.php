<?php

namespace App\Http\Controllers;

use App\Http\Requests\auth\LoginRequest;
use App\Http\Requests\auth\RegisterRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Support\Str;

class AuthController extends Controller
{


    /**
     * Login to system .
     *
     * 
     * @return array
     */
    public function login(LoginRequest $request)
    {
        $response = $this->failResponse;
        $user = User::where('email', $request->email)
            ->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken(Str::random(64))->plainTextToken;
                $response = $this->successResponse;
                $response['item'] = $user;
                $response['token'] = $token;
            }
        }
        return $this->response($response);
    }
    /**
     * Register to system .
     *
     * 
     * 
     */
    public function register(RegisterRequest $request)
    {
        $response = $this->failResponse;
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password)
        ]);
        $user->assignRole('User');
        unset($user['roles']);
        $response = $this->successResponse;
        $response['item'] = $user;
        return $this->response($response);
    }
    /**
     * logout from the system .
     *
     * 
     * 
     */
    public function logout(Request $request)
    {
        $response = $this->failResponse;
        $user = auth()->user();
        if ($user) {
            $user->tokens()->delete();
            $response = $this->successResponse;
        }
        return $this->response($response);
    }
}
