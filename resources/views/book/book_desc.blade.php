<!-- filepath: /D:/xampp/htdocs/WeBook_Laravel/resources/views/book/book_desc.blade.php -->
<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{ Storage::url($book->cover) }}" alt="Book Cover" style="width: 300px;">
            </div>
            <div class="col-6">
                <h1>{{ $book->tittle }}</h1>
                <p>Description: {{ $book->description }}</p>
                <p>Genre: @foreach ($book->genres as $genre)
                    {{ $genre->genre }},
                @endforeach</p>
            </div>
            <a href="/book/{{ $book->id }}/content">baca buku</a>
        </div>
    </div>
</x-layout>