<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Register Magazine') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    {{ __('Register Magazine') }}
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
                    <form action="{{route('magazines.store')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <label>{{ __('Año') }} </label>
                        <input type="text" class="form-control" name="ano" value="{{ old('ano') }}" placeholder="2024"><br>

                        <label>{{ __('Mes') }}</label>
                        <input type="text" class="form-control" name="mes" value="{{ old('mes') }}" placeholder="01"><br>

                        <label>{{ __('Título') }} </label>
                        <input type="text" class="form-control" name="titulo" value="{{ old('titulo') }}" placeholder="Revista 1"><br>

                        <label>{{ __('Descripción') }}</label>
                        <!-- <input type="text" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripciones"> -->
                        <textarea rows="4" class="form-control" name="descripcion" value="{{ old('descripcion') }}" placeholder="Descripciones">
                        {{ old('descripcion') }}
                        </textarea><br>
                        <br>

                        <label>{{ __('URL') }} </label>
                        <input type="text" class="form-control" name="url" value="{{ old('url') }}" placeholder="https://www.fegasacruz.org"><br>

                        <label>{{ __('Imagen') }} </label>
                        <input type="file" class="form-control" name="image" value="{{ old('image') }}"><br>

                       <button class="btn btn-success mt-3" type="submit">{{ __('Register Magazine') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>