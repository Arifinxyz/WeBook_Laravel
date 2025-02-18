<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h1>Profile</h1>
                <div class="profile_pic_container">
                    <img src="{{ Auth::user()->profile_pic ? Storage::url('img/user_profile/' . Auth::user()->profile_pic) : asset('img/profile.png') }}" alt="" class="profile_pic">
                    <button type="button" onclick="document.getElementById('upload_profile_pic').click()">Edit</button>
                    <input type="file" id="upload_profile_pic" accept="image/*" style="display: none;">
                    
                </div>
                @if (Auth::check())
                    <h5>Username: {{ Auth::user()->name }}</h5>
                    <h5>Email: {{ Auth::user()->email }}</h5>
                @endif
            </div>
        </div>
    </div>
<div class="favorit_container">

    @if ($dataFavorit)
        @foreach ($dataFavorit as $book)
        <div class="book_card">
            <a href="/book_desc/{{ $book->book_id }}">
                <img src="{{ Storage::url($book->book->cover) }}" alt="" class="book_cover">
                <div class="book_title">
                    <p>{{ $book->book->tittle }}</p>
                </div>
            </a>
        </div>
        @endforeach
    @endif
</div>

    <!-- Modal Cropper -->
<div class="modal fade" id="cropModal" tabindex="-1" aria-labelledby="cropModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="cropModalLabel">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img id="cropImage" src="">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="cropSave">Save</button>
            </div>
        </div>
    </div>
</div>

    <script>
        let cropper;
        let image = document.getElementById('cropImage');
    
        document.getElementById('upload_profile_pic').addEventListener('change', function(event) {
            let files = event.target.files;
            if (files && files.length > 0) {
                let reader = new FileReader();
                reader.onload = function(event) {
                    image.src = event.target.result;
                    let cropModal = new bootstrap.Modal(document.getElementById('cropModal'));
                    cropModal.show();
    
                    if (cropper) {
                        cropper.destroy();
                    }
                    cropper = new Cropper(image, {
                        aspectRatio: 1, // Memastikan gambar dipotong 1:1
                        viewMode: 2,
                    });
                };
                reader.readAsDataURL(files[0]);
            }
        });
    
        document.getElementById('cropSave').addEventListener('click', function() {
            let canvas = cropper.getCroppedCanvas();
            canvas.toBlob(function(blob) {
                let formData = new FormData();
                formData.append('profile_pic', blob, 'profile.jpg');
    
                fetch("{{ route('profile.update') }}", {
                    method: "POST",
                    body: formData,
                    headers: {
                        "X-CSRF-TOKEN": document.querySelector('meta[name="csrf-token"]').getAttribute('content')
                    }
                }).then(response => response.json()).then(data => {
                    location.reload(); // Refresh untuk menampilkan gambar terbaru
                }).catch(error => console.error(error));
            });
        });
    </script>
    
</x-layout>
