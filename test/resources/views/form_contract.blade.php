<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Форма контрактов') }}
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
        <form action="/contract/save" method="post">
            @csrf
            <div class="mb-3">
                <!-- <label for="user">Выберите пользователя для создания контракта</label> -->
                <br>
                <!-- <p><select size="3" multiple name="user">
                    <option disabled>Выберите пользователя</option>
                    @foreach($data as $user)
                    <option value="{{$user->id}}">{{$user->name}} ({{$user->email}})</option>
                    @endforeach
                </select></p> -->
                <!-- <input type="email" id="email" name="email" class="form-control"> -->
            </div>
            <!-- <div class="mb-3">
                <label for="number">Введите номер телефлна, чтобы добавить сим карту и привязать к контракту</label>
                <br>
                <input type="text" id="number" name="number" class="form-control">
            </div> -->
            <h3>Нажмите для добавления контракта</h3>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form> 
    </div>
</x-app-layout>

