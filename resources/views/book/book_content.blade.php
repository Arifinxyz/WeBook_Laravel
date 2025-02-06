<x-layout>
    <div class="mainCon">
        <h4>{{ $book->tittle }}</h4>
        <div style="display:flex;
        justify-content: center;">
           <div id="pdf-container" style="display: flex
                                    flex-direction: column;
                                    flex-wrap: wrap;
                                    align-items: center;
                                    width: 60vw;"></div>
            </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.16.105/pdf.min.js"></script>
    <script>
        const url = '{{ Storage::url($pdfUrl) }}'; // URL PDF dari variabel yang diberikan oleh controller
        const pdfContainer = document.getElementById('pdf-container');
        const renderedPages = new Map();
        let lastScrollY = window.scrollY;
        let isScrollingUp = false;

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

            function handleScroll() {
                const currentScrollY = window.scrollY;
                isScrollingUp = currentScrollY < lastScrollY;
                lastScrollY = currentScrollY;

                if (isScrollingUp && currentPage > 1) {
                    currentPage--;
                    renderPage(currentPage);
                } else if (!isScrollingUp && currentPage < totalPages) {
                    currentPage++;
                    renderPage(currentPage);
                }
            }

            window.addEventListener('scroll', handleScroll);
            renderPage(currentPage);
        });
    </script>

</x-layout>