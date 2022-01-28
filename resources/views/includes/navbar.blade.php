<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/dashboard') }}">E-Laundry</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item @yield('dashboard')">
                    <a class="nav-link" href="{{ url('/dashboard') }}">Dashboard <span class="sr-only">(current)</span></a>
                </li>
                <li class="nav-item @yield('transaksi')">
                    <a class="nav-link" href="{{ url('transaksi')}}">Transaksi</a>
                </li>
                <li class="nav-item @yield('laporan')">
                    <a class="nav-link" href="{{ url('laporan') }}">Laporan</a>
                </li>
                <li class="nav-item dropdown @yield('settings')">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-expanded="false">
                        Settings
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item @yield('paket-laundry')" href="{{ route('laundry.index') }}">Paket Laundry</a>
                        <a class="dropdown-item @yield('jenis-laundry')" href="{{ url('jenis-laundry') }}">Jenis Laundry</a>
                    </div>
                </li>
            </ul>

            <form action="{{ url('proses-logout') }}" method="POST" class="form-inline my-2 my-lg-0">
                @csrf
                <button class="btn btn-sm-block btn-outline-danger my-2 my-sm-0" type="submit">Logout</button>
            </form>
        </div>
    </div>
</nav>