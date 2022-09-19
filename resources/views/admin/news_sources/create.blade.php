<x-admin.layout.layout>

    <div class="offset-2 col-8">
        <br>
        <h2>Добавить источник новостей</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.news_sources.store') }}">
            @csrf
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <div class="form-group">
                <label for="url">URL</label>
                <textarea class="form-control" name="url" id="url">{!! old('url') !!}</textarea>
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>

</x-admin.layout.layout>
