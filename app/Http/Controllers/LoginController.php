<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LoginController extends Controller
{
    //
   
    //Login Function
    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:250',
            'password' => 'required',
        ]);

        $user = $this->getUser($request);
        // Check if user exist
        if (!$user) {
            return response()->json([
                'successful' => '0',
                'status' => '02',
                'message' => 'invalid email, username or password'
            ], 422);
        }

        $creds = [
            "email" => $user->email,
            'password' => $request->get('password')
        ];

        // try login
        try {
            if (!$token = auth($guard)->attempt($creds, ['exp' => Carbon::now()->addDays(70)->timestamp])) {
                return response()->json([
                    'successful' => '0',
                    'status' => '02',
                    'error'  => 'invalid email or passwords',
                    'token' => auth($guard)->attempt($creds, ['exp' => Carbon::now()->addDays(70)->timestamp])
                ], 200);
            }
        } catch (JWTException $e) {
            return response()->json([
                'successful' => '0',
                'status' => '02',
                'error' => 'could not create user token, please try again'
            ], 500);
        }

        $tokenExpiresAt = Carbon::now()->addMinutes(auth($guard)->factory()->getTTL())->toDateTimeString();

        return response()->json([
            'successful' => '1',
            'status' => '01',
            'data' => [
                'token_type' => 'Bearer',
                'access_token' => $token,
                'expires_at' => $tokenExpiresAt,
                'id' => $user->id,
                'fname' => $user->fname,
                'lname' => $user->lname,
                'email' => $user->email,
                'mobile' => $user->mobile ?? '',
                'avatar' => $user->avatar ?? '',
                'type' => $guard
            ]
        ], 200);
    }
    // get the user
    public function getUser()
    {
        if (auth()->user()) {
            return response()->json([
                'successful' => '1',
                'status' => '01',
                'user' => auth()->user(),
                // 'token_type' => 'bearer',
                // 'expires_in' => auth()->factory()->getTTL() * 60
            ],200);
        }else{
            return response()->json([
                'successful' => '1',
                'status' => '02',
                'error' => 'Unauthorized'
            ], 401);
        }
    }
    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login_user(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:250',
            'password' => 'required',
        ]);
        $credentials =$request->only('email','password');

        if (! $token = auth()->attempt($credentials)) {
            return response()->json([
                'successful' => '1',
                'status' => '02',
                'error' => 'Unauthorized'
            ], 401);
        }

        return response()->json([
            'successful' => '1',
            'status' => '01',
            'access_token' => $token,
            'user' => auth()->user(),
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ],200);
    }
}
