<x-layout.layout>
    <x-slot:title>
        Contacts
        </x-slot>

        <div class="offset-2 col-8">
            <br>
            <h2>Обратная связь</h2>

            @if($errors->any())
                @foreach($errors->all() as $error)
                    <x-forms.alert type="danger" :message="$error" class="alert-dismissible fade show"/>
                @endforeach
            @endif

            <form method="post" action="{{ route('order_form') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="phone">Ваш телефон</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{ old('phone') }}">
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="email" class="form-control" name="email" id="email" value="{{ old('email') }}">
                </div>
                <div class="form-group">
                    <label for="url">Url-адрес</label>
                    <input type="text" class="form-control" name="url" id="url" value="{{ old('url') }}">
                </div>
                <div class="form-group">
                    <label for="data">Данные</label>
                    <textarea class="form-control" name="data" id="data">{!! old('data') !!}</textarea>
                </div><br>
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
        </div>

</x-layout.layout>
