<x-layout>
    <div class="container">
        <div class="book_container">
            <h5>Hasil Pencarian untuk "{{ $query }}"</h5>
            @if($books->isEmpty())
            <p>Tidak ada buku yang ditemukan.</p>
        @else
            <div class="d-flex">
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
            </div>
        @endif
        </div>
        
       
    </div>
</x-layout>