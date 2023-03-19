<div class="nav-left-sidebar sidebar-dark">
    <div class="menu-list">
        <nav class="navbar navbar-expand-lg navbar-light">
            <a class="d-xl-none d-lg-none" href="#">Dashboard</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav flex-column">
                    <li class="nav-divider">
                        Admin : {{ Auth::user()->name }}
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-2" aria-controls="submenu-2">Stores</a>
                        <div id="submenu-2" class=" submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <a href="{{url('dashbord/stores')}}">Show all Stores </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <a href="{{URL('dashbord/store/create')}}">New Stores </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>



                    <li class="nav-item">
                        <a class="nav-link" href="#" data-toggle="collapse" aria-expanded="false"
                            data-target="#submenu-3" aria-controls="submenu-3">Products</a>
                        <div id="submenu-3" class="  submenu">
                            <ul class="nav flex-column">
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <a href="{{ url('dashbord/products') }}">Show Products </a>
                                    </div>
                                </li>
                                <li class="nav-item">
                                    <div class="nav-link">
                                        <a href="{{ url('dashbord/product/create') }}">New Product </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </li>

                    <li class="nav-divider">
                        <a href="{{ url('dashbord/transactions')}}">Purchase Transaction</a>
                    </li>
                    <li class="nav-divider">
                        <a href="{{ url('dashbord/transactions/report/') }}">Purchases Report</a>
                    </li>








                </ul>
            </div>
        </nav>
    </div>
</div>