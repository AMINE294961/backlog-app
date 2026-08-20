<h1>Modifier la tâche : {{ $task->title }}</h1>

<form action="{{ route('projects.tasks.update', [$project->id, $task->id]) }}" method="POST">
    @csrf
    @method('PUT')

    <label>Titre :</label>
    <input type="text" name="title" value="{{ $task->title }}">

    <br><br>

    <label>Description :</label>
    <textarea name="description">{{ $task->description }}</textarea>

    <br><br>

    <label>Statut :</label>
    <select name="status">
        <option value="a_faire" {{ $task->status == 'a_faire' ? 'selected' : '' }}>
            À faire
        </option>

        <option value="en_cours" {{ $task->status == 'en_cours' ? 'selected' : '' }}>
            En cours
        </option>

        <option value="termine" {{ $task->status == 'termine' ? 'selected' : '' }}>
            Terminé
        </option>
    </select>

    <br><br>

    <label>Priorité :</label>
    <select name="priority">
        <option value="basse" {{ $task->priority == 'basse' ? 'selected' : '' }}>
            Basse
        </option>

        <option value="moyenne" {{ $task->priority == 'moyenne' ? 'selected' : '' }}>
            Moyenne
        </option>

        <option value="haute" {{ $task->priority == 'haute' ? 'selected' : '' }}>
            Haute
        </option>
    </select>

    <br><br>

    <button type="submit">Modifier la tâche</button>
</form>