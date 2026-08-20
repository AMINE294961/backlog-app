<h1>{{ $project->name }}</h1>

<p>{{ $project->description }}</p>

<a href="{{ route('projects.tasks.index', $project->id) }}">
    Voir les tâches
</a>