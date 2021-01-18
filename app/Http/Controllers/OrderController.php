<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;

class OrderController extends Controller
{
    //
    public function add_new_order_customer_service(Request $request)
    {
        if (auth()->user() && auth()->user()->role->name == 'customer service') {
            $this->validate($request, [
                'project' => 'required',
                'unit' => 'required',
                'service' => 'required',
                'description' => 'required',
            ]);
            $order = new Order();
            $order->project = $request->project;
            $order->unit = $request->unit;
            $order->service = $request->service;
            $order->description = $request->description;
            if ($order->save()) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'Order Has Been Created successfully',
                    'order' => $order,
                ], 200);
            }else {
                return response()->json([
                    'successful' => '0',
                    'status'  => '02',
                    'error' => 'failed, please try again'
                ], 500);
            }
        }else {
            return response()->json([
                'successful' => '1',
                'status' => '02',
                'auth()->user()->role'=> auth()->user()->role,
                'error' => 'Unauthorized'
            ], 401);
        }
    }
}
