<header class="header-area header-one">
    <div class="header-navigation">
        <div class="container-fluid pl-0 pr-0">
            <div class="row align-items-center">
                <div class="col-lg-2 col-md-4 col-5">
                    <div class="brand-logo">
                        <a href="index.html"><img src="{{ asset('assets/images/dealsintel-black.png') }}" class="img-fluid" alt="Logo"></a>
                    </div>
                </div>
                <div class="col-lg-8 col-md-4 col-2">
                    <div class="nav-menu">
                        <!-- navbar-close -->
                        <div class="navbar-close">
                            <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                        </div>
                        <!-- Mobile Menu Logo -->
                        <div class="brand-logo text-center ml-2 mr-2 mb-4">
                            <a href="{{ route('home') }}"><img src="{{ asset('assets/images/logo-1.png') }}" class="img-fluid" alt="Logo"></a>
                        </div>
                        <!-- Search form -->
                        <div class="nav-search ml-3 mr-3">
                            <form>
                                <div class="lang-dropdown">
                                    <select class="wide mb-40">
                                        <option value="01">En</option>
                                        <option value="02">Ru</option>
                                    </select>
                                </div>
                            </form>
                        </div>
                        <!-- main menu -->
                        <nav class="main-menu">
                            <ul>
                                <li class="menu-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="menu-item"><a href="{{ route('deals') }}">Browse Deals</a></li>
                                <li class="menu-item"><a href="{{ route('blogs') }}">Blogs</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
                <div class="col-lg-2 col-md-4 col-5">
                    <div class="nav-tools">
                        <ul>
                            <li class="search-btn"><a href="#search-modal" class="icon" data-toggle="modal" data-target="#search-modal"><i class="far fa-search"></i></a></li>
                            
                            <li class="nav-toggle-btn">
                                <div class="navbar-toggler">
                                    <span></span><span></span><span></span>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>