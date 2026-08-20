<x-app-layout>

    <x-slot name="header">
        <h2>
            Détails de la tâche
        </h2>
    </x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <h1 class="text-2xl font-bold mb-4">
            {{ $task->title }}
        </h1>

        <p class="mb-2">
            <strong>Description :</strong>
            {{ $task->description }}
        </p>

        <p class="mb-2">
            <strong>Statut :</strong>
            {{ $task->status }}
        </p>

        <p class="mb-4">
            <strong>Priorité :</strong>
            {{ $task->priority }}
        </p>

        <hr class="my-6">

        <h2 class="text-xl font-bold mb-4">
            Commentaires
        </h2>

        @forelse($task->comments as $comment)

            <div class="bg-gray-100 p-4 rounded mb-3">

                <p class="font-bold">
                    {{ $comment->user->name }}
                </p>

                <p>
                    {{ $comment->content }}
                </p>

            </div>

        @empty

            <p class="text-gray-500">
                Aucun commentaire pour le moment.
            </p>

        @endforelse

        <hr class="my-6">

        <h2 class="text-xl font-bold mb-4">
            Ajouter un commentaire
        </h2>

        <form action="{{ route('comments.store', $task->id) }}" method="POST">
            @csrf

            <textarea
                name="content"
                rows="4"
                class="border rounded w-full p-2 mb-3"
                placeholder="Écrire un commentaire..."
                required></textarea>

            <button
                type="submit"
                class="bg-blue-600 text-white px-4 py-2 rounded">
                Ajouter le commentaire
            </button>
        </form>

    </div>

</x-app-layout>