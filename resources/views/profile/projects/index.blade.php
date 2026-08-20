<h1>Liste des projets</h1>

@foreach ($projects as $project)
    <p>{{ $project->name }}</p>
@endforeach