<x-layout>
    <div class="content">
        <iframe src="{{ Storage::url($book->content) }}" style="width: 100%; height: 100vh;" frameborder="0">
            This browser does not support PDFs. Please download the PDF to view it: <a href="{{ Storage::url($book->content) }}">Download PDF</a>
        </iframe>
    </div>
</x-layout>