<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;
class OrderController extends Controller
{
    //
    public function add_new_order_customer_service(Request $request)
    {
        if (auth()->user() && auth()->user()->role->name == 'customer service') {
            $this->validate($request, [
                'project_id' => 'required',
                'unit_id' => 'required',
                'service_id' => 'required',
                'target_date' => 'required|date_format:m-d-Y',
                'time_from' => 'required|date_format:H:i',
                'time_to' =>  'required|date_format:H:i',
                'description' => 'required',
                'type' => 'required|in:preview,maintenance,other',
            ]);
            $order = new Order();
            $order->project_id = $request->project_id;
            $order->unit_id = $request->unit_id;
            $order->service_id = $request->service_id;
            $order->target_date = date("m-d-Y", strtotime($request->target_date)) ;
            $order->time_from = $request->time_from;
            $order->time_to = $request->time_to;
            $order->description = $request->description;
            $order->type = $request->type;
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

    public function get_orders()
    {
        if (auth()->user()){
            $orders = Order::all();
            if ($orders) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'All orders',
                    'user' => auth()->user(),
                    'orders' => $orders
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
                'auth()->user()->role'=> auth()->user()->role,
                'error' => 'Unauthorized'
            ], 401);
        }
    }

    public function get_order(Request $request)
    {
        if (auth()->user()) {
            $this->validate($request, [
                'order_id'=>'required|numeric'
            ]);
            $order = Order::findOrFail($request->order_id);
            $order->project;
            $order->unit;
            $order->service;
            if ($order) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'get order',
                    'user' => auth()->user(),
                    'order' => $order,
                    
                ],200);
            }else{
                return response()->json([
                    'successful' => '0',
                    'status' => '02',
                    'error' => 'could handel Your Request, please try again'
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
    public function add_order_operation(Request $request)
    {
        if (auth()->user() && auth()->user()->role->name == 'customer service') {
            $this->validate($request, [
                'order_id' => 'required|numeric',
                'staff_id' => 'required|numeric'
                ]);
                $order = Order::find($request->order_id);
                $order->staff_id = $request->staff_id;
                if ($order->update()) {
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
