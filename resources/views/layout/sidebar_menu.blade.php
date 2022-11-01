<nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->

        <li class="nav-item">
            <a href="{{route('home')}}" class="nav-link">
                <i class="fa fa-tachometer-alt"></i>
                <p>
                    Dasbhoard
                </p>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{route('pr.index')}}" class="nav-link">
                <i class="nav-icon fas fa-boxes"></i>
                <p>
                    Products
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('kasir.index')}}" class="nav-link">
                <i class="nav-icon fas fa-cart-plus"></i>
                <p>
                    Aplikasi
                </p>
            </a>
        </li>

        <li class="nav-item">
            <a href="{{route('trx.index')}}" class="nav-link">
                <i class="nav-icon fas fa-money-bill"></i>
                <p>
                    Transaksi
                </p>
            </a>
        </li>
    </ul>
</nav>
