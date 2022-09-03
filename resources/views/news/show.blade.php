<x-layout.layout>
    <x-slot:title>
        {{ $news->title }}
    </x-slot>

        <article class="blog-post">
            <h2 class="blog-post-title mb-1">{{ $news->title }}</h2>
            <p class="blog-post-meta">{{ $news->date }} by {{ $news->author }}</a>
            </p>
            <blockquote class="blockquote">
                <p>{{ $news->anonce }}</p>
            </blockquote>
            <p>
                {!! $news->description  !!}
            </p>
        </article>

</x-layout.layout>
