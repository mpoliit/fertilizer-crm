<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="{{ route('home') }}" class="brand-link">
        <img src="{{ asset('dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Fertilizer-crm</span>
    </a>
    <div class="sidebar">
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->name }}</a>
            </div>
        </div>
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-item">
                    <a href="{{ route('clients.index') }}" class="nav-link @if(Route::is('clients.*')) active @endif">
                        <i class="far fa-user-circle"></i>
                        <p>
                            Клиенты
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('crops.index') }}" class="nav-link @if(Route::is('crops.*')) active @endif">
                        <i class="fas fa-layer-group"></i>
                        <p>
                            Группы культур
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('fertilizers.index') }}" class="nav-link @if(Route::is('fertilizers.*')) active @endif">
                        <i class="fab fa-pagelines"></i>
                        <p>
                            Удобрения
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('users.index') }}" class="nav-link @if(Route::is('users.*')) active @endif">
                        <i class="fas fa-users"></i>
                        <p>
                            Пользователи
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i>
                        <p>
                            Выйти
                        </p>
                    </a>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
    </div>
</aside>