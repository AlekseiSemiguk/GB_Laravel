<x-admin.layout.layout>
    <x-slot:title>
        Categories
        </x-slot>

        <a href="{{ route('admin.news_sources.create') }}" style="float:left;" class="btn btn-primary">Добавить источник новостей</a>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @forelse($newsSources as $newsSource)
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="75" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>{{ $newsSource->title }}</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $newsSource->title }}</text>
                                </svg>
                                <a href="{{ route('admin.news_sources.edit', ['news_source' => $newsSource]) }}">Edit news source</a>
                                <button class="deleteRecord" data-id="{{ $newsSource->id }}" >Delete news source</button>
                            </div>
                        </div>

                    @empty
                        <h2>Записей нет</h2>
                    @endforelse
                </div>
            </div>
        </div>

        <script>
            $(".deleteRecord").click(function(){
                var id = $(this).data("id");
                var token = $("meta[name='csrf-token']").attr("content");

                $.ajax(
                    {
                        url: "{{ route('admin.news_sources.index') }}/"+id,
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
