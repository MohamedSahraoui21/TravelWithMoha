<x-app-layout>
    <x-carpetaPrinc.principal>
        <form class="mx-auto w-3/4" action="{{ route('posts.update', $post) }}" method="POST"
            enctype="multipart/form-data">
            @csrf
            @method('put')
            <br><br>
            <x-label for="titulo">Titulo</x-label>
            <x-input for="titulo" name="titulo" placeholhder="titulo..." class="w-full" value="{{ $post->titulo }}" />
            <x-input-error for="titulo" />
            <x-label for="contenido" class="mt-4">Contenido</x-label>
            <textarea name="contenido" id="contenido" class="w-full">{{ $post->contenido }}</textarea>
            <x-input-error for="contenido" />

            <x-label for="imagen" class="mt-4">Imagen</x-label>
            <input type='file' name="imagen" accept="image/" id="imagen" value="{{ $post->imagen }}" />
            <x-input-error for="imagen" />
            <div class="w-full h-60 bg-center bg-cover">
                <img src="{{ Storage::url($post->imagen) }}" class="w-full h-full" alt="">

            </div>


            <div class="flex flex-row-reverse mt-4">
                <x-button type="submit">Enviar</x-button>
                <x-button type="reset">Reset</x-button>

            </div>


        </form>
    </x-carpetaPrinc.principal>
</x-app-layout>
