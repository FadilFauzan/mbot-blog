<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="/dashboard">MBOT Blog</a>
    <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="form-input w-100">
        <form action="/dashboard/admin/posts">
            @if (request('category'))
                <input type="hidden" name="category" value="{{ request('category') }}">
            @endif

            @if (request('author'))
                <input type="hidden" name="author" value="{{ request('author') }}">
            @endif

            <input class="form-control form-control-dark" type="text" name="search" placeholder="Search" 
                value="{{ request('search') }}">
        </form>
    </div>

    <div class="navbar-nav">
        <div class="nav-item text-nowrap">
            <a href="/">
            <button class="nav-link px-3 bg-dark border-0" type="button">
                <span data-feather="home"></span>
            </button>
            </a>
        </div>
    </div>
</header>