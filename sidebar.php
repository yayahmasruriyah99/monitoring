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

        <!-- Heading -->
        <div class="sidebar-heading">
            Master Data
        </div>
        <li class="nav-item ">
                <a class="nav-link" href="?page=master_user">
                    <i class="fas fa-fw fa-user"></i>
                    <span>Data User</span></a>
        </li>

        <li class="nav-item ">
                <a class="nav-link" href="?page=master_produk">
                    <i class="fas fa-fw fa-cog"></i>
                    <span>Data Product</span></a>
        </li>

        <hr class="sidebar-divider">
        <li class="nav-item ">
                <a class="nav-link" href="?page=index_sa_cr">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Data SA & CR</span></a>
        </li>

        <li class="nav-item">
                <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapsePages"
                    aria-expanded="true" aria-controls="collapsePages">
                    <i class="fas fa-fw fa-folder"></i>
                    <span>Report Summary</span>
                </a>
                <div id="collapsePages" class="collapse" aria-labelledby="headingPages" data-parent="#accordionSidebar">
                    <div class="bg-white py-2 collapse-inner rounded">
                        <h6 class="collapse-header">Report Summary:</h6>
                        <a class="collapse-item" href="?page=index_report">Report Summary</a>
                        <a class="collapse-item" href="?page=report_fcp">FCP</a>
                        <a class="collapse-item" href="?page=report_tws">TWS</a>
                        <div class="collapse-divider"></div>
                        <h6 class="collapse-header">Other Pages:</h6>
                        <a class="collapse-item" href="404.html">404 Page</a>
                        <a class="collapse-item" href="blank.html">Blank Page</a>
                    </div>
                </div>
            </li>
    </ul>
    <!-- End of Sidebar -->
</body>