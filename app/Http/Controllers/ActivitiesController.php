<?php

namespace App\Http\Controllers;

use App\Models\Activities;
use Illuminate\Http\Request;

class ActivitiesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $act = Activities::all();
        return view('activities.index', compact('act'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('activities.create');
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
            'title' => 'required|max:255',
            'email' => 'required|max:255',
        ]);

        $act = new Activities();
        $act->title = $request->title;
        $act->email = $request->email;
        $act->save();

        return redirect(route('act.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function show(Activities $activities)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $act = Activities::find($id);

        return view('activities.edit', compact('act'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $act = Activities::find($id);

        $request->validate([
            'title' => 'required|max:255',
            'email' => 'required|max:255',
        ]);
        $act->title = $request->title;
        $act->email = $request->email;
        $act->save();

        return redirect(route('act.index'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Activities  $activities
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $act = Activities::find($id);
        $act->delete();

        return redirect(route('act.index'));
    }
}
