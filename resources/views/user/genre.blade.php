<x-layout>
    <div class="container">
        <div class="book_container">
            <h5>Genre List:</h5>
            <hr>
            <ol class="list-group list-group-numbered">
                @if ($genreList)
                    @foreach ($genreList as $genre)
                        <a href="/genre/{{ $genre->id }}" class="list-group-item list-group-item-action d-flex justify-content-between align-items-start">
                            <div class="ms-2 me-auto">
                                <div class="fw-bold">{{ $genre->genre }}</div>
                            </div>
                            <span class="badge text-bg-primary rounded-pill">{{ $genre->books->count() }}</span>
                        </a >
                    @endforeach
                @endif
            </ol>
        </div>
    </div>
</x-layout>