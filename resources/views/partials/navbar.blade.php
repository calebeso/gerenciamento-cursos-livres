<header class="header bg-body mb-4" id="header">
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>

        <div class="dropdown navbar_img me-1">
                <a href="#" id="dropdownMenu" data-bs-toggle="dropdown">
                        <img src="{{ asset('images/profile.jpg')}}" alt="">
                </a>
                <ul class="dropdown-menu navbar_menu" aria-labelledby="dropdownMenu">
                        <li><a class="dropdown-item disabled" href="#">{{ Auth::user()->email }}</a></li>
                        <form action="{{ url('/logout') }}" method="post" id="logoutForm" style="display: none;">
                                @csrf
                                <button type="submit"></button>
                        </form>
                        <li>
                                <a href="#logout" onclick="$('#logoutForm').submit();" class="dropdown-item">
                                        <i class='bx bx-log-out'></i> Sair
                                </a>
                        </li>
                </ul>
        </div>
</header>