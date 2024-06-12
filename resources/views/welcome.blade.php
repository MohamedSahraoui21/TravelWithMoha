<x-carpetaPrinc.principal>
    <br>
    <div class="lg:col-span-1 lg:w-full lg:ml-0">
        <div id="meteoContainer"
            class="bg-gradient-to-r from-blue-400 to-cyan-600 rounded-lg shadow-md p-6 mb-6 flex flex-col items-center">
            <div class="text-4xl text-yellow-300 mb-4">
                <i class="fas fa-sun"></i>
            </div>
            <h2 class="text-xl font-semibold text-white mb-4" style="text-align: center">Meteo del Mundo</h2>
            <div class="mb-4 w-full">
                <input id="ciudadInput"
                    class="w-full px-4 py-2 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                    type="text" placeholder="Ingrese una ciudad">
            </div>
            <div class="flex justify-center w-full">
                <button id="BtnBuscar"
                    class="px-6 py-2 bg-blue-800 text-white rounded-lg hover:bg-blue-700 focus:outline-none">Buscar</button>
            </div>
            <div id="weatherContainer" class="hidden mt-4 text-center w-full">
                <h2 id="nombreCiudad" class="text-lg font-semibold text-white mb-2"></h2>
                <div id="detallesTiempo" class="text-white"></div>
            </div>
        </div>
    </div>
    <h2 class="text-2xl font-bold text-gray-800 mb-6 text-center">Explora Nuestros Artículos de Viaje</h2>

    <div>
        @if ($posts->count())
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach ($posts as $post)
                    <article @class([
                        'relative rounded-lg overflow-hidden bg-white shadow-md hover:shadow-lg transition-shadow duration-300',
                        'md:col-span-2' => $loop->first,
                    ])>
                        <a href="{{ route('show-post', $post->id) }}">
                            <img class="w-full h-72 object-cover object-center" src="{{ Storage::url($post->imagen) }}"
                                alt="{{ $post->titulo }}">
                        </a>
                        <div class="p-4">
                            <a href="{{ route('show-post', $post->id) }}">
                                <h2 class="text-xl font-semibold text-gray-800 truncate">{{ $post->titulo }}</h2>
                            </a>
                            <p class="text-sm text-blue-600 italic mb-2">{{ $post->user->name }}</p>
                            <div class="flex items-center justify-between text-sm text-gray-600 mb-4">
                                <div>
                                    @auth
                                        <button wire:click="like({{ $post }})" class="focus:outline-none">
                                            <i @class([
                                                'fas fa-heart',
                                                'text-red-500' => in_array($post->id, $postslikes),
                                            ])>
                                                <span>{{ $post->likes()->count() }}</span>
                                            </i>
                                        </button>
                                    @else
                                        <a href="{{ route('login') }}">
                                            <i class="fas fa-heart">
                                                <span>{{ $post->likes()->count() }}</span>
                                            </i>
                                        </a>
                                    @endauth
                                </div>
                                <i class="fas fa-comment">
                                    <span>{{ $post->comentario()->count() }}</span>
                                </i>
                            </div>
                            <div>
                                <!-- Plantilla de Comentario -->
                                @auth
                                    <div class="border border-gray-300 p-4 mb-4 rounded-lg bg-gray-50">
                                        <div class="flex items-center mb-4">
                                            <img src="{{ auth()->user()->profile_photo_url }}" alt="Foto del autor"
                                                class="w-12 h-12 rounded-full mr-4">
                                            <div class="flex-1 flex items-center">
                                                <input type="text"
                                                    class="w-full p-2 border border-gray-300 rounded-lg mr-2"
                                                    wire:model.defer="comentarios.{{ $post->id }}"
                                                    placeholder="Escribe un comentario..." />
                                                <button wire:click="escribirComent({{ $post->id }})"
                                                    class="bg-blue-800 text-white px-3 py-1 rounded-lg hover:bg-blue-600 transition-colors duration-300">Enviar</button>
                                            </div>
                                        </div>
                                    </div>
                                @endauth
                                @foreach ($post->comentario()->latest()->limit(2)->get() as $comment)
                                    <div class="border border-gray-300 p-4 mb-4 rounded-lg bg-white shadow-sm">
                                        <div class="flex items-center mb-2">
                                            <img src="{{ $comment->user->profile_photo_url }}" alt="Foto del autor"
                                                class="w-12 h-12 rounded-full mr-4">
                                            <div class="flex-1">
                                                <h4 class="text-lg font-semibold">{{ $comment->user->name }}</h4>
                                                <p class="text-sm text-gray-600">{{ $comment->content }}</p>
                                                <p class="text-xs text-gray-500">
                                                    {{ $comment->created_at->format('d M Y, H:i') }}</p>
                                                <!-- Aquí añadimos la fecha de creación -->
                                            </div>
                                            @auth
                                                @if ($comment->user_id === $usuario->id || Auth::user()->isAdmin == 'SI')
                                                    <button wire:click="borrarComentario({{ $comment->id }})"
                                                        class="ml-4 px-3 py-1 bg-red-500 text-white rounded-lg hover:bg-red-600 transition-colors duration-300">Borrar</button>
                                                @endif
                                            @endauth
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </article>
                @endforeach
            </div>
            <div class="mt-8">
                {{ $posts->links() }}
            </div>
        @else
            <p class="p-4 bg-zinc-500 text-white rounded-lg text-xl"><i
                    class="fa-solid fa-heart-crack text-xl mr-2"></i>No hay ningún artículo</p>
        @endif
    </div>




</x-carpetaPrinc.principal>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        const BtnBuscar = document.getElementById("BtnBuscar");
        const ciudadInput = document.getElementById("ciudadInput");
        const weatherContainer = document.getElementById("weatherContainer");
        const nombreCiudad = document.getElementById("nombreCiudad");
        const detallesTiempo = document.getElementById("detallesTiempo");

        BtnBuscar.addEventListener("click", function() {
            const ciudad = ciudadInput.value.trim();
            const apiKey = 'df4fe49b3d432afbdf255bfa021c03c0';

            if (ciudad !== "") {
                fetch(
                        `https://api.openweathermap.org/data/2.5/weather?q=${ciudad}&appid=${apiKey}&units=metric`
                    )
                    .then(response => response.json())
                    .then(data => {
                        detallesTiempo.innerHTML = `
                            <div>Temperatura: ${data.main.temp}°C</div>
                            <div>Descripción: ${data.weather[0].description}</div>
                            <div>Humedad: ${data.main.humidity}%</div>
                        `;
                        weatherContainer.classList.remove("hidden");
                    })
                    .catch(error => {
                        console.error("Error al obtener el tiempo:", error);
                        nombreCiudad.textContent = "Error al obtener el tiempo.";
                        detallesTiempo.innerHTML = "";
                        weatherContainer.classList.remove("hidden");
                    });
            }
        });
    });
</script>
