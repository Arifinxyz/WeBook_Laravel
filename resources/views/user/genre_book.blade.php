<x-layout>
    <div class="container">
        <div class="book_container">
            <div class="d-flex">
                @if (isset($genre->books) && $genre->books->count() > 0)
                    @foreach ($genre->books as $book)
                        <div class="book_card">
                            <a href="/book_desc/{{ $book->id }}">
                                <img src="{{ Storage::url($book->cover) }}" alt="" class="book_cover">
                                <div class="book_title">
                                    <p>{{ $book->tittle }}</p>
                                </div>
                            </a>
                        </div>
                    @endforeach
                @else
                    <p> Belum ada buku</p>
                @endif
            </div>
        </div>
    </div>
</x-layout>