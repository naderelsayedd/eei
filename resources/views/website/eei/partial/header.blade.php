{{-- <header style="background: var(--main-color);height: 14px;">

</header> --}}

<header id="header" class="header d-flex align-items-center fixed-top">
    <div
        class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

        <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
            <!-- Uncomment the line below if you also wish to use an image logo -->
            <!-- <img src="assets/img/logo.png" alt=""> -->
            {{-- <h1 class="sitename">PST-CMS</h1> --}}
            <img src="{{ asset('website/assets/img/logo.svg') }}" alt="img">

        </a>
        <nav id="navmenu" class="navmenu">

            <ul>
                <li><a href="/" class="">Home</a></li>
                <li><a href="/about">About</a></li>
                <li class="dropdown"><a href="#"><span>Services</span> <i
                            class="bi bi-chevron-down toggle-dropdown"></i></a>
                    <ul>
                        @if ($categories->count() > 0)
                            @foreach ($categories as $cat)
                                <li>
                                    <a href="/category/{{$cat->id}}">{{ $cat->name}}</a>
                                </li>
                            @endforeach
                        @endif
                    </ul>
                </li>
                <li><a href="/certificate">Certificates</a></li>
                <li><a href="/contact">Contact Us</a></li>
            </ul>
        </nav>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>

        <a class="btn-getstarted bg-danger" href="/get-service">Get Services</a>

    </div>
</header>
