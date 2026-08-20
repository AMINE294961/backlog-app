<h1>Mes tâches</h1>

@foreach ($tasks as $task)
    <p>{{ $task->title }}</p>
@endforeach