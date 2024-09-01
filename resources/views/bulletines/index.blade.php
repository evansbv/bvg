
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
                        @if(Auth::user()->isAdmin())
                        <p>
                          <a class="btn btn-primary" href="{{route('bulletines.create')}}" >{{ __('Nuevo') }}</a>
                        </p>
                        @endif
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>AÑO-MES</th>
                                    <th>DESCRIPCION</th>
                                    <th>ACCIONES</th>
                                </tr>
                            </thead> 
                            <tbody>   
                            @foreach ($bulletines as $bulletine)
                            <tr>
                                <td>
                                {{ $bulletine->ano }} - {{ $bulletine->mes}}
                                </td>
                                <td>
                                  {{ $bulletine->titulo}}
                                </td>
                                <td>
                                @if(!$bulletine->trashed())
                                    <a class="btn btn-success" href="{{route('bulletines.show',[$bulletine->id])}}"  >{{ __('Detalles') }}</a>
                                @endif
                                @if(Auth::user()->isAdmin())
                                    @if(!$bulletine->trashed())    
                                       <a class="btn btn-warning" href="{{route('bulletines.edit',[$bulletine->id])}}"  >{{ __('Editar') }}</a>
                                       <form class="btn btn-danger" action="{{  route('bulletines.destroy',[$bulletine->id]) }} " method="post">
                                            {{ csrf_field() }}
            				                {{ method_field('DELETE') }}
                                            <button type="submit" >Borrar</button>
                                       </form>
                                       @else
                                          <form  action="{{  route('bulletines.restore',[$bulletine->id]) }} " method="post">
                                               {{ csrf_field() }}
                                               <button class="btn btn-danger" type="submit" >Restaurar</button>
                                          </form>
                                       @endif
                                    @endif
                                </td>
                            </tr>
                            @endforeach
                            </tbody>
                        </table>
                        {{$bulletines->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
