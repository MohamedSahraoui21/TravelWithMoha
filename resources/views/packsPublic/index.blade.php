<x-app-layout>
    <x-carpetaPrinc.principal>


        <br><br>
        <h1 class="text-3xl font-italic text-center text-gray-800 mb-8">
            Tu próxima gran aventura te espera con <span class="text-blue-500">TravelWithMoha.com</span>
        </h1>
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
                            <a href="{{ route('show-pack', $item->id) }}" class="text-blue-500 hover:underline mr-2">Ver
                                Detalles</a>

                        </div>
                        <form action="/session" method="POST" style="text-align: center;">

                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type='hidden' name="total" value="{{ $item->precio }}">
                            <input type='hidden' name="productname" value="{{ $item->nombre }}">
                            <br>
                            <button class="btn btn-primary btn-lg" type="submit" id="checkout-live-button"
                                style="background-color: #4CAF50; border: none; color: white; padding: 15px 32px; text-align: center; text-decoration: none; display: inline-block; font-size: 16px; margin: 4px 2px; cursor: pointer; border-radius: 8px; box-shadow: 0 4px 8px rgba(0,0,0,0.2);
                            @if ($item->disponible == 'NO') opacity: 0.5;
                                cursor: not-allowed; @endif
                            "
                                onmouseover="this.style.boxShadow='0 0 20px rgba(76, 175, 80, 0.8)'"
                                onmouseout="this.style.boxShadow='0 4px 8px rgba(0,0,0,0.2)'"
                                @if ($item->disponible == 'NO') disabled @endif <i class="fa fa-shopping-cart"></i>

                                Comprar Ahora
                            </button>
                        </form>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="mt-6">
            {{ $packs->links() }}
        </div>

    </x-carpetaPrinc.principal>
</x-app-layout>
