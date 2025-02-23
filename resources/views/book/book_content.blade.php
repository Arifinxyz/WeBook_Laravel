<!-- filepath: /d:/xampp/htdocs/WeBook_Laravel/resources/views/book/book_content.blade.php -->
<x-layout>
    <div class="mainCon">
        <div class="container book_container">
        <h4>{{ $book->tittle }}</h4>
        <p>{!! $book->description !!}</p>
        </div>
        <div class="container book_container p-3 d-flex align-items-center">
            <a href="/book_desc/{{ $book->id }}" class="btn btn-primary me-2">Back</a>
            @if (auth()->id())
                        @if (!$exist)
                            <form action="{{ route('favorit.add') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ auth()->id() }}">
                                <input type="hidden" name="book_id" value="{{ $book->id }}">

                                <button type="submit" class="btn btn-success"><i class="fa-regular fa-bookmark"></i> Add To Favorite</button>
                            </form>
                        @else
                            <form action="{{ route('favorit.delete', ['book_id' => $book->id]) }}" method="post">
                                @csrf
                                @method('DELETE')
                                <button type="submit"  class="btn btn-success"><i class="fa-solid fa-bookmark"></i> Remove From Favorite</button>
                            </form>
                        @endif
                    @endif
        </div>
        <div style="display:flex; justify-content: center;">
            <div id="pdf-container" style="display: flex; flex-direction: column; flex-wrap: wrap; align-items: center; width: 45vw;"></div>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script>
        const url = '{{ Storage::url($pdfUrl) }}'; // URL PDF dari variabel yang diberikan oleh controller
        const pdfContainer = document.getElementById('pdf-container');
        const renderedPages = new Map();
        let lastScrollY = window.scrollY;
        let isScrollingUp = false;
        const bufferPages = 2; // Jumlah halaman buffer di sekitar halaman yang terlihat

        pdfjsLib.GlobalWorkerOptions.workerSrc = 'https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.worker.min.js';

        pdfjsLib.getDocument(url).promise.then(pdf => {
            const totalPages = pdf.numPages;
            let currentPage = 1;

            function renderPage(pageNum) {
                if (renderedPages.has(pageNum)) {
                    const cachedCanvas = renderedPages.get(pageNum);
                    if (!document.body.contains(cachedCanvas)) {
                        pdfContainer.appendChild(cachedCanvas);
                    }
                    cachedCanvas.style.display = 'block';
                    return;
                }

                pdf.getPage(pageNum).then(page => {
                    const viewport = page.getViewport({ scale: 1 });
                    const scale = pdfContainer.clientWidth / viewport.width;
                    const scaledViewport = page.getViewport({ scale: scale });

                    const canvas = document.createElement('canvas');
                    canvas.className = 'pdf-page';
                    const context = canvas.getContext('2d');
                    canvas.height = scaledViewport.height;
                    canvas.width = scaledViewport.width;

                    page.render({
                        canvasContext: context,
                        viewport: scaledViewport
                    }).promise.then(() => {
                        renderedPages.set(pageNum, canvas);
                    });

                    pdfContainer.appendChild(canvas);
                });
            }

            function renderVisiblePages() {
                const currentScrollY = window.scrollY;
                isScrollingUp = currentScrollY < lastScrollY;
                lastScrollY = currentScrollY;

                const visiblePages = [];
                for (let i = currentPage - bufferPages; i <= currentPage + bufferPages; i++) {
                    if (i > 0 && i <= totalPages) {
                        visiblePages.push(i);
                    }
                }

                visiblePages.forEach(pageNum => renderPage(pageNum));
            }

            function handleScroll() {
                const currentScrollY = window.scrollY;
                isScrollingUp = currentScrollY < lastScrollY;
                lastScrollY = currentScrollY;

                const pageHeight = document.querySelector('.pdf-page').clientHeight;
                const scrollPosition = window.scrollY + window.innerHeight / 2;
                const newPage = Math.floor(scrollPosition / pageHeight) + 1;

                if (newPage !== currentPage) {
                    currentPage = newPage;
                    renderVisiblePages();
                }
            }

            window.addEventListener('scroll', handleScroll);
            renderVisiblePages();
        });
    </script>
</x-layout>