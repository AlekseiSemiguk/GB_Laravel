<x-admin.layout.layout>

    <div class="offset-2 col-8">
        <br>
        <h2>Редактировать профиль пользователя</h2>

        @include('inc.message')

        <form method="post" action="{{ route('admin.users.update', ['user' => $user]) }}">
            @csrf
            @method('put')
            <div class="form-group">
                <label for="fullname">Имя</label>
                <input type="text" class="form-control" name="fullname" id="fullname" value="{{ $user->profile->fullname }}">
            </div>
            <div class="form-group">
                <label for="address">Адрес</label>
                <input type="text" class="form-control" name="address" id="address" value="{{ $user->profile->address }}">
            </div>
            <div class="form-group">
                <label for="is_admin">Администратор</label>
                <input type="checkbox" name="is_admin" id="is_admin"
                       @if($user->is_admin === true) checked @endif
                >
            </div>

            <br>
            <button class="btn btn-success" type="submit">Сохранить</button>
        </form>
    </div>

</x-admin.layout.layout>
