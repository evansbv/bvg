<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($bulletine->titulo) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __($bulletine->titulo) }}
                        <ul>
                            <!-- <h1>id # : {{ $bulletine->id }}</h1> -->
                            <!-- <p>Titulo  : {{ $bulletine->titulo  }}</p> -->
                            <p>Descripcion : {{ $bulletine->descripcion }}</p>
                            <p>Año:  {{ $bulletine->ano }} Mes: {{ $bulletine->mes }}</p>
                            <p>url  : <a href=" {{ $bulletine->url }} " target="_blank" class="rounded-sm underline hover:text-black focus:outline-none focus-visible:ring-1 focus-visible:ring-[#FF2D20] dark:hover:text-white">Descargar Boletín </a></p>
                            <!-- <p>imagen  : {{ $bulletine->image}}</p> -->
                            <img src="{{ URL::asset('images')}}/{{old('imagen',$bulletine->image) }}" alt="Imagen Boletin" width="150" height="160">
                            <!-- <p>Usuario : {{ $bulletine->user_id}}</p> -->
							<br>
                            <p>
                            <a href="{{route('bulletines.index')}}">Volver a Boletines</a>
                            </p>
                        </ul>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
