<h1>Modifier un projet</h1>

<form action="{{ route('projects.update', $project->id) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Nom :</label><br>
    <input type="text" name="name" value="{{ $project->name }}"><br><br>

    <label>Description :</label><br>
    <input type="text" name="description" value="{{ $project->description }}"><br><br>

    <button type="submit">Modifier</button>
</form> 