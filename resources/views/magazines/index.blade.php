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
                    {{ __($title) }}
                        @if(Auth::user()->isAdmin())
                        <p>
                          <a href="{{route('magazines.create')}}" >{{ __('*New*') }}</a>
                        </p>
                        @endif
                        <ul>
                            @foreach ($magazines as $magazine)
                                <li>{{ $magazine->ano }}  {{ $magazine->mes}}  {{ $magazine->titulo}}
                                @if(!$magazine->trashed())
                                    <a href="{{route('magazines.show',[$magazine->id])}}"  >{{ __('*Details*') }}</a>
                                @endif
                                @if(Auth::user()->isAdmin())
                                    @if(!$magazine->trashed())    
                                       <a href="{{route('magazines.edit',[$magazine->id])}}"  >{{ __('*Edit*') }}</a>
                                       form action="{{  route('magazines.destroy',[$magazine->id]) }} " method="post">
                                            {{ csrf_field() }}
            				                {{ method_field('DELETE') }}
                                            <button type="submit" >Borrar</button>
                                       </form>
                                       @else
                                          <form action="{{  route('magazines.restore',[$magazine->id]) }} " method="post">
                                               {{ csrf_field() }}
                                               <button type="submit" >Restaurar</button>
                                          </form>
                                       @endif
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        {{$magazines->links()}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
