<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use Inertia\Inertia;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class TasksController extends Controller
{
    public function index()
    {
        $tasks = Task::where('user_id', Auth::user()->id)->paginate(4);

        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks,
        ]);
    }  

    public function create()
    {
        return Inertia::render('Tasks/Create');
    }

    public function store(Request $request)
    {
        $create = [
            'name' => $request->name,
            'description' => $request->description,
            'user_id' => Auth::user()->id,
            'endDate' => $request->endDate,
            'status' => $request->status,
        ];

        $task = Task::create($create);

        if(isset($task->id)){
            return Redirect::route('dashboard')
            ->with('success', 'Tache creer avec success');
        }
        return Redirect::route('dashboard')
            ->with('error', 'Une erreur s\'est produite pendant la création de la tache');
    }

    public function edit(int $id)
    {
        $task = Task::where('id', $id)->first();

        return Inertia::render('Tasks/Edit', [
            'task' => $task,
        ]);
    }

    public function update(Request $request)
    {
        $task = Task::find($request->id);

        if(isset($task->id)){
            $task->update($request->all());

            return Redirect::route('dashboard')
            ->with('success','Félicitation, Vos Modifications ont ete prise en compte');
        }

        return Redirect::route('dashboard')
            ->with('error','Nous ne parvenons pas trouver cette tache');
    }

    public function showTaskByStatus(String $status)
    {
        // $result = [];

        $tasks = Task::where('status',$status)->where('user_id', Auth::user()->id)->paginate(4);

        if($status === 'all')
        {
            $tasks = Task::where('user_id', Auth::user()->id)->paginate(4);
        }
        return Inertia::render('Tasks/Index', [
            'tasks' => $tasks,
        ]);
    }

    public function destroy(int $id)
    {
        dd($id);
    }
}
