<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Role;

class RoleController extends Controller
{
    //
    public function add_role(Request $request)
    {
        if (auth()->user()) {
            $this->validate($request, [
                'name' => 'required|unique:roles'
            ]);
            $role = new Role();
            $role->name = $request->name;
            if ($role->save()) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'user' => auth()->user(),
                    'role' => $role
                ],200);
            }else{
                return response()->json([
                    'successful' => '0',
                    'status' => '02',
                    'error' => 'could not create role, please try again'
                ], 500);
            }
        }else {
            return response()->json([
                'successful' => '1',
                'status' => '02',
                'error' => 'Unauthorized'
            ], 401);
        }
    }
}
