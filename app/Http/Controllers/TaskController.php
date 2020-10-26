<?php

namespace App\Http\Controllers;

use App\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    
    public function index(){

        $tasks = Task::all();

        return view('tasks.index', compact('tasks'));
    }

    public function detail(int $id){
    
        $task = Task::find($id);

        return view('tasks.detail', compact('task'));
    }

    public function update(int $id, Request $request){

        $task = Task::find($id);
        if($task == null){
            abort(404);
        }

        $fillable = [];
        if(isset($request->title)){
            $filldata['title'] = $request->title;
        }
        if(isset($request->executed)){
            $filldata['executed'] = $request->executed;
        }

        if(count($fillable) > 0){
            $task->fill($fillable);
            $task->save();
        }

        return redirect('/tasks/'.$id);
    }
    
}
