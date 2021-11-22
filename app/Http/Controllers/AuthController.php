<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $cekuser = User::where('username', $request->username)->first();
        if ($cekuser) {
            if (Hash::check($request->password, $cekuser->password)) {
                if ($cekuser->blokir == 'y') {
                    return response()->json([
                        'status' => false,
                        'message' => 'your account can no longer be used'
                    ], 401);
                }
                $request->session()->put('user', $cekuser);
                return response()->json([
                    'status' => true,
                    'message' => 'Logged in',
                    'data' => $cekuser
                ], 200);
            }
            return response()->json([
                'status' => false,
                'message' => 'Username or password is invalid'
            ], 404);
        }
        return response()->json([
            'status' => false,
            'message' => 'Username or password is invalid'
        ], 404);
    }

    public function me(Request $request)
    {
        return $request->session()->get('user');
    }

    public function logout(Request $request)
    {
        $request->session()->forget('user');
        return response()->json([
            'status' => true,
            'message' => 'Log Out Success'
        ], 200);
    }
}
