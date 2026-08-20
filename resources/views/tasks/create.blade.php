<h1>Créer une tâche pour le projet : {{ $project->name }}</h1>

<form action="{{ route('projects.tasks.store', $project->id) }}" method="POST">
    @csrf

    <label>Titre :</label>
    <input type="text" name="title">

    <br><br>

    <label>Description :</label>
    <textarea name="description"></textarea>

    <br><br>

    <label>Statut :</label>
    <select name="status">
        <option value="a_faire">À faire</option>
        <option value="en_cours">En cours</option>
        <option value="termine">Terminé</option>
    </select>

    <br><br>

    <label>Priorité :</label>
    <select name="priority">
        <option value="basse">Basse</option>
        <option value="moyenne">Moyenne</option>
        <option value="haute">Haute</option>
    </select>

    <br><br>

    <label>Développeur :</label>
    <select name="assigned_to">
        <option value="">-- Choisir un développeur --</option>

        @foreach ($developers as $developer)
            <option value="{{ $developer->id }}">
                {{ $developer->name }}
            </option>
        @endforeach
    </select>

    <br><br>

    <button type="submit">Créer la tâche</button>
</form>