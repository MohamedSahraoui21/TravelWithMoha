<x-app-layout>
    <x-carpetaPrinc.principal>
        <br><br>

        <div id="map" class="relative h-[300px] overflow-hidden bg-cover bg-[50%] bg-no-repeat">
            <iframe
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d25605818.40999091!2d-11.040371195017878!3d40.20841771122888!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0xd422997111eafa3%3A0x401c50862d9a390!2sSpain!5e0!3m2!1sen!2ses!4v1622637977805!5m2!1sen!2ses"
                width="100%" height="480" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
        </div>

        <div class="container px-6 md:px-12">
            <div
                class="block rounded-lg bg-[hsla(0,0%,100%,0.8)] px-6 py-12 shadow-[0_2px_15px_-3px_rgba(0,0,0,0.07),0_10px_20px_-2px_rgba(0,0,0,0.04)]  md:py-16 md:px-12 -mt-[100px] backdrop-blur-[30px] border border-gray-300">

                <h2 class="text-2xl font-bold text-center text-gray-800 dark:text-gray-200 mb-6">Contacta con Nosotros
                </h2>
                <form method="POST" action="{{ route('contactanos.procesar') }}">
                    @csrf
                    <div class="relative mb-6">
                        <label for="nombre" class="block text-sm font-medium text-gray-700 dark:text-gray-200">Nombre
                            :</label>
                        <input type="text" id="nombre" value="{{ old('nombre') }}"
                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary"
                            placeholder="Nombre..." name="nombre">

                        <x-input-error for="nombre" class="mt-1" />
                    </div>

                    <div class="relative mb-6">
                        <label for="email"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Email</label>
                        @auth
                            <input type="email" id="email" value="{{ auth()->user()->email }}" readonly
                                class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary"
                                name="email" />
                        @else
                            <input type="email" id="email" value="{{ old('email') }}"
                                class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary"
                                name="email" />
                        @endauth
                        <x-input-error for="email" class="mt-1" />
                    </div>

                    <div class="relative mb-6">
                        <label for="contenido"
                            class="block text-sm font-medium text-gray-700 dark:text-gray-200">Contenido</label>
                        <textarea id="contenido" rows='5'
                            class="peer block min-h-[auto] w-full rounded border-2 bg-transparent py-[0.32rem] px-3 leading-[1.6] outline-none transition-all duration-200 ease-linear focus:placeholder:opacity-100 peer-focus:text-primary"
                            name="contenido">{{ old('contenido') }}</textarea>

                        <x-input-error for="contenido" class="mt-1" />
                    </div>



                    <div class="px-6 py-4 flex justify-end">
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
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
        </div>
    </x-carpetaPrinc.principal>
</x-app-layout>
