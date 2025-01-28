<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{getRoleWiseHomeUrl()}}" class="brand-link" wire:navigate>
        

        @if (isset(Auth::user()->image) && file_exists(public_path(Auth::user()->image)))
            <img src="{{ asset(Auth::user()->image) }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        @else
            <img src="{{ URL::asset('assets/dist/img/AdminLTELogo.png') }}" class="brand-image img-circle elevation-3" style="opacity: .8">
        @endif

        <span class="brand-text font-weight-light">
            {{ config('app.name', 'Laravel') }}
        </span>
    </a>
    <div class="sidebar">
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview"
            role="menu" data-accordion="false">
                @if(Auth::user() && Auth::user()->role == 'super_admin')
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link @if(isset($menu) && $menu=='Dashboard') active @endif" wire:navigate>
                            <i class="nav-icon far fa-image"></i>
                            <p>Dashboard</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('institution.list') }}" class="nav-link @if(isset($menu) && $menu=='Institutions') active @endif" wire:navigate>
                            <i class="nav-icon fa fa-building"></i>
                            <p>Institutions</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('user.list') }}" class="nav-link @if(isset($menu) && $menu=='Users') active @endif" wire:navigate>
                            <i class="nav-icon fa fa-users"></i>
                            <p>Users</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('reporting.list') }}" class="nav-link @if(isset($menu) && $menu=='Reporting') active @endif" wire:navigate>
                            <i class="nav-icon fa fa-flag"></i>
                            <p>Reporting</p>
                        </a>
                    </li>

                    <li class="nav-item">
                        <a href="{{ route('advance.list',['section_id'=>1]) }}" class="nav-link @if(isset($menu) && $menu=='Advance Stats') active @endif" wire:navigate>
                            <i class="nav-icon fa fa-percent"></i>
                            <p>Advance Stats</p>
                        </a>
                    </li>
                @endif
                @if (Auth::user() && in_array(Auth::user()->role, ['user', 'submitter']))
                    <li class="nav-item">
                        <a href="{{ route('questionnaire', ['id' => 1]) }}" class="nav-link @if(isset($menu) && $menu=='Questionnaires') active @endif" wire:navigate>
                            <i class="nav-icon fa fa-question"></i>
                            <p>Questionnaires</p>
                        </a>
                    </li>
                @endif
                <li class="nav-item">
                    <a href="{{ route('profile.edit') }}" class="nav-link @if(isset($menu) && $menu=='Edit Profile') active @endif" wire:navigate>
                        <i class="nav-icon far fa-edit"></i>
                        <p>Edit Profile</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link text-danger" wire:navigate>
                        <i class="nav-icon fa fa-sign-out-alt"></i>
                        <p>Log out</p>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</aside>