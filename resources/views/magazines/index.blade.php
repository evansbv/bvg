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
                                    <a href="{{route('magazines.show',[$magazine->id])}}"  >{{ __('*Details*') }}</a>
                                    @if(Auth::user()->isAdmin())
                                    <a href="{{route('magazines.edit',[$magazine->id])}}"  >{{ __('*Edit*') }}</a>
                                    @endif
                                </li>
                            @endforeach
                        </ul>
                        {{ $magazines->links() }}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
