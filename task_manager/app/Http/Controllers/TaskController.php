<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        $tasks = Task::all();
        return view("tasks_view.index", compact("tasks"));
    }
    public function create()
    {
        return view("tasks_view.create");
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "string|max:255|required",
            "description" => "string|max:1000|required",
        ]);

        Task::create([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status == 'on' ? 1 : 0
        ]);

        return redirect()->route("index")->with("success","tache enregistre avec succes");
    }
    public function edit(int $id){
        $task = Task::where('id', $id)->first();
        return view("tasks_view.create", compact("task"));
    }
    public function update(Request $request, int $id)
    {
        $request->validate([
            "title" => "string|max:255|required",
            "description" => "string|max:1000|required",
        ]);
        $task = Task::where('id', $id)->first();

        $task->update([
            "title" => $request->title,
            "description" => $request->description,
            "status" => $request->status == 'on' ? 1 : 0
        ]);
        return redirect()->route('index')->with('success','tache modifiee avec success');
    }
    public function destroy(int $id)    
    {
        Task::where('id', $id)->delete();
        return redirect()->route('index')->with('success','Suppression de la tache avec succes');
    }

}
