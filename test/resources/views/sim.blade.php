<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Симки') }} @if ($id_contract) привязаннык к контракту № {{$id_contract}}  @endif
        </h2>
    </x-slot>

    <div>
    @if ($data) 
        @foreach($data as $sim)
            <div>
            <h3>Симка №{{$sim->id}}</h3>
            <h3>Номер: {{$sim->number}}</h3>
            <h3>Пользователи</h3>
                
                @foreach($sim->contract->users as $user)
                    <h5>
                    {{$user->name}}  ({{$user->email}})
                    </h5>
                @endforeach
                
                <h5>
                Группы:
                @foreach($sim->groups as $group)
                {{$group->name}}
                @endforeach
                </h5>
            </div>
            <br>
        @endforeach
    @else
        <h1>Симок не найдено</h1>
    @endif  
        
    </div>
</x-app-layout>

