<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Service;
class ServiceController extends Controller
{
    //
        //
        public function add_service(Request $request)
        {
            if (auth()->user()) {
                $this->validate($request, [
                    'name' => 'required|unique:services'
                ]);
                $service = new Service();
                $service->name = $request->name;
                if ($service->save()) {
                    return response()->json([
                        'successful' => '1',
                        'status' => '01',
                        'message' => 'service Has Been Created successfully',
                        'user' => auth()->user(),
                        'service' => $service
                    ],200);
                }else{
                    return response()->json([
                        'successful' => '0',
                        'status' => '02',
                        'error' => 'could not create service, please try again'
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
        public function get_services()
        {
            if (auth()->user()) {
                $services = Service::all();
                if ($services) {
                    return response()->json([
                        'successful' => '1',
                        'status' => '01',
                        'message' => 'All services',
                        'user' => auth()->user(),
                        'services' => $services
                    ],200);
                }else{
                    return response()->json([
                        'successful' => '0',
                        'status' => '02',
                        'error' => 'could not Handel Your Request'
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
