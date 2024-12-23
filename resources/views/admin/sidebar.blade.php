<style>
    .sidebar {
        background: #4A56E2;
        color: #fff;
        display: flex;
        flex-direction: column;
        align-items: center;
        padding: 20px 0;
        height: 100vh;
        position: fixed;
        left: 0;
        top: 0;
        z-index: 1000;
        width: 6vw;
        /* Sidebar width as 10% of the viewport */
        overflow: hidden;
        gap: 0;
    }

    .sidebar img {
        width: 2rem;
        aspect-ratio: 1/1;
        margin-bottom: 30px;
    }

    .sidebar ul {
        list-style: none;
        padding: 0;
        width: 100%;
        display: flex;
        flex-direction: column;
        align-items: center;
        gap: 0;
    }

    .sidebar ul li {
        margin: 0;
        font-size: 24px;
        cursor: pointer;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .sidebar ul li a {
        color: #fff;
        text-decoration: none;
        display: flex;
        align-items: center;
        justify-content: center;
        width: 100%;
    }

    .sidebar ul li a:hover {
        color: #C7D2FE;
    }

    .sidebar ul li .collapse {
        padding-left: 20px;
    }
</style>
<div class="sidebar">
    <img src="{{ asset('images/faicon.png') }}" style="width: 2rem; aspect-ratio: 1/1;" alt="Logo">
    <ul>
        <li><a class="nav-link text-white" href="{{ route('dashboard') }}"><i class="fas fa-tachometer-alt"></i></a></li>
        <li><a class="nav-link text-white" href="{{ route('article.main') }}"><i class="fas fa-newspaper"></i></a></li>
        <li><a class="nav-link text-white" href="{{ route('article.create') }}"><i class="fas fa-edit"></i></a></li>
        <li><a class="nav-link text-white" href="{{ route('user.show') }}"><i class="fas fa-user"></i></a></li>
        <li class="d-flex flex-column"> <a class="nav-link text-white" data-bs-toggle="collapse" href="#settingsMenu"
                role="button" aria-expanded="false" aria-controls="settingsMenu">
                <i class="fas fa-cogs"></i>
            </a>
            <div class="collapse mt-2" id="settingsMenu">
                <form action="{{ route('logout') }}" method="POST" class="d-inline">
                    @csrf
                    <button type="submit" class="btn btn-danger btn-sm w-100">Logout</button>
                </form>
            </div>
        </li>
    </ul>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
