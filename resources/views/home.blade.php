<x-layout>
    <a href="/login">Login</a>

    <div class="book_container">
        @if ($books)
            @foreach ( $books as $book)
                <div class="book_card">
                    <a href="/book_desc/{{ $book->id }}">
                    <img src="{{ Storage::url($book->cover) }}" alt="" class="book_cover">
                    <div class="book_title">
                    <p>{{ $book->tittle }}</p>
                     </div>
                    </a>
                </div>
            @endforeach
        @endif
    </div>
</x-layout>