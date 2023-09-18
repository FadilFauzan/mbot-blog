<nav class="navbar navbar-expand-md bg-dark" data-bs-theme="dark">
    <div class="container">
        <a class="navbar-brand" href="/">MBOT</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "home") ? 'active' : '' }} text-center" 
                    aria-current="page" href="{{ route('home') }}">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "about") ? 'active' : '' }} text-center" 
                    href="{{ route('about') }}">About</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "posts") ? 'active' : '' }} text-center" 
                    href="{{ route('blog') }}">Blog</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{ ($active === "categories") ? 'active' : '' }} text-center" 
                    href="{{ route('categories') }}">Categories</a>
                </li>
            </ul>

            {{-- haya bisa diakses ketika sudah terauntentikasi --}}
            <ul class="navbar-nav ms-auto">
                @auth 
                    <li class="nav-item text-center dropdown">
                        <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false" >
                            Welcome back, {{ ucwords(auth()->user()->name) }}
                        </a>

                        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <li>
                                <a class="dropdown-item" href="/dashboard">
                                    <span data-feather="file-text"></span> My Dashboard
                                </a>
                            </li>
                            <li><hr class="dropdown-divider"></li>

                            <form action="/logout" method="post">
                                @csrf
                                <button class="dropdown-item" type="submit" onclick="return confirm('Logout?')">
                                    <span data-feather="log-out"></span> Logout
                                </button>
                            </form>
                        </ul>
                    </li>
                    <span data-feather="user" class="text-white mt-2"></span>
                    
                @else
                    <li class="nav-item">
                        <a class="nav-link {{ ($active === "login") ? 'active' : '' }}" href="/login">
                            <span data-feather="log-in"></span> Login
                        </a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>