<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <a class="navbar-brand" href="{{ route('welcome') }}">Kepegawaian miniApp</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item {{ Route::currentRouteName() == 'pegawai.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('pegawai.index') }}">Pegawai</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'departemen.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('departemen.index') }}">Departemen</a>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'jabatan.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('jabatan.index') }}">Jabatan</a>
            </li>
            </li>
            <li class="nav-item {{ Route::currentRouteName() == 'absensi.index' ? 'active' : '' }}">
                <a class="nav-link" href="{{ route('absensi.index') }}">Absensi</a>
            </li>
        </ul>
        @auth
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link text-white" href="#">Halo, {{ Auth::user()->name }}</a>
            </li>
            <li class="nav-item">
                <a class="nav-link btn btn-danger ml-4 text-white" href="{{ route('logout') }}"
                onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                    Logout
                </a>
                <form id="logout-form" action="{{ route('logout') }}" method="post" style="display: none;">
                    @csrf
                </form>
            </li>
        </ul>
        @else
        <ul class="navbar-nav ml-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">Login</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ route('register') }}">Register</a>
            </li>
        </ul>
        @endauth
    </div>
</nav>