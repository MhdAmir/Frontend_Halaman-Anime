<nav class="navbar navbar-expand-lg bg-transparent shadow-sm sticky-top" data-bs-theme="light">
    <div class="container">
        <a class="navbar-brand text-uppercase fs-4 fw-semibold d-flex align-items-center" href="/">
            {{-- <img src="/img/ym-icon.png" alt="Logo" width="40" height="40" class="d-inline-block align-text-top" /> --}}
            Hal-Anime
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
            aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/') ? 'active' : '' }}" href="/">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('/post') ? 'active' : '' }}" href="/post">Posts</a>
                </li>
            </ul>
            <ul class="navbar-nav ms-auto align-items-center gap-3">
                @if(isset($answer))
                    @if($answer !== null)

                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown"
                            aria-expanded="false">
                            {{ $answer['username'] }}
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="/dashboard"><i class="bi bi-layout-text-sidebar-reverse"></i>
                                    MyDashboard</a></li>
                            <li>
                                <hr class="dropdown-devider">
                            </li>
                            <li>
                                <form action="/logout" method="post">
                                    @csrf
                                    <button class="dropdown-item" type="submit"><i class="bi bi-box-arrow-right"></i> Log
                                        out</button>
                                </form>
                            </li>
                        </ul>
                    </li>
                    @endif
                @else
                    <li class="nav-item">
                        <a href="/login" class="nan-link text-dark fw-semibold">Sign in</a>
                    </li>
                    <li class="nav-item">
                        <button type="button" class="btn btn-dark">
                            <a href="/register" class="nan-link text-light fw-semibold">Sign up</a>
                        </button>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
