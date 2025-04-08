<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container">
        <a class="navbar-brand" href="#">Bloco de Notas</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item">
                    <a class="nav-link" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">{{ session('user.username') }}</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link btn btn-danger text-white" href="{{ route('sair') }}">Logout</a>
                </li>
            </ul>
        </div>
    </div>
    </nav>
