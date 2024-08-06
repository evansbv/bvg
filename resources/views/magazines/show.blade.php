<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($magazine->titulo) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __($magazine->titulo) }}
                        <ul>
                            <!-- <h1>id # : {{ $magazine->id }}</h1> -->
                            <!-- <p>Titulo  : {{ $magazine->titulo  }}</p> -->
                            <p>Descripcion : {{ $magazine->descripcion }}</p>
                            <p>Año:  {{ $magazine->ano }} Mes: {{ $magazine->mes }}</p>
                            <p>url  : <a href=" {{ $magazine->url }} " target="_blank" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Descargar Boletín </a></p>
                            <!-- <p>imagen  : {{ $magazine->image}}</p> -->
                            <img src="{{ URL::asset('images')}}/{{old('imagen',$magazine->image) }}" alt="Imagen Revista" width="150" height="160">
                            <!-- <p>Usuario : {{ $magazine->user_id}}</p> -->
							<br>
                            <p>
                            <a href="{{route('magazines.index')}}">Volver a Magazines</a>
                            </p>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
