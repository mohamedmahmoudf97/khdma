<?php

namespace App\Http\Controllers;
use App\Models\User;
use Tymon\JWTAuth\JWTAuth;
use Tymon\JWTAuth\Exceptions\JWTException;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class RegisterController extends Controller
{
    //adding user functionality 
    public function RegisterNewUser(Request $request)
    {
        $guard = $request->route()->getName();
            $this->validate($request, [
                'fname' => 'required|string|max:255',
                'lname' => 'required|string|max:250',
                'role_id' => 'required|numeric',
                'email' => 'required|email|max:255|unique:users,email',
                'password' => 'required|confirmed|min:6|max:255',
            ]);

        $user_input = $request->only(
            'fname',
            'lname',
            'email',
            'password',
            'role_id'
        );

        $user_input['password'] = bcrypt($request->get('password'));
        $user_input['active'] = 0;
        $user_input['verification_token'] = Str::random(64);


            $user = new User($user_input);

        if ($user->save()) {

            return response()->json([
                'successful' => '1',
                'status' => '01',
                'message' => 'User Has Been Created successfully',
                'user' => $user,
            ], 200);
        }

        return response()->json([
            'successful' => '0',
            'status'  => '02',
            'error' => 'failed, please try again'
        ], 500);
    }

}
