<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Models\Todos;
use App\Models\Activities;

class ApiController extends Controller
{
    public $successStatus = 200;

    //ACTIVITIES
    public function activitiesItem()
    {
        $activities = Activities::all();

        if (!$activities) {
            return response()->json([
                'status' => 'Not Found',
            ], 404);
        }

        return response()->json([
            'status' => 'Success',
            'message' => 'Success',
            'data' => $activities,
        ], 200);
    }

    public function ActivitiesItemOne($id)
    {
        $activities = Activities::find($id);

        if (!$activities) {
            return response()->json([
                'status' => 'Not Found',
                'message' => 'Activities with ID ' . $id . ' Not Found',
            ], 404);
        }

        return response()->json($activities);
    }

    public function createActivities(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'title' => 'required',
            'email' => 'required'
        ]);

        $todo = new Activities();
        $todo->title = $request->input('title');
        $todo->email = $request->input('email');
        $todo->save();

        return response()->json($todo, 201);
    }

    public function deleteActivities($id)
    {
        $activities = Activities::find($id);

        if (!$activities) {
            return response()->json([
                'status' => 'Not Found',
                'message' => 'Activities with ID ' . $id . ' Not Found',
            ], 404);
        }

        $activities->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Success',
            'data' => [],
        ], 200);
    }

    public function updateActivities(Request $request, $id)
    {
        $activities = Activities::find($id);

        if (!$activities) {
            return response()->json([
                'status' => 'Not Found',
                'message' => 'Activities with ID ' . $id . ' Not Found',
            ], 404);
        }
        if($request->input('title')){
            $activities->title = $request->input('title');
        }
        if($request->input('email')){
            $activities->email = $request->input('email');
        }
        $activities->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Success',
            'data' => $activities,
        ], 200);
    }

    //TODOS

    public function todoItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'activity_group_id' => 'required'
        ]);

        if ($validator->fails()) {
            return response()->json(['error' => $validator->errors()], 401);
        }

        $todo = Todos::where('activity_group_id',$request->activity_group_id)->first();

        return response()->json(['success' => true, 'todo' => $todo],$this->successStatus);
    }

    public function todoItemOne($id)
    {
        $todo = Todos::find($id);

        if (!$todo) {
            return response()->json([
                'status' => 'Not Found',
                'message' => 'Todo with ID ' . $id . ' Not Found',
            ], 404);
        }

        return response()->json($todo);
    }

    public function createTodo(Request $request)
    {


        $todo = new Todos();
        $todo->title = $request->input('title');
        $todo->activity_group_id = $request->input('activity_group_id');
        $todo->priority = $request->input('priority');
        $todo->save();

        return response()->json($todo, 201);
    }

    public function deleteTodo($id)
    {
        $todo = Todos::find($id);

        if (!$todo) {
            return response()->json([
                'status' => 'Not Found',
                'message' => 'Todo with ID ' . $id . ' Not Found',
            ], 404);
        }

        $todo->delete();

        return response()->json([
            'status' => 'Success',
            'message' => 'Success',
            'data' => [],
        ], 200);
    }

    public function updateTodo(Request $request, $id)
    {
        $todo = Todos::find($id);

        if (!$todo) {
            return response()->json([
                'status' => 'Not Found',
                'message' => 'Todo with ID ' . $id . ' Not Found',
            ], 404);
        }
        if($request->input('title')){
            $todo->title = $request->input('title');
        }
        if($request->input('activity_group_id')){
            $todo->activity_group_id = $request->input('activity_group_id');
        }
        if($request->input('priority')){
            $todo->priority = $request->input('priority');
        }
        $todo->save();

        return response()->json([
            'status' => 'Success',
            'message' => 'Success',
            'data' => $todo,
        ], 200);
    }



}
