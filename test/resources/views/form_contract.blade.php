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
                <label for="email">Введите email пользователя</label>
                <br>
                <input type="email" id="email" name="email" class="form-control">
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

