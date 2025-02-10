<nav class="navbar navbar-expand-lg bg-dark" {{ Request::is('login') ? 'style=display:none;' : false;}}>
  <div class="container-fluid">
    <a class="navbar-brand me-5 ms-3 mb-1" href="/"><img src="img/WeBookWhite.png" alt="" style="width: 5vw;"></a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
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
  </div>
</nav>