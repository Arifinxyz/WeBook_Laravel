<!-- filepath: /D:/xampp/htdocs/WeBook_Laravel/resources/views/book/book_desc.blade.php -->
<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-6">
                <img src="{{ Storage::url($book->cover) }}" alt="Book Cover" style="width: 100%;">
            </div>
            <div class="col-6">
                <h1>{{ $book->tittle }}</h1>
                <p>Description: {{ $book->description }}</p>
            </div>
            <a href="/book_content/{{ $book->id }}">baca buku</a>
        </div>
    </div>
</x-layout>