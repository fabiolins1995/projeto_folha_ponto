<aside class="main-sidebar {{ config('adminlte.classes_sidebar', 'sidebar-dark-primary elevation-4') }}">

    {{-- Sidebar brand logo --}}
    @if(config('adminlte.logo_img_xl'))
    @include('adminlte::partials.common.brand-logo-xl')
    @else
    @include('adminlte::partials.common.brand-logo-xs')
    @endif

    {{-- Sidebar menu --}}
    <div class="sidebar">
        <nav class="pt-2">
            <ul data-accordion="true" class="nav nav-pills nav-sidebar flex-column {{ config('adminlte.classes_sidebar_nav', '') }}" data-widget="treeview" role="menu">
                @if(config('adminlte.sidebar_nav_animation_speed') != 300)
                    data-animation-speed="{{ config('adminlte.sidebar_nav_animation_speed') }}"
                @endif
                @if(!config('adminlte.sidebar_nav_accordion'))
                    data-accordion="false"
                @endif>
                {{-- Configured sidebar links --}}
                <li class="nav-header ">
                    Dashboard
                </li>

                <?php if (Auth::user()->tipo == 1) { ?>

                    <li class="nav-item">
                        <a class="nav-link  " href="/dashadmin">
                            <i class="fas fa-tachometer-alt "></i>
                            <p>
                                Dashboard Admin
                            </p>
                        </a>
                    </li>

                <?php }; ?>
                <?php if (Auth::user()->tipo == 0) { ?>

                    <li class="nav-item">
                        <a class="nav-link  " href="/dashclientes">
                            <i class="fas fa-tachometer-alt "></i>
                            <p>
                                Dashboard Cliente
                            </p>
                        </a>
                    </li>

                <?php }; ?>
                <?php if (Auth::user()->tipo == 1) { ?>

                    <li class="nav-header ">
                        Gerenciamento
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  " href="/gerenciamentoequipes">
                            <i class="fas fa-user-friends "></i>
                            <p>
                                Equipes
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/colaborador">
                            <i class="fas fa-user "></i>
                            <p>
                                Colaborador
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/financeiro">
                            <i class="fas fa-paste "></i>
                            <p>
                                Financeiro
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link  " href="/escala">
                            <i class="fas fa-paste "></i>
                            <p>
                                Escala
                            </p>
                        </a>
                    </li>

                    <li class="nav-header ">
                        Controle usuário
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  " href="/register">
                            <i class="fas fa-user "></i>
                            <p>
                                Novo Usuário
                            </p>
                        </a>
                    </li>

                    <li class="nav-header ">
                        Registro
                    </li>

                    <li class="nav-item">
                        <a class="nav-link  " href="/falta">
                            <i class="fas fa-user "></i>
                            <p>
                                Falta
                            </p>
                        </a>
                    </li>

                    <!--<li class="nav-item">
                        <a class="nav-link  " href="/horaextra">
                            <i class="fas fa-user "></i>
                            <p>
                                Hora Extra
                            </p>
                        </a>
                    </li>-->
                <?php }; ?>
            </ul>
        </nav>
    </div>
</aside>