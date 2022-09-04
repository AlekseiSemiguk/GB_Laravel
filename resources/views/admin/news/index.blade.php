<x-admin.layout.layout>
    <x-slot:title>
        News
        </x-slot>

        <a href="{{ route('admin.news.create') }}" style="float:left;" class="btn btn-primary">Добавить новость</a>
        <div class="row mb-2">
            @forelse($newsList as $key => $news)
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            {{--                        <strong class="d-inline-block mb-2 text-primary">World</strong>--}}
                            <h3 class="mb-0">{{ $news->title }}</h3>
                            <div class="mb-1 text-muted">{{ $news->date->format('Y-m-d') }} by {{ $news->author }}</div>
                            <p class="card-text mb-auto">{{ $news->anonce }}</p>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                <title>Placeholder</title>
                                <rect width="100%" height="100%" fill="#55595c"/>
                                <image x="0" y="0" height="100%" xlink:href={{ $news->image }}">
                                <text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text>
                            </svg>
                        </div>
                        <a href="{{ route('admin.news.edit', ['news' => $news]) }}">Edit news</a>
                        <button class="deleteRecord" data-id="{{ $news->id }}" >Delete news</button>
                    </div>
                </div>
            @empty
                <h2>Записей нет</h2>
            @endforelse
        </div>

        <script>
            $(".deleteRecord").click(function(){
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax(
                    {
                        url: "{{ route('admin.news.index') }}/"+id,
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
