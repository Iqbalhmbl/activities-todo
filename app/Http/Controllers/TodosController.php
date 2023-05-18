<?php

namespace App\Http\Controllers;

use App\Models\Todos;
use Illuminate\Http\Request;
use App\Models\Activities;
class TodosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $todo = Todos::join('activities','activities.id','=','todos.activity_group_id')
                        ->select('todos.*','activities.title as title_act')
                        ->get();
        return view('todos.index', compact('todo'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $act = Activities::all();

        return view('todos.create', compact('act'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'activity_group_id' => 'required|max:255',
            'title' => 'required|max:255',
            'priority' => 'required|max:255',
        ]);

        $todo = new Todos();
        $todo->activity_group_id = $request->activity_group_id;
        $todo->title = $request->title;
        $todo->priority = $request->priority;
        $todo->save();

        return redirect(route('todo.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function show(Todos $todos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $todo = Todos::find($id);
        $act = Activities::all();

        return view('todos.edit', compact('todo','act'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $todo = Todos::find($id);

        $request->validate([
            'activity_group_id' => 'required|max:255',
            'title' => 'required|max:255',
            'priority' => 'required|max:255',
        ]);

        $todo->activity_group_id = $request->activity_group_id;
        $todo->title = $request->title;
        $todo->priority = $request->priority;
        $todo->save();

        return redirect(route('todo.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Todos  $todos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $todo = Todos::find($id);
        $todo->delete();

        return redirect(route('todo.index'));

    }
}
