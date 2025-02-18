<x-layout>
    <div class="container">
    <div class="book_container">
    <h5>favorite</h5>

        @foreach ($dataFavorit as $datafavorite)
            <div class="book_card">
                <a href="/book_desc/{{ $datafavorite->book->id }}">
                    <img src="{{ Storage::url($datafavorite->book->cover) }}" alt="" class="book_cover">
                    <div class="book_title">
                        <p>{{ $datafavorite->book->tittle }}</p>
                    </div>
                </a>
            </div>
        @endforeach
    </div>
</div>
</x-layout>