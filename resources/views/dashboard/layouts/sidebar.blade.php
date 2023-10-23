<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
    <div class="position-sticky pt-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
                    <span data-feather="home"></span>Dashboard
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/profile*') ? 'active' : '' }}" href="/dashboard/profile">
                    <span data-feather="user"></span>Profile
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ Request::is('dashboard/posts*') ? 'active' : '' }}" href="/dashboard/posts">
                    <span data-feather="file"></span>My Posts
                </a>
            </li>
        </ul>

        @can('admin')
            <h6 class="sidebar-heading d-flex justify-content-between align-content-center px-3 mt-4 mb-1 text-muted">
                <span>Administrator</span>
            </h6>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin/users*') ? 'active' : '' }}" 
                        href="/dashboard/admin/users">
                        <span data-feather="users"></span>Users
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin/posts*') ? 'active' : '' }}" 
                        href="/dashboard/admin/posts">
                        <span data-feather="file-text"></span>All Post
                    </a>
                </li>
            </ul>
            <ul class="nav flex-column">
                <li class="nav-item">
                    <a class="nav-link {{ Request::is('dashboard/admin/categories*') ? 'active' : '' }}" 
                        href="/dashboard/admin/categories">
                        <span data-feather="grid"></span>Post Categories
                    </a>
                </li>
            </ul>
        @endcan
        <hr class="m-1">
        <ul class="nav flex-column">
            <li class="nav-item">
                <form action="/logout" method="post" class="nav-link {{ Request::is('logout') ? 'active' : '' }}">
                    @csrf
                    <button class="nav-link p-0" type="submit" onclick="return confirm('Logout?')">
                        <span data-feather="log-out"></span> Logout
                    </button>
                </form>
            </li>
        </ul>
    </div>
</nav>