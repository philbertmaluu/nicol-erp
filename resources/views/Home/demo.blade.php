<div class="container-fluid " style="height: 40px; width: 100%; background-color: green;"></div>
<nav class="navbar navbar-expand-lg p-1 navbar-light bg-dark">
    <div class="container ">
        <a class="navbar" href="#">
            <img src="https://nicol.co.tz/wp-content/uploads/2021/12/nicocr7-1.png" alt="Navbar Logo" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                <li class="nav-item ">
                    <a class="nav-link text-light" href="#">Home</a>
                </li>
                @if (Route::has('login'))
                @auth
                @else
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('login') }}">Login</a>
                </li>

                @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link text-light" href="{{ route('register') }}">Register</a>
                </li>
                @endif
                @endauth
                @endif
            </ul>
        </div>
    </div>
</nav>