<x-admin.layout.layout>

    <div class="offset-2 col-8">
        <br>
        <h2>Добавить категорию</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.categories.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>

</x-admin.layout.layout>
