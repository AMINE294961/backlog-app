<x-app-layout>
<x-slot name="header">
    <h2>
        Liste des projets
    </h2>
</x-slot>

    <div class="p-6">

        @if(session('success'))
            <div class="bg-green-100 text-green-800 px-4 py-3 rounded mb-4">
                {{ session('success') }}
            </div>
        @endif

        <p class="mb-4">
            User connecté :
            {{ auth()->user()->name }}
            -
            {{ auth()->user()->role }}
            -
            ID: {{ auth()->id() }}
        </p>

        <a href="{{ route('projects.create') }}"
           class="bg-blue-600 text-white px-4 py-2 rounded">
            Créer un projet
        </a>

        <hr class="my-4">

        @foreach ($projects as $project)

            <div class="mb-4">

                <p class="font-bold mb-2">
                    {{ $project->name }}
                </p>

                <a href="{{ route('projects.edit', $project->id) }}"
                   class="bg-blue-600 text-white px-3 py-1 rounded">
                    Modifier
                </a>

                <a href="{{ route('projects.show', $project->id) }}"
                   class="bg-gray-500 text-white px-3 py-1 rounded">
                    Voir le projet
                </a>

                <form action="{{ route('projects.destroy', $project->id) }}"
                      method="POST"
                      style="display:inline;">
                    @csrf
                    @method('DELETE')

                    <button type="submit"
                            class="bg-red-600 text-white px-3 py-1 rounded">
                        Supprimer
                    </button>
                </form>

            </div>

            <hr class="my-4">

        @endforeach

    </div>

</x-app-layout>