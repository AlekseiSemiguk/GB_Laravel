<x-layout.layout>
    <x-slot:title>
        Contacts
        </x-slot>

        <div class="offset-2 col-8">
            <br>
            <h2>Обратная связь</h2>

            @include('inc.message')

            <form method="post" action="{{ route('feedback_form') }}">
                @csrf
                <div class="form-group">
                    <label for="name">Ваше имя</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                </div>
                <div class="form-group">
                    <label for="description">Ваши комментарии</label>
                    <textarea class="form-control" name="comments" id="comments">{!! old('comments') !!}</textarea>
                </div><br>
                <button class="btn btn-success" type="submit">Отправить</button>
            </form>
        </div>

</x-layout.layout>
