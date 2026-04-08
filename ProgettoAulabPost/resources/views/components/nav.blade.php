<div class="fixed-top">
    <nav class="navbar navbar-expand-lg bg-perso position-relative border border-dark ">
        <div class="container-fluid">
            <button class="navbar-toggler btn bg-light btn-light" type="button" data-bs-toggle="collapse"
                data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <a class="text-white navbar-brand logo-nav" href="#"><img id="logo" class="d-min"
                    src="/storage/images/earth.png" alt="pianeta terra"></a>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav w-100 mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="text-white nav-link ms-3" href="{{ route('home') }}">Home</a>
                    </li>
                    <li class="nav-item dropdown me-md-auto">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            Tutti gli articoli
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="ms-2 nav-link" aria-current="page" href="{{ route('article.index') }}">Tutti gli
                                    articoli</a>
                            </li>
                            <hr class="dropdown-divider">
                            @foreach ($categories as $category)
                                <li>
                                    <a href="{{ route('article.byCategory', $category->id) }}"
                                        class="ms-2 nav-link">{{ $category->name }}</a>
                                </li>
                            @endforeach
                        </ul>
                    </li>
                    @guest
                        <a class="px-3 me-2 btn text-light btn-link" href="{{ route('login') }}">Accedi</a>
                        <a class="btn btn-light t-blue me-2 register" href="{{ route('register') }}">Registrati</a>
                    @else
                        <li class="nav-item dropdown ">
                            <a class="text-white nav-link dropdown-toggle" href="#" role="button"
                                data-bs-toggle="dropdown" aria-expanded="false">Ciao, {{ Auth::user()->name }}</a>
                            <ul class="dropdown-menu-end dropdown-menu">
                                @auth
                                    @if (Auth::user()->is_admin)
                                        <li class="dropdown-item">
                                            <a class=" nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                                        </li>
                                        <hr class="dropdown-divider">
                                    @endif
                                    @if (Auth::user()->is_revisor)
                                        <li class="dropdown-item">
                                            <a class=" nav-link" href="{{ route('revisor.dashboard') }}">Dashboard Revisore</a>
                                        </li>
                                        <hr class="dropdown-divider">
                                    @endif
                                    @if (Auth::user()->is_writer)
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="{{ route('writer.dashboard') }}">Dashboard Redattore</a>
                                        </li>
                                        <hr class="dropdown-divider">
                                    @endif
                                    @if (Auth::user()->is_writer)
                                        <li class="dropdown-item">
                                            <a class="nav-link" href="{{ route('article.create') }}">Crea articolo</a>
                                        </li>
                                        <hr class="dropdown-divider">
                                    @endif
                                @endauth
                                
                                <li class="dropdown-item">
                                    <a class=" nav-link" href="{{ route('careers') }}">Lavora con noi</a>
                                </li>
                                <hr class="dropdown-divider">
                                <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn text-danger text-center"><i
                                            class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                                </form>
                            </ul>
                        </li>
                    @endguest
                </ul>
            </div>
        </div>
    </nav>
</div>







{{-- <nav class="navbar navbar-expand-lg bg-perso fixed-top border border-dark ">
    <div class="container-fluid">

        <button class="navbar-toggler btn bg-light btn-light" type="button" data-bs-toggle="collapse"
            data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
            aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <a class="text-white navbar-brand mx-auto d-block d-md-none me-3" href="#"><img class="d-min"
                src="/storage/images/earth.png" alt="pianeta terra"></a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav w-100 mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="text-white nav-link" aria-current="page" href="{{ route('article.index') }}">Tutti gli
                        articoli</a>
                </li> 
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('careers') }}">Lavora con noi</a>
                </li>
                
                <a class="text-white navbar-brand mx-auto d-none d-md-block" href="#"><img id="logo"
                        src="/storage/images/earth.png" alt="pianeta terra"></a>
                @guest
                    <a class="px-3 me-2 btn text-light btn-link" href="{{ route('login') }}">Accedi</a>
                    <a class="btn btn-light t-blue me-2 register" href="{{ route('register') }}">Registrati</a>
                @else
                    <li class="nav-item dropdown">
                        <a class="text-white nav-link dropdown-toggle me-3" href="#" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">Ciao, {{ Auth::user()->name }}</a>
                        <ul class="dropdown-menu">
                            <li>
                                <a class="dropdown-item" href="{{ route('article.create') }}">Crea articolo</a>
                            </li>
                            <hr class="dropdown-divider">
                            <form class="dropdown-item" action="{{ route('logout') }}" method="POST">
                                @csrf
                                <button type="submit" class="btn text-danger text-center"><i class="fa-solid fa-arrow-right-from-bracket"></i> Logout</button>
                            </form>
                        </ul>
                    </li>
                @endguest
                @auth
                @if (Auth::user()->is_admin) 
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('admin.dashboard') }}">Dashboard Admin</a>
                </li>
                @endif
                @if (Auth::user()->is_revisor) 
                <li class="nav-item">
                    <a class="text-white nav-link" href="{{ route('revisor.dashboard') }}">Dashboard Revisor</a>
                </li>
                @endif
                @endauth
            </ul>
        </div>
    </div>
</nav> --}}
