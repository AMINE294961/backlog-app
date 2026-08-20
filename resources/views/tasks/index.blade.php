<x-app-layout>

    <x-slot name="header">
        <h2>
            Liste des tâches du projet : {{ $project->name }}
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <a href="{{ route('projects.tasks.create', $project->id) }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Créer une tâche
        </a>

        <hr class="my-4">

        @foreach ($tasks as $task)

            <div class="mb-4">

                <p class="font-bold mb-2">
                    {{ $task->title }}
                </p>

                <a href="{{ route('projects.tasks.edit', [$project->id, $task->id]) }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded">
                    Modifier
                </a>

            </div>

            <hr class="my-4">

        @endforeach

    </div>

</x-app-layout>