<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Task;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request, Task $task)
    {
        $request->validate([
            'content' => 'required|max:1000',
        ]);

        $task->comments()->create([
            'content' => $request->content,
            'user_id' => auth()->id(),
        ]);

        return back()->with('success', 'Commentaire ajouté avec succès');
    }
}