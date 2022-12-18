<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Форма добавления сим-карты') }}
        </h2>
    </x-slot>

    <div>
        @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $err)
                    <li>{{$err}}</li>
                @endforeach
            </ul>
        @endif
        <form action="/sim/save" method="post">
            @csrf
            <div class="mb-3">
                <label for="contract">Выберите Контракт для создания симкарты</label>
                <br>
                <p><select size="3" multiple name="contract">
                    <option disabled>Выберите контракт</option>
                    @foreach($data as $contract)
                    <option value="{{$contract->id}}">№ {{$contract->id}}</option>
                    @endforeach
                </select></p>
                <!-- <input type="email" id="email" name="email" class="form-control"> -->
            </div>
            <div class="mb-3">
                <label for="number">Введите номер телефлна, чтобы добавить сим карту и привязать к контракту</label>
                <br>
                <input type="text" id="number" name="number" class="form-control">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
    </div>
</x-app-layout>

