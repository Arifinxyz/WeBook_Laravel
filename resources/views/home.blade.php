<x-layout>
    <h1>home</h1>
    <div class="book_container">
    <a href="/login">Login</a>
        @if ($books)
            @foreach ( $books as $book)
                <div class="book_card">
                    <a href="/book_desc/{{ $book->id }}">
                    <img src="{{ Storage::url($book->cover) }}" alt="" class="book_cover">
                    <p>{{ $book->tittle }}</p>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>