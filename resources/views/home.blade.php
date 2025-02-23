<x-layout>
    <div class="welcome-container">
        <div class="welcome-content">
        <img src="img/WeBookWhite.png" alt=""
                style="width: 500px;">
            <p>Your one-stop destination for all your reading needs. Discover a wide range of books across various
                genres and add your favorites to your collection.</p>
        </div>
       <div class="welcome-image-con">
            <div id="bookCarousel" class="carousel slide welcome-image" data-bs-ride="carousel">
                <div class="carousel-inner">
                    @foreach ($books->take(3) as $index => $book)
                        <div class="carousel-item {{ $index == 0 ? 'active' : '' }}">
                            <img src="{{ Storage::url($book->cover) }}" class="d-block w-200" alt="{{ $book->tittle }}">
                        </div>
                    @endforeach
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#bookCarousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#bookCarousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </div>
    </div>
    <div class="container">

        <div class="book_container">
            <h5>Latest Book:</h5>
            <div class="book_inner_container">
                @if ($books->count(0))
                    @foreach ($books as $book)
                        <div class="book_card">
                            <a href="/book_desc/{{ $book->id }}">
                                <img src="{{ Storage::url($book->cover) }}" alt="" class="book_cover"
                                    loading="lazy">
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
                <div class="book_container @if ($genre->books->count() == 0) hide @endif">
                    <h5>{{ $genre->genre }}</h5>
                    <div class="book_inner_container">

                        @foreach ($genre->books as $book)
                            <div class="book_card">
                                <a href="/book_desc/{{ $book->id }}">
                                    <img src="{{ Storage::url($book->cover) }}" alt="" class="book_cover"
                                        loading="lazy">
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
