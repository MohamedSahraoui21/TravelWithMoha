<x-app-layout>
    <x-carpetaPrinc.principal>
        <br><br>

        <div class="w-full max-w-md mx-auto bg-white dark:bg-gray-800 shadow-md rounded-lg overflow-hidden">
            <form method="POST" action="{{ route('contactanos.procesar') }}">
                @csrf
                <div class="px-6 py-4">
                    <label for="nombre"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre</label>
                    <input type="text" id="nombre" value="{{ old('nombre') }}"
                        class="mt-1 p-2.5 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Nombre..." name="nombre">
                    <x-input-error for="nombre" class="mt-1" />
                </div>

                <div class="px-6 py-4">
                    <label for="email"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                    @auth
                        <input type="email" id="email" value="{{ auth()->user()->email }}" readonly
                            class="mt-1 p-2.5 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email..." name="email" />
                    @else
                        <input type="email" id="email" value="{{ old('email') }}"
                            class="mt-1 p-2.5 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            placeholder="Email..." name="email" />
                    @endauth
                    <x-input-error for="email" class="mt-1" />
                </div>

                <div class="px-6 py-4">
                    <label for="contenido"
                        class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contenido</label>
                    <textarea id="contenido" rows='5'
                        class="mt-1 p-2.5 block w-full rounded-md border-gray-300 focus:border-blue-500 focus:ring-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        name="contenido">{{ old('contenido') }}</textarea>
                    <x-input-error for="contenido" class="mt-1" />
                </div>
                <div class="px-6 py-4 flex justify-end">
                    <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fa-solid fa-paper-plane"></i> ENVIAR
                    </button>
                    <button type="reset"
                        class="ml-2 bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-paintbrush"></i> LIMPIAR
                    </button>
                    <a href="{{ route('home') }}"
                        class="ml-2 bg-red-500 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
                        <i class="fas fa-xmark"></i> CANCELAR</a>
                </div>
            </form>
        </div>
    </x-carpetaPrinc.principal>
</x-app-layout>
