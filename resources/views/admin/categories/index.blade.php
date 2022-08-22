<x-admin.layout.layout>
    <x-slot:title>
        Categories
        </x-slot>
        <div class="album py-5 bg-light">
            <div class="container">
                <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 g-3">
                    @forelse($categoryList as $category)
                        <div class="col">
                            <div class="card shadow-sm">
                                <svg class="bd-placeholder-img card-img-top" width="100%" height="75" xmlns="http://www.w3.org/2000/svg" role="img" aria-label="Placeholder: Thumbnail" preserveAspectRatio="xMidYMid slice" focusable="false">
                                    <title>{{ $category['name'] }}</title>
                                    <rect width="100%" height="100%" fill="#55595c"/>
                                    <text x="50%" y="50%" fill="#eceeef" dy=".3em">{{ $category['name'] }}</text>
                                </svg>
                                <a href="{{ route('news.index', ['category_id' => $category['id']]) }}" class="btn btn-sm btn-outline-secondary">Смотреть подробнее</a>

                            </div>
                        </div>

                    @empty
                        <h2>Записей нет</h2>
                    @endforelse
                </div>
            </div>
        </div>

</x-admin.layout.layout>
