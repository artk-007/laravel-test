<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Форма контрактов') }}
        </h2>
    </x-slot>

    <div>
        
        @foreach($data as $element)
            <div>
                <h3>{{$element->number}} {{$element->contract->user->name}} {{$element->contract->user->email}}</h3>
                <h5>
                @foreach($element->group as $group)
                {{$group->name}}
                @endforeach
                </h5>
            </div>
            <br>
        @endforeach
            
        
    </div>
</x-app-layout>

