<header class="header_section" style="position:sticky;top:0;z-index:9999;">
    <div class="container-fluid">
        <nav class="navbar navbar-expand-lg custom_nav-container ">
            <header class="py-3 shadow-sm text-white position-sticky top-0" style=" z-index:10000">
                <div class="container d-flex justify-content-between align-items-center">
                    <div>
                        <i class="fas fa-bars menu-icon text-light" id="menu-toggle"></i>
                        <ul class="menu" id="menu">
                            <li><a href="{{ route('dashboard') }}">Home</a></li>
                            <li><a href="#about">About</a></li>
                            <li><a href="#services">Services</a></li>
                            <li><a href="#contact">Contact</a></li>
                        </ul>
                    </div>
                </div>
            </header>
            <a class="navbar-brand" href="">
                <img src="../images/faicon.png" style="height: 2rem; aspect-ratio: 1/1;" alt="">
                <span>
                    SANCA
                </span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse"
                data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                aria-expanded="false" aria-label="Toggle navigation">
                <span class=""> </span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav  ">
                        
                    <li class="nav-item">
                        <a class="nav-link" href="{{ _('logout ') }}"> <i class="fa fa-user" aria-hidden="true"></i>
                            Logout</a>
                    </li>
                    <form class="form-inline">
                        <button class="btn  my-2 my-sm-0 nav_search-btn" type="submit">
                            <i class="fa fa-search" aria-hidden="true"></i>
                        </button>
                    </form>
                </ul>
            </div>
        </nav>
    </div>
</header>