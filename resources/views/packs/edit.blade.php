<x-app-layout>
    <x-carpetaPrinc.principal>

        <form class="mx-auto w-3/4" action="{{ route('packs.update', $pack) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <br><br>
            <x-label for="nombre">Nombre</x-label>
            <x-input for="nombre" name="nombre" placeholhder="nombre..." class="w-full" value="{{ $pack->nombre }}" />
            <x-input-error for="nombre" />
            <x-label for="descripcion" class="mt-4">Descripcion</x-label>
            <textarea name="descripcion" id="descripcion" class="w-full">{{ $pack->descripcion }}</textarea>
            <x-input-error for="descripcion" />

            <x-input type="number" id="precio" placeholder="precio..." class="w-full" step='1' min="0"
                max="9999.99" name="precio" value="{{ $pack->precio }}" />
            <x-input-error for="precio" />

            <x-label for="disponible" class="mt-4">Diponible</x-label>
            <div class="flex items-center mb-4">
                <input id="disponible" name="disponible" type="checkbox" value="{{ $pack->disponible }}"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="disponible" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Si
                </label>
            </div>
            <x-input-error for="disponible" />

            <x-label for="imagen" class="mt-4">Imagen</x-label>
            <input type='file' name="imagen" accept="image/" id="imagen" value="{{ $pack->imagen }}" />
            <x-input-error for="imagen" />
            <div class="w-full h-60 bg-center bg-cover">
                <img src="{{ Storage::url($pack->imagen) }}" class="w-full h-full" alt="">

            </div>


            <div class="flex flex-row-reverse mt-4">
                <x-button type="submit">Enviar</x-button>
                <x-button type="reset">Reset</x-button>

            </div>


        </form>


    </x-carpetaPrinc.principal>
</x-app-layout>
