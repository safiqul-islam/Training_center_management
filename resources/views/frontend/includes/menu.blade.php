

<header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

        <h1 class="logo me-auto"><a href="index.html">Mentor</a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

        <nav id="navbar" class="navbar order-last order-lg-0">
            <ul>
                <li><a href="{{ route('home') }}">Home</a></li>
                <li><a href="{{ route('about') }}">About</a></li>
                <li><a href="{{ route('all_courses') }}">Courses</a></li>
                <li><a href="{{ route('trainers') }}">Trainers</a></li>
                <li><a href="{{ route('events') }}">Events</a></li>

                @guest()
                    <li><a href="{{ route('login') }}" class="">Login</a></li>
                @else
                    <li class="dropdown"><a href="#"><span>Profile</span> <i class="bi bi-chevron-down"></i></a>
                        <ul>
                            <li><a href="{{ route('dashboard') }}">My account</a></li>
                            <li>
                                <a class="" onclick="event.preventDefault(); document.getElementById('logoutForm').submit()" href=" {{ route('logout') }}" >Logout</a>
                                <form action="{{ route('logout')  }}" method="post" id="logoutForm">
                                    @csrf
                                </form>
                            </li>
                        </ul>
                    </li>

                @endguest





            </ul>
            <i class="bi bi-list mobile-nav-toggle"></i>
        </nav><!-- .navbar -->






    </div>
</header>
