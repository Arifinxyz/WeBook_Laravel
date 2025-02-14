<!-- filepath: /D:/xampp/htdocs/WeBook_Laravel/resources/views/book/book_desc.blade.php -->
<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{ Storage::url($book->cover) }}" alt="Book Cover" style="width: 300px;">
            </div>
            @if (!$exist)
                <form action="{{ route('favorit.add') }}" method="post">
                    @csrf
                    <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                    <input type="hidden" name="book_id" value="{{ $book->id }}">

                    <button type="submit">Tambah Favorit</button>
                </form>
                @else
                <form action="{{ route('favorit.delete', ['book_id' => $book->id]) }}" method="post">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Hapus Favorit</button>
                </form>
            @endif

            <div class="col-6">
                <h1>{{ $book->tittle }}</h1>
                <p>Description: {{ $book->description }}</p>
                <p>Genre: @foreach ($book->genres as $genre)
                        {{ $genre->genre }},
                    @endforeach
                </p>
            </div>
            <a href="/book/{{ $book->id }}/content">baca buku</a>
        </div>
    </div>
</x-layout>
