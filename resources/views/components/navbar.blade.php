<nav class="navbar navbar-expand-lg bg-custom" {{ Request::is('login') ? 'style=display:none;' : false }}
    {{ Request::is('register') ? 'style=display:none;' : false }}>
    <div class="container-fluid">
        <a class="navbar-brand me-5 ms-3 mb-1" href="/"><img src="img/WeBookWhite.png" alt=""
                style="width: 5vw;"></a>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active text-light" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link text-light" href="#">Pricing</a>
                </li>
            </ul>
        </div>
        <div class="btn-group">
            <a class="profile_button" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="/img/profile.png" alt="">
            </a>

            <ul class="dropdown-menu dropdown-menu-end pd-2">
                
                <hr>
                <a href="" class="dropdown-item">History</a>
                <a href="" class="dropdown-item">Favorite</a>
                <hr>
                <a href="/profile" class="dropdown-item">Profile</a>
                <a href="/logout" class="dropdown-item">Logout</a>
            </ul>
        </div>
</nav>
