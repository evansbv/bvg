<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __($title) }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                <div class="btn-title">{{ __($title) }}</div>
                    @if($errors->any())
                    <div class="alert-danger"></div>
                            @foreach($errors->all() as $e)
                                    <div class="error ">
                                    <a1>{{$e}}</a1>
                                    </div>
                            @endforeach
                    </div>
                    @endif
                    <br>
                    <form action="{{route('bulletines.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>{{ __('Año') }} </label>
                        <input type="text" class="form-control" name="ano" value="{{ old('ano') }}" placeholder="2024">

                        <label>{{ __('Mes') }}</label>
                        <input type="text" class="form-control" name="mes" value="{{ old('mes') }}" placeholder="01">

                        <label>{{ __('Título') }} </label>
                        <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" placeholder="Boletin 1">

                        <label>{{ __('Descripción') }}</label>
                        <!-- <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripciones"> -->
                        <textarea rows="4" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripciones">
                        {{ old('descripcion') }}
                        </textarea>

                        <label>{{ __('URL') }} </label>
                        <input type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="https://www.fegasacruz.org/files/">

                        <label>{{ __('Imagen') }} </label>
                        <input type="file" class="form-control" name="image" value="{{ old('image') }}">

                       <button class="btn btn-success mt-3" type="submit">{{ __('Registrar Boletin') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>