<div class=" d-flex flex-column flex-shrink-0 p-2 " style=" color: #fff; width: 200px; height: 150vh; background-color: #3A9340; text-decoration: none;">
    <ul style="margin-top: 70px;">
        <li class="nav-link active">
            <a href="{{ url('home')}}">Dashboard</a>
        </li>
        <li class="nav-link">
            <a href="{{ url('event')}}">Quorums</a>
        </li>
        @if(\Auth::user()->type==0)
        <li class="nav-link">
            <a href="{{ url('shareholder')}}">Shareholders</a>
        </li>
        @endif

    </ul>
</div>