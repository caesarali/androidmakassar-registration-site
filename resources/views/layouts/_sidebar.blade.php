<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ url('/') }}" class="brand-link">
        <img src="{{ asset('favicon.png') }}" alt="{{ config('app.name') }}" class="brand-image img-circle bg-white elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light text-uppercase">{{ config('app.name') }}</span>
    </a>

    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('images/user-circle.png') }}" class="img-circle" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link">
                        <i class="nav-icon fas fa-home"></i>
                        <p class="pl-3">Home</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('courses.index') }}" class="nav-link">
                        <i class="nav-icon far fa-calendar-alt"></i>
                        <p class="pl-3">Courses</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('promo.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-tags"></i>
                        <p class="pl-3">Promo</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('members.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-users"></i>
                        <p class="pl-3">Members</p>
                    </a>
                </li>

                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link">
                        <i class="nav-icon fas fa-key"></i>
                        <p class="pl-3">Account</p>
                    </a>
                </li>

                <li class="nav-item has-treeview ">
                    <a href="#" class="nav-link ">
                        <i class="nav-icon fas fa-cog"></i>
                        <p class="pl-3">Master <i class="right fas fa-angle-left"></i></p>
                    </a>


                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">Cities</p>
                            </a>
                        </li>

                        <li class="nav-item">
                            <a href="#" class="nav-link ">
                                <i class="far fa-circle nav-icon"></i>
                                <p class="pl-3">Categories</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
    </div>
</aside>
