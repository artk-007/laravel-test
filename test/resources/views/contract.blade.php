<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Форма контрактов') }}
        </h2>
    </x-slot>

    <div>
        
        @foreach($data as $contract)
            <div>
            <h3>Контракт №{{$contract->id}}</h3>
            <h3>Пользователи</h3>
                
                @foreach($contract->users as $user)
                    <h5>
                    {{$user->name}}  ({{$user->email}})
                    </h5>
                @endforeach
            </div>
            <h3>id's симки</h3>
            <h5>
            @foreach($contract->sims as $sim)
                    {{$sim->id}} /
                @endforeach
            </h5>
            <br>
        @endforeach
            
        
    </div>
</x-app-layout>

