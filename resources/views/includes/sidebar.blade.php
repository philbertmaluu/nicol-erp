<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Font Awesome CDN links -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-...your-sha512-hash..." crossorigin="anonymous" />
    <style>
        .nav-link:hover {
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
            border-radius: 10px;
        }

        .nav-link.active {
            border-radius: 10px;
            font-weight: bolder;
            color: black !important;
            background: linear-gradient(rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2), rgba(0, 0, 0, 0.2));
            border-bottom: 1px solid white;

        }

        a {
            color: white;
            text-decoration: none;
            margin-top: 7px;
            margin-bottom: 7px;
        }

        a:hover {
            text-decoration: none;
            color: black;
        }

        i {
            margin-right: 7px;
        }
    </style>
</head>

<body>
    <div class="d-flex flex-column flex-shrink-0 p-2" style="color: #fff; width: 200px; height: 150vh; background-color: #3A9340; text-decoration: none;">
        <ul style="margin-top: 70px;">
            @if(Auth::user()->type == 0)
            <li class="nav-link" id="dashboard">
                <a href="{{ url('home')}}" onclick="setActive('dashboard')"><i class="fa-solid fa-house"></i> Dashboard</a>
            </li>
            @endif
            <li class="nav-link" id="quorums">
                <a href="{{ url('event')}}" onclick="setActive('quorums')"><i class="fa-solid fa-calendar-days"></i> Quorums</a>
            </li>
            @if(\Auth::user()->type==0)
            <li class="nav-link" id="shareholders">
                <a href="{{ url('shareholder')}}" onclick="setActive('shareholders')"><i class="fas fa-users"></i> Shareholders</a>
            </li>
            <li class="nav-link" id="proxy">
                <a href="{{ url('proxy')}}" onclick="setActive('proxy')"><i class="fas fa-user-secret"></i> Proxy</a>
            </li>

            <li class="nav-link" id="proxy">
                <a href="{{ url('votting') }}" onclick="setActive('votting')"><i class="fas fa-vote-yea"></i>Voting</a>
            </li>

            <li class="nav-link" id="proxy">
                <a href="{{ url('users') }}" onclick="setActive('users')">
                    <i class="fas fa-user"></i>Users
                </a>
            </li>
            @endif
        </ul>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            setActiveByURL();
        });

        function setActiveByURL() {
            var currentURL = window.location.href;
            var navLinks = document.getElementsByClassName('nav-link');

            for (var i = 0; i < navLinks.length; i++) {
                var anchorElement = navLinks[i].querySelector('a');

                // Check if the anchor element exists before accessing its href property
                if (anchorElement && anchorElement.href) {
                    var linkURL = anchorElement.href;

                    // Check if the current URL contains the link URL
                    if (currentURL.includes(linkURL)) {
                        navLinks[i].classList.add('active');
                        break;
                    }
                }
            }
        }

        function setActive(id) {
            // Remove 'active' class from all nav-links
            var navLinks = document.getElementsByClassName('nav-link');
            for (var i = 0; i < navLinks.length; i++) {
                navLinks[i].classList.remove('active');
            }

            // Add 'active' class to the clicked nav-link
            document.getElementById(id).classList.add('active');
        }
    </script>


</body>

</html>