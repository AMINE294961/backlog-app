<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Task;
use App\Http\Controllers\DashboardController;
class DashboardController extends Controller
{
    public function myTasks()
    {
        $tasks = Task::where('assigned_to', auth()->id())->get();
        return view('my-tasks', compact('tasks'));
    }
}
