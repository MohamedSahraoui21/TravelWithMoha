<x-app-layout>
    <x-carpetaPrinc.principal>

        <div class="flex justify-end mb-4">
            <a href="{{ route('packs.create') }}">
                <x-button>+ NUEVO</x-button>
            </a>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach ($packs as $item)
                <div class="bg-white rounded-lg shadow-md overflow-hidden">
                    <img class="w-full h-48 object-cover" src="{{ Storage::url($item->imagen) }}"
                        alt="{{ $item->nombre }}">
                    <div class="p-4">
                        <h3 class="font-semibold text-lg text-gray-800">{{ $item->nombre }}</h3>
                        <div class="flex justify-between items-center mt-2">
                            <span class="text-gray-900 font-bold">{{ $item->precio }}€</span>
                            <span class="text-gray-500">Disponible:
                                <span
                                    class="@if ($item->disponible == 'NO') text-red-500 @else text-green-500 @endif">{{ $item->disponible }}</span>
                            </span>
                        </div>
                        <div class="mt-4 flex justify-end">
                            <a href="{{ route('packs.show', $item->id) }}"
                                class="text-blue-500 hover:underline mr-2">Ver Detalles</a>
                            <a href="{{ route('packs.edit', $item->id) }}"
                                class="text-yellow-500 hover:underline mr-2">Editar</a>
                            <form action="{{ route('packs.destroy', $item->id) }}" method="POST">
                                @csrf
                                @method('delete')
                                <button type="submit" class="text-red-500 hover:underline">Eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <div class="mt-6">
            {{ $packs->links() }}
        </div>

    </x-carpetaPrinc.principal>
</x-app-layout>
