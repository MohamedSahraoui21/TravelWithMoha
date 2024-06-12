<x-app-layout>
    <x-carpetaPrinc.principal>
        <div
            class="w-3/4 mx-auto bg-white border border-gray-200 rounded-lg shadow dark:bg-gray-800 dark:border-gray-700">
            <img class="w-full bg-center bg-cover" src="{{ Storage::url($pack->imagen) }}" alt="" />
            <div class="p-5">
                <h5 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 dark:text-white">{{ $pack->nombre }}
                </h5>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400">{!! nl2br(e($pack->descripcion)) !!}</p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-bold">Precio
                        :</span>
                    {{ $pack->precio }}€
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-bold">Disponible :</span>
                    <span @class([
                        'text-red-500' => $pack->disponible == 'NO',
                        'text-green-500' => $pack->disponible == 'SI',
                    ])> {{ $pack->disponible }} </span>
                </p>

                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-bold">Fecha de creacion
                        :</span>
                    {{ $pack->created_at->format('d/m/Y, h:i:s') }}
                </p>
                <p class="mb-3 font-normal text-gray-700 dark:text-gray-400"><span class="font-bold">fecha de
                        actualizacion
                        :</span>
                    {{ $pack->updated_at->format('d/m/Y, h:i:s') }}
                </p>
                <div class="flex mt-2 flex-row-reverse my-2">
                    <a href="{{ route('home') }}">
                        <x-button>Volver</x-button>
                    </a>
                </div>


            </div>
        </div>


    </x-carpetaPrinc.principal>
</x-app-layout>
