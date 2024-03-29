    @auth
    @include('partials.navbar')
    <div class="l-navbar" id="nav-bar">
        <nav class="nav">
            <div> <a href="{{ route('home') }}" class="nav_logo"> <i class='second-main-color bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">SISGPI</span> </a>
                <div class="nav_list">
                    <a href="{{ route('home') }}" class="nav_link {{ Request::is('dashboard') ? 'active' : '' }}">
                        <i class='bx bx-grid-alt nav_icon'></i>
                        <span class="nav_name">Dashboard</span>
                    </a>
                    <a href="{{ route('turma.index') }}" class="nav_link {{ Request::is('turmas') ? 'active' : '' }}">
                        <i class='icofont-group'></i>
                        <span class="nav_name">Turmas</span>
                    </a>
                    <a href="{{ route('aluno.index') }}" class="nav_link {{ Request::is('alunos') ? 'active' : '' }}">
                    <i class="icofont-student-alt"></i>
                        <span class="nav_name">Alunos</span>
                    </a>
                    <a href="{{ route('livro.index') }}" class="nav_link {{ Request::is('livros') ? 'active' : '' }}">
                        <i class='bx bxs-book nav_icon'></i>
                        <span class="nav_name">Livros</span>
                    </a>

                    @role('admin')
                    <a href="{{ route('user.index') }}" class="nav_link {{ Request::is('usuarios') ? 'active' : '' }}">
                        <i class='bx bx-user nav_icon'></i>
                        <span class="nav_name">Usuários</span>
                    </a>
                    @endrole

                </div>
            </div>
            <form action="{{ url('/logout') }}" method="post" id="logoutForm" style="display: none;">
                @csrf
                <button type="submit"></button>
            </form>
            <a href="#logout" onclick="$('#logoutForm').submit();" class="nav_link">
                <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Sair</span>
            </a>
        </nav>
    </div>
    @endauth
    <div class="container mt-5" id="main-content">
        @yield('content')
    </div>