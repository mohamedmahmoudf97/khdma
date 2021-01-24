<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\Unit;
class UnitController extends Controller
{
    //
    public function add_unit(Request $request)
    {
        if (auth()->user()) {
            $this->validate($request, [
                'name' => 'required',
                'project_id'=>'required|numeric'
            ]);
            $project = Project::findOrFail($request->project_id);
            if ($project->units()->save(new Unit(['name'=>$request->name]))) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'Unit Has Been Created successfully',
                    'user' => auth()->user(),
                    'project' => $project->units
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
    


    public function get_units(Request $request)
    {
        if (auth()->user()) {
            $this->validate($request, [
                'project_id'=>'required|numeric'
            ]);
            $project = Project::findOrFail($request->project_id);
            if ($project) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'all Units for project ',
                    'user' => auth()->user(),
                    'project' => $project,
                    'units' => $project->units
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
}





