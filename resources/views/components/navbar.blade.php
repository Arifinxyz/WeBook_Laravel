<nav class="navbar navbar-expand-lg bg-custom" {{ Request::is('login') ? 'style=display:none;' : false }}
    {{ Request::is('register') ? 'style=display:none;' : false }}>
    <div class="container-fluid">
        <a class="navbar-brand me-5 ms-3 mb-1" href="/"><img src="img/WeBookWhite.png" alt=""
                style="width: 5em;"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/book">Book</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="/genre">Genre</a>
                </li>
            </ul>
        </div>
        <form class="d-flex ms-auto " action="{{ route('book.search') }}" method="GET">
            <input class="form-control me-2 bg-transparent text-light" type="search" name="query" placeholder="Search Book.." aria-label="Search">
            <button class="btn btn-outline-light me-2" type="submit">Search</button>
        </form>
        <div class="btn-group">
            <a class="profile_button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                @if (auth()->id())
                <img src="{{ Auth::user()->profile_pic ? Storage::url('/img/user_profile/' . Auth::user()->profile_pic) : '/img/profile.png' }}" alt="">

                @else
                    <img src="/img/profile.png" alt="">
                @endif

            </a>

            <ul class="user_menu dropdown-menu dropdown-menu-end">
                @if (auth()->id())

                <a href="/profile" class="dropdown-item">
                    <h5>{{ Auth::user()->email }}</h5>
                    <p>Lihat Selengkapnya</p>
                   
                  
                </a>
                
                <hr>
                <a href="" class="dropdown-item"><i class="fa-solid fa-clock-rotate-left me-2"></i>History</a>
                <a href="/favorite" class="dropdown-item"><i class="fa-solid fa-bookmark me-2"></i>Favorite</a>
                <hr>
                <a href="/logout" class="dropdown-item"><i class="fa-solid fa-share-from-square me-2"></i>Logout</a>
                @else
                <a href="/login" class="btn btn-primary dropdown-item"><i class="fa-solid fa-right-to-bracket me-2"></i>Login</a>
                @endif
            </ul>
        </div>
</nav>
<style>
    .user_menu
    {
        justify-content: center;
        align-items: center;
    }
</style>