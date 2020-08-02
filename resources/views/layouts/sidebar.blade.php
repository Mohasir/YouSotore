<div class="sidebar">
    <nav class="sidebar-nav">
        <li @click="menu=0" class="head-menu nav-item">
            <a {{-- href="{{ url('/') }}"  --}} class="navbar-brand text-light">
                {{ config('app.name', 'Laravel') }}
                <i class="fas fa-columns fa-lg"></i>
            </a>
        </li>
        <ul class="nav">
            <li class="nav-title">
                Menú
            </li>
            <li @click="menu=1" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-list"></i> Categorías</a>
            </li>

            <li @click="menu=2" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-tasks"></i> Productos</a>
            </li>


            <li @click="menu=3" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-shopping-cart"></i> Compras</a>
            </li>

            <li @click="menu=4" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-users"></i> Proveedores</a>
            </li>


            <li @click="menu=5" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-suitcase"></i> Ventas</a>
            </li>

            <li @click="menu=6" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-users"></i> Clientes</a>
            </li>


            <li @click="menu=7" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-user"></i> Usuarios</a>
            </li>

            <li @click="menu=8" class="nav-item">
                <a href="#" class="nav-link"><i class="fa fa-list"></i> Roles</a>
            </li>
        </ul>
    </nav>
    <button class="sidebar-minimizer brand-minimizer" type="button" disabled></button>
</div>
