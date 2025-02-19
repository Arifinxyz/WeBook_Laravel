<x-layout>
    <div class="container">
         
        <div class="book_container">
            <h5>Latest Book:</h5>
            <div class="book_inner_container">
                @if (isset($books))
                    @foreach ($books as $book)
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
        @if ($genres->count() > 0)
        @foreach ($genres as $genre)
            <div class="book_container @if($genre->books->count() == 0) hide @endif">
                <h5>{{ $genre->genre }}</h5>
            <div class="book_inner_container">

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
            </div>
        </div>

        @endforeach
    @endif
    </div>
</x-layout>
