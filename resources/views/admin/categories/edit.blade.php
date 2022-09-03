<x-admin.layout.layout>

    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать категорию</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.categories.update', ['category' => $category]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ $category->title }}">
            </div>

            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>


</x-admin.layout.layout>
