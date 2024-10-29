<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Http\Services\AuthService;
class AuthController extends Controller
{
    private $authService;
    public function __construct(AuthService $authService)
    {
        $this->authService = $authService;
    }

    public function login(LoginRequest $request){
        // dd($request);
        return $this->authService->login($request);
    }

    public function register(RegisterRequest $request){
        // dd($request);
        return $this->authService->register($request);
    }

    public function logout(Request $request){
        $this->authService->logout($request);
    }

}
