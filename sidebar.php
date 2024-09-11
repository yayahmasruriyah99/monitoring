<body>
    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="?page=dashboard">

            <div class="sidebar-brand-text mx-3">Monitoring SA</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <div class="sidebar-heading">
            Dashboard
        </div>
        <li class="nav-item ">
                <a class="nav-link" href="?page=dashboard">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>SA & Nacl</span></a>
        </li>

        <li class="nav-item ">
                <a class="nav-link" href="?page=dashboard_tws">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>Nacl TWS</span></a>
        </li>
        <li class="nav-item ">
                <a class="nav-link" href="?page=dashboard_fcp">
                    <i class="fas fa-fw fa-chart-area"></i>
                    <span>CR FCP</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item ">
                <a class="nav-link" href="?page=index_sa_cr">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data SA & CR</span></a>
        </li>

        <li class="nav-item ">
                <a class="nav-link" href="?page=index_report">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Summary Report</span></a>
        </li>

        <hr class="sidebar-divider">

        <!-- Heading -->
        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Master Data</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <a class="collapse-item" href="?page=master_user">Data User</a>
                        <a class="collapse-item" href="?page=master_produk">Data Produk</a>
                        <a class="collapse-item" href="?page=master_loop">Data Loop</a>
                        <a class="collapse-item" href="?page=master_brand">Data Brand</a>
                    </div>
                </div>
            </li>


        <hr class="sidebar-divider">
        
    </ul>
    <!-- End of Sidebar -->
</body>