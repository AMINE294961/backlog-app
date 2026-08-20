<?php

namespace App\Http\Controllers;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
class ProjectController extends Controller
{
    use AuthorizesRequests;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects=Project::all() ; 
        return view ('projects.index',compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required|max:255',
            'description'=>'nullable',

        ]);
        Project::create([
            'name'=> $request->name,
            'description'=>$request->description,
            'owner_id' => auth()->id(),
        ]);
        return redirect()->route('projects.index')
     ->with('success', 'Projet créé avec succès');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $project=Project::findOrFail($id);
        return view('projects.show',compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $project=Project::findOrFail($id);
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
        'name' => 'required|max:255',
        'description' => 'nullable',
    ]);

    $project = Project::findOrFail($id);

    $project->update([
        'name' => $request->name,
        'description' => $request->description,
    ]);

    return redirect()->route('projects.index')
    ->with('success', 'Projet modifié avec succès');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function kanban(Project $project)
{
    $tasksByStatus = $project->tasks->groupBy('status');

    return view('projects.kanban', compact('project', 'tasksByStatus'));
}
    public function destroy(string $id)
    {
        $project = Project::findOrFail($id);
        $this->authorize('delete', $project);
    $project->delete();

    return redirect()->route('projects.index')
    ->with('success', 'Projet supprimé avec succès');
    }
}
