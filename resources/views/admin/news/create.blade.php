<x-admin.layout.layout>

    <div class="offset-2 col-8">
        <br>
        <h2>Добавить новость</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.news.store') }}">
            @csrf
            <div class="form-group">
                <label for="category_id">Выбрать категорию</label>
                <select class="form-control" name="category_id" id="category_id">
                    <option value="0">Выбрать</option>
                    @foreach($categories as $category)
                        <option value="{{ $category->id }}" @if((int)old('category_id') === $category->id) selected @endif>{{ $category->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="news_source_id">Выбрать источник новости</label>
                <select class="form-control" name="news_source_id" id="news_source_id">
                    <option value="0">Выбрать</option>
                    @foreach($newsSources as $newsSource)
                        <option value="{{ $newsSource->id }}" @if((int)old('news_source_id') === $newsSource->id) selected @endif>{{ $newsSource->title }}</option>
                    @endforeach
                </select>
            </div>
            <div class="form-group">
                <label for="title">Заголовок</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title') }}">
            </div>
            <div class="form-group">
                <label for="author">Автор</label>
                <input type="text" class="form-control" name="author" id="author" value="{{ old('author') }}">
            </div>
            <div class="form-group">
                <label for="status">Статус</label>
                <select class="form-control" name="status" id="status">
                    <option @if(old('status') === 'ACTIVE') selected @endif>ACTIVE</option>
                    <option @if(old('status') === 'DRAFT') selected @endif>DRAFT</option>
                    <option @if(old('status') === 'BLOCKED') selected @endif>BLOCKED</option>
                </select>
            </div>
            <div class="form-group">
                <label for="image">Изображение</label>
                <input type="file" class="form-control" name="image" id="image">
            </div>
            <div class="form-group">
                <label for="description">Анонс</label>
                <textarea class="form-control" name="anonce" id="anonce">{!! old('anonce') !!}</textarea>
            </div>
            <div class="form-group">
                <label for="description">Описание</label>
                <textarea class="form-control" name="description" id="description">{!! old('description') !!}</textarea>
            </div>
            <div class="form-group" id="datepicker">
                <label for="date">Дата</label>
                <input type="text" class="form-control" id="date" name="date" value="{{ old('date') }}">
            </div>
            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>

    <script type="text/javascript">
        $(function() {
            $('#datepicker').datepicker({
                format: 'yyyy-mm-dd'
            });
        });
    </script>

</x-admin.layout.layout>
