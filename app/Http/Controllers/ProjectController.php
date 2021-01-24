<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Project;
class ProjectController extends Controller
{
    //
    public function add_project(Request $request)
    {
        if (auth()->user()) {
            $this->validate($request, [
                'name' => 'required|unique:projects'
            ]);
            $project = new Project();
            $project->name = $request->name;
            if ($project->save()) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'Project Has Been Created successfully',
                    'user' => auth()->user(),
                    'project' => $project
                ],200);
            }else{
                return response()->json([
                    'successful' => '0',
                    'status' => '02',
                    'error' => 'could not create project, please try again'
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
    public function get_projects()
    {
        if (auth()->user()) {
            $projects = Project::all();
            if ($projects) {
                return response()->json([
                    'successful' => '1',
                    'status' => '01',
                    'message' => 'All projects',
                    'user' => auth()->user(),
                    'projects' => $projects
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
