<!-- <div class="preloader flex-column justify-content-center align-items-center">
    <img class="animation__shake" src="{{ URL::asset('assets/dist/img/AdminLTELogo.png') }}" alt="AdminLTELogo"
    height="60" width="60">
</div> -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" href="#" role="button">
                <i class="fas fa-bars">
                </i>
            </a>
        </li>
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{getRoleWiseHomeUrl()}}" class="nav-link" wire:navigate>
                Dashboard
            </a>
        </li>
    </ul>
    <ul class="navbar-nav ml-auto">
        <li class="nav-item dropdown">
            <a href="{{ route('profile.edit') }}" class="nav-link" wire:navigate>
                <i class="far fa-user"></i> {{ Auth::check() ? Auth::user()->fullname : '' }} {{ Auth::check() ? '('.ucwords(str_replace("_", " ", Auth::user()->role)).')' : '' }}
            </a>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link text-danger" href="{{ route('logout') }}" wire:navigate>
                <i class="fas fa-sign-out-alt"></i> Logout
            </a>
        </li>
    </ul>
</nav>