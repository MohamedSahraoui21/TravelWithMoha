<x-app-layout>
    <x-carpetaPrinc.principal>

        <form class="mx-auto w-3/4" action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <x-label for="titulo">Titulo</x-label>
            <x-input for="titulo" name="titulo" placeholhder="titulo..." class="w-full" value="{{ old('titulo') }}" />
            <x-input-error for="titulo" />
            <x-label for="contenido" class="mt-4">Contenido</x-label>
            <textarea name="contenido" id="contenido" class="w-full">{{ old('contenido') }}</textarea>
            <x-input-error for="contenido" />

            <div class="mb-6">
                <div class="flex w-full">
                    <div class="w-1/2 mr-2">
                        <label for="imagen" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">
                            IMAGEN</label>
                        <input type="file" id="imagen" oninput="img.src=window.URL.createObjectURL(this.files[0])"
                            name="imagen" accept="image/*"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" />

                    </div>
                    <div class="w-1/2">
                        <img src="{{ Storage::url('default.png') }}"
                            class="h-72 rounded w-full object-cover border-4 border-black" id="img">
                    </div>
                </div>
                <x-input-error for="imagen" />

            </div>


            <div class="flex flex-row-reverse mt-4">
                <x-button type="submit">Enviar</x-button>
                <x-button type="reset">Reset</x-button>

            </div>


        </form>


    </x-carpetaPrinc.principal>
</x-app-layout>
