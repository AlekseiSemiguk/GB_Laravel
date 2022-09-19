<x-admin.layout.layout>
    <x-slot:title>
        Profiles
        </x-slot>

        <div class="table-responsive">
            <table class="table table-striped table-sm">
                <thead>
                <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Логин</th>
                    <th scope="col">Email</th>
                    <th scope="col">Дата регистрации</th>
                    <th scope="col">Управление</th>
                </tr>
                </thead>
                <tbody>
                @forelse($userList as $user)
                    <tr>
                        <td>{{ $user->id }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->created_at->format('d-m-Y H:i') }}</td>
                        <td><a href="{{ route('admin.users.edit', ['user' => $user]) }}">Ред.</a> &nbsp;
                            <a href="javascript:;" class="deleteRecord" data-id="{{ $user->id }}" style="color: red;">Уд.</a></td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6">Записе не найдено</td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        <script>
            $(".deleteRecord").click(function(){
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax(
                    {
                        url: "{{ route('admin.users.index') }}/"+id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": token,
                        },
                        success: function (){
                            location.reload();
                        }
                    });

            });
        </script>

</x-admin.layout.layout>
