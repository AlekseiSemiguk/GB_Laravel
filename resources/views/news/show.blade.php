<x-layout>
    <x-slot:title>
        News
    </x-slot>

        <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                <div class="col">
                    <div class="card shadow-sm">
                        <svg class="bd-placeholder-img card-img-top" width="100%" height="225" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                            <title>{{ $news['title'] }}</title>
                            <rect width="100%" height="100%" fill="#55595c"/><text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $news['title'] }}</text></svg>

                        <div class="card-body" fill="#55595c">
                            <p class="card-text">{!! $news['description']  !!}</p>
                            <div class="d-flex justify-content-between align-items-center">
                                <small class="text-muted">{{ $news['author'] }} - {{ $news['created_at']->format('d-m-Y H:i') }}</small>
                            </div>
                        </div>
                    </div>
                </div>
        </div>

</x-layout>
