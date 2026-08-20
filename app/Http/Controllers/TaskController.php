<?php 
namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use App\Models\Project;
use App\Models\User;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class TaskController extends Controller
{
     use AuthorizesRequests;
    public function index(Project $project)
    {
        $tasks = $project->tasks;

        return view('tasks.index', compact('tasks', 'project'));
    }

        /**
         * Show the form for creating a new resource.
         */
        public function create(Project $project)
        {
            $developers=User::where('role','developpeur')->get();
            return view('tasks.create',compact('project','developers'));
        }

        /**
         * Store a newly created resource in storage.
         */
        public function store(Request $request, Project $project)
    {
        $request->validate([
            'title' => 'required|max:55',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $project->tasks()->create([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()->route('projects.tasks.index', $project->id)
     ->with('success', 'Tâche créée avec succès');
    }

        /**
         * Display the specified resource.
         */
        public function show(Project $project, Task $task)
    {
        return view('tasks.show', compact('project', 'task'));
    }

        /**
         * Show the form for editing the specified resource.
         */
        public function edit(Project $project, Task $task)
    {
        $this->authorize('update', $task);
        return view('tasks.edit', compact('project', 'task'));
    }

        /**
         * Update the specified resource in storage.
         */
        public function update(Request $request, Project $project, Task $task)
    {
        $this->authorize('update', $task);
        $request->validate([
            'title' => 'required|max:55',
            'description' => 'nullable',
            'status' => 'required',
            'priority' => 'required',
            'assigned_to' => 'nullable|exists:users,id',
        ]);

        $task->update([
            'title' => $request->title,
            'description' => $request->description,
            'status' => $request->status,
            'priority' => $request->priority,
            'assigned_to' => $request->assigned_to,
        ]);

        return redirect()->route('projects.tasks.index', $project->id)
     ->with('success', 'Tâche modifiée avec succès');
    }

        /**
         * Remove the specified resource from storage.
         */
        public function destroy(Project $project, Task $task)
    {
        $task->delete();

        return redirect()->route('projects.tasks.index', $project->id)
    ->with('success', 'Tâche supprimée avec succès');
    }
    public function updateStatus(Request $request, Task $task)
    {
        $task->status = $request->status;
        $task->save();

        return back();
    }
    }
