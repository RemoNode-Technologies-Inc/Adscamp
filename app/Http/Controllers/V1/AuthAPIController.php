<?php

namespace App\Http\Controllers\V1;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Services\UserService\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthAPIController extends Controller
{
    public function register(Request $request, UserService $userService){
        $response = $userService->register($request->email, $request->password, $request->name);
        return response()->json($response);
    }
    public function login(Request $request, UserService $userService){
        $response = $userService->login($request->email, $request->password);
        return response()->json($response);
    }
}
