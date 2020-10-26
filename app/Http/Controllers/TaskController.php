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

    public function update(int $id){

        return redirect('/tasks/'.$id);
    }
}
