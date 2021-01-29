<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Staff;
use App\Models\Service;

class StaffController extends Controller
{
    //
    public function add_unit(Request $request)
    {
        if (auth()->user()) {
            $this->validate($request, [
                'name' => 'required',
                'service_id'=>'required|numeric'
            ]);
            $staff = Staff::create(['name'=>$request->name]);
            $service = Service::find($request->service_id);
            if ($staff->services()->save($service)) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'Unit Has Been Created successfully',
                    'user' => auth()->user(),
                    'project' => $staff->services
                ],200);
            }else{
                return response()->json([
                    'successful' => '0',
                    'status' => '02',
                    'error' => 'could not create unit, please try again'
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
