<x-layout>
    <div class="container">
    <a href="/login">Login</a>

    <div class="book_container">
        <h5>Latest Book:</h5>
        @if (!isset($books))
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
        @else
        <p> Belum ada buku</p>
        @endif
    </div>
    </div>
</x-layout>