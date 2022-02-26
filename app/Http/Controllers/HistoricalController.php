<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Inertia\Inertia;
use App\Models\Task;
use Illuminate\Support\Facades\Auth;

class HistoricalController extends Controller
{
    public function index()
    {
        $tasksHistorical = Task::where('user_id', Auth::user()->id)->paginate(10);
        return Inertia::render('Historical', [
            'tasksHistorical' => $tasksHistorical, 
        ]);
    }
 

    public function getData(Request $request)
    {
        $tasks = Task::where('user_id', Auth::user()->id)

        ->when($request->current_date, function ($query, $term){
            
            $query->where('created_at', $term);

        })->orderBy('id','DESC')->paginate(5);
        
        return response()->json($tasks);
    }
}
