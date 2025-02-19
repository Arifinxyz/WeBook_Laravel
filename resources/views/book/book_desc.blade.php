<!-- filepath: /D:/xampp/htdocs/WeBook_Laravel/resources/views/book/book_desc.blade.php -->
<x-layout>
    <div class="container">
        <div class="book_container p-3">
            <div class="book_desc_container">
                <div class="book_desc">
                    <img src="{{ Storage::url($book->cover) }}" alt="Book Cover" style="width: 300px;">
                    <div class="d-flex mt-2">
                    <a href="/book/{{ $book->id }}/content" class="btn btn-primary me-2">baca buku</a>


                    @if (auth()->id())

                        @if (!$exist)
                            <form action="{{ route('favorit.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                <button type="submit" class="btn btn-success"><i class="fa-regular fa-bookmark"></i></button>
                            </form>
                        @else
                            <form action="{{ route('favorit.delete', ['book_id' => $book->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-success"><i class="fa-solid fa-bookmark"></i></button>
                            </form>
                        @endif
                    @else
                        <a href="/login"  class="btn btn-success">Login untuk menambahkan ke favorit</a>
                    @endif
                </div>
                </div>

                <div class="book_desc ms-3">
                    <h3>{{ $book->tittle }}</h3>
                    <p class="text-muted">{!! $book->description !!}</p>


                </div>

            </div>
        </div>

        <div class="book_container p-3">
            <h5>Detail Book</h5>
            <hr>
                <table class="table table-striped">
                    <tr>
                        <th>Title</th>
                        <td>{{ $book->tittle }}</td>
                    </tr>
                    <tr>
                        <th>Author</th>
                        <td>{{ $book->author }}</td>
                    </tr>
                    <tr>
                        <th>Release Date</th>
                        <td>{{ $book->realese_date ? $book->realese_date : 'Unknown Realese Date '}}</td>
                    </tr>
              
                    <tr>
                        <th>Genre</th>
                        <td>
                            @foreach ($book->genres as $genre)
                                {{ $genre->genre }}{{ !$loop->last ? ', ' : '.' }}
                            @endforeach
                        </td>
                    </tr>
                 
                    <tr>
                        <th>Publisher</th>
                        <td></td>
                    </tr>
                </table>
            </div>
            <div class="book_container p-3">
                <h5>Other Books</h5>
                <div class="book_inner_container">
                    @if (isset($listbook))
                        @foreach ($listbook as $book)
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
    </div>

 
</x-layout>
