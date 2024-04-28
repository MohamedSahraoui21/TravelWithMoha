<x-app-layout>
    <x-carpetaPrinc.principal>

        <div class="flex justify-end mb-4">
            <a href="{{ route('posts.create') }}">
                <x-button>+ NUEVO</x-button>
            </a>
        </div>
        @if ($posts->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-4 gap-6">
                @foreach ($posts as $item)
                    <div class="bg-white rounded-lg shadow-md dark:bg-gray-800">
                        <img class="w-full h-50  object-cover" src="{{ Storage::url($item->imagen) }}"
                            alt="{{ $item->titulo }}">
                        <div class="p-4">
                            <h3 class="font-semibold text-lg text-gray-800 dark:text-white">{{ $item->titulo }}</h3>
                            <p class="text-gray-600 dark:text-gray-300">{{ $item->detalle }}</p>
                        </div>
                        <div class="flex items-center justify-between px-4 py-2 bg-gray-100 dark:bg-gray-700">
                            <a href="{{ route('show-post', $item->id) }}"
                                class="text-blue-500 dark:text-blue-400 hover:underline">
                                Ver Detalles
                            </a>
                            <div class="flex items-center">
                                <a href="{{ route('posts.edit', $item->id) }}"
                                    class="text-yellow-500 dark:text-yellow-400 hover:underline">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('posts.destroy', $item->id) }}" method="POST">
                                    @csrf
                                    @method('delete')
                                    <button type="submit" class="text-red-500 dark:text-red-400 ml-2 hover:underline">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <p>Todavia no hay Posts</p>
        @endif


        <div class="mt-6">
            {{ $posts->links() }}
        </div>

    </x-carpetaPrinc.principal>
</x-app-layout>
