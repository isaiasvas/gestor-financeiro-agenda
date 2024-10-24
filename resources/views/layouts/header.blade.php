    <!-- Navbar -->
    <div class="d-block d-md-none">
        <nav class=" main-header navbar navbar-expand navbar-white navbar-light">
            <!-- Left navbar links -->
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i data-feather="menu"></i></a>
                </li>
            </ul>

            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <!-- Navbar Search -->
                <li class="nav-item">
                    <form action="{{route('logout')}}" method="post">
                        @csrf
                        @method('post')
                        <button class="btn btn-link text-muted" role="button">
                            <i data-feather="log-out"></i>
                        </button>
                    </form>
                </li>

            </ul>
        </nav>
        <!-- /.navbar -->
    </div>

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4">
        <!-- Brand Logo -->
        <a href="{{route('inicio')}}" class="brand-link">
            <img src="{{asset('brand/laravel-2.svg')}}" alt="Logo" class="brand-image img-circle elevation-3"
                style="opacity: .8;">
            <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                    <li class="nav-item">
                        <a href="{{route('home')}}" class="nav-link">
                            <i class="nav-icon" data-feather="calendar"></i>
                            <p>
                                Agenda
                            </p>
                        </a>

                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon" data-feather="dollar-sign"></i>
                            <p>
                                Financeiro
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview pl-1">
                            <li class="nav-item">
                                <a href="{{route('financeiro.index')}}" class="nav-link">
                                    <i class="fas fa-money-bill-alt nav-icon"></i>
                                    <p>Contas</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('cartaodecredito.index')}}" class="nav-link">
                                    <i class="fas fa-credit-card nav-icon"></i>
                                    <p>Cartões de Crédito</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('contabancaria.index')}}" class="nav-link">
                                    <i class="fas fa-university nav-icon"></i>
                                    <p>Contas Bancarias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('categoria.index')}}" class="nav-link">
                                    <i class="fas fa-tags nav-icon"></i>
                                    <p>Categorias</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('clienteoufornecedor.index')}}" class="nav-link">
                                    <i class="fas fa-users nav-icon"></i>
                                    <p>Clientes e Fornecedores</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{route('formasdepagamento.index')}}" class="nav-link">
                                    <i class="fas fa-receipt nav-icon"></i>
                                    <p>Formas de Pagamento</p>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="nav-item">
                        <a href="{{route('funcionario.index')}}" class="nav-link">
                            <i class="nav-icon" data-feather="users"></i>
                            <p>
                                Equipe
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a onclick="document.getElementById('logout-form').submit();" class="nav-link">
                            <form id="logout-form" action="{{route('logout')}}" method="post">
                                @csrf
                                @method('post')

                                <i class="nav-icon" data-feather="log-out"></i>
                                <p>Sair </p>
                            </form>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- /.sidebar-menu -->
        </div>
        <!-- /.sidebar -->
    </aside>