<x-admin.layout.layout>
    <x-slot:title>
        News
        </x-slot>

        <div class="row mb-2">
            @forelse($newsList as $key => $news)
                <div class="col-md-6">
                    <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                        <div class="col p-4 d-flex flex-column position-static">
                            {{--                        <strong class="d-inline-block mb-2 text-primary">World</strong>--}}
                            <h3 class="mb-0">{{ $news['title'] }}</h3>
                            <div class="mb-1 text-muted">{{ $news['created_at']->format('d-m-Y H:i') }} by {{ $news['author'] }}</div>
                            <p class="card-text mb-auto">{{ $news['anonce'] }}</p>
                            <a href="{{ route('news.show', ['id' => $key+1]) }}" class="stretched-link">Read news</a>
                        </div>
                        <div class="col-auto d-none d-lg-block">
                            <svg class="bd-placeholder-img" width="200" height="250" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false"><title>Placeholder</title><rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">Thumbnail</text></svg>

                        </div>
                    </div>
                </div>
            @empty
                <h2>Записей нет</h2>
            @endforelse
        </div>

</x-admin.layout.layout>
