<x-layout>
    <h1>home</h1>
    <a href="/login">Login</a>
        @if ($books)
            @foreach ( $books as $book)
                <div class="card_book">
                    <a href="/book_desc/{{ $book->id }}">
                    <img src="{{ Storage::url($book->cover) }}" alt="" style="width: 10vh;">
                    <p>{{ $book->tittle }}</p>
                    </a>
                </div>
            @endforeach
        @endif
</x-layout>