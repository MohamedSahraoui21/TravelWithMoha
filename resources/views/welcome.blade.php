    <x-carpetaPrinc.principal>
        <div class="lg:col-span-1 lg:w-1/3 lg:ml-auto">
            <div class="bg-gradient-to-r from-indigo-400 to-purple-600 rounded-lg shadow-md p-6 mb-6">

                <h2 class="text-xl font-semibold text-white mb-4 " style="text-align: center">Meteo del Mundo</h2>
                <div class="mb-4">
                    <input id="ciudadInput"
                        class="w-full px-4 py-2 bg-gray-200 border border-gray-300 rounded-lg focus:outline-none focus:border-indigo-500"
                        type="text" placeholder="Ingrese una ciudad">
                </div>
                <div class="flex justify-center">
                    <button id="BtnBuscar"
                        class="px-6 py-2 bg-indigo-500 text-white rounded-lg hover:bg-indigo-600 focus:outline-none">Buscar</button>
                </div>

                <div id="weatherContainer" class="hidden mt-4">
                    <h2 id="nombreCiudad" class="text-lg font-semibold text-white mb-2"></h2>
                    <div id="detallesTiempo"></div>
                </div>
            </div>
        </div>
        <div>

            @if ($posts->count())
                <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($posts as $articulo)
                        <article @class([
                            'relative rounded-lg overflow-hidden bg-gray-100 shadow-md hover:shadow-lg',
                            'md:col-span-2' => $loop->first,
                        ])>
                            <a href="{{ route('show-post', $articulo->id) }}">
                                <img class="w-full h-72 object-cover object-center"
                                    src="{{ Storage::url($articulo->imagen) }}" alt="{{ $articulo->titulo }}">
                            </a>
                            <div class="p-4">
                                <a href="{{ route('show-post', $articulo->id) }}">
                                    <h2 class="text-xl font-semibold text-gray-800 truncate">{{ $articulo->titulo }}
                                    </h2>
                                </a>
                                <p class="text-sm text-blue-900 italic mb-2">{{ $articulo->user->name }}</p>

                                <div class="flex items-center justify-between text-sm text-gray-600">
                                    <div>
                                        <button wire:click="like({{ $articulo }})">
                                            <i @class([
                                                'fas fa-heart',
                                                'text-red-500' => in_array($articulo->id, $postslikes),
                                            ])>
                                                <span>
                                                    {{ $articulo->likes()->count() }}
                                                </span>
                                            </i>
                                        </button>
                                    </div>

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
                        class="fa-solid fa-heart-crack text-xl mr-2"></i>No
                    hay
                    ningún artículo</p>
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
                            //error
                            weatherContainer.classList.remove("hidden");
                        });
                }
            });
        });
    </script>
