<x-app-layout>
    <x-carpetaPrinc.principal>

        <form class="mx-auto w-3/4" action="{{ route('packs.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <br><br>
            <x-label for="nombre">Nombre</x-label>
            <x-input for="nombre" name="nombre" placeholhder="nombre..." class="w-full" value="{{ old('nombre') }}" />
            <x-input-error for="nombre" />
            <x-label for="descripcion" class="mt-4">Descripcion</x-label>
            <textarea name="descripcion" id="descripcion" class="w-full">{{ old('descripcion') }}</textarea>
            <x-input-error for="descripcion" />
            <x-label for="precio">Precio</x-label>
            <x-input type="number" id="precio" placeholder="precio..." class="w-full" step='1' min="0"
                max="9999.99" name="precio" />
            <x-input-error for="precio" />

            <x-label for="disponible" class="mt-4">Diponible</x-label>
            <div class="flex items-center mb-4">
                <input id="disponible" name="disponible" type="checkbox" value="SI"
                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                <label for="disponible" class="ms-2 text-sm font-medium text-gray-900 dark:text-gray-300">Si
                </label>
            </div>
            <x-input-error for="disponible" />

            <x-label for="imagen" class="mt-4">Imagen</x-label>
            <input type="file" id="imagen" oninput="img.src=window.URL.createObjectURL(this.files[0])"
                name="imagen" accept="image/*"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />
            <x-input-error for="imagen" />
            <div class="w-1/2">
                <img src="{{ Storage::url('default.png') }}"
                    class="h-72 rounded w-full object-cover border-4 border-black" id="img">
            </div>


            <div class="flex flex-row-reverse mt-4">
                <x-button type="submit">Enviar</x-button>
                <x-button type="reset">Reset</x-button>

            </div>


        </form>


    </x-carpetaPrinc.principal>
</x-app-layout>
