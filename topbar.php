<!-- Main Content -->
<div id="content">

    <!-- Topbar -->
    <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

        <!-- Sidebar Toggle (Topbar) -->
        <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
        </button>



        <!-- Topbar Navbar -->
        <ul class="navbar-nav ml-auto">


            <div class="topbar-divider d-none d-sm-block"></div>

            <!-- Nav Item - User Information -->
            <li class="nav-item dropdown no-arrow">
                <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="mr-2 d-none d-lg-inline text-gray-600 small"><?=$_SESSION['nama']?></span>
                    <img class="img-profile rounded-circle" src="asset/img/undraw_profile.svg">
                </a>
                <!-- Dropdown - User Information -->
                <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in" aria-labelledby="userDropdown">
                    <div class="dropdown-divider"></div>
                    <a class="dropdown-item" href="#" data-toggle="modal" data-target="#logoutModal">
                        <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                        Logout
                    </a>
                </div>
            </li>

        </ul>

    </nav>
    <!-- End of Topbar -->

    <!-- Begin Page Content -->

    <!-- /.container-fluid -->
    <?php
    if ($_GET['page'] == '' || $_GET['page'] == 'dashboard') {
        include "page/dashboard/dashboard.php";
    }else if ($_GET['page'] == 'dashboard_tws'){
        include "page/dashboard/dashboard_tws.php";
    }else if ($_GET['page'] == 'dashboard_fcp'){
        include "page/dashboard/dashboard_fcp.php";
    }
    //Master User
    else if ($_GET['page'] == 'master_user') {
        include "page/master_user/master_user.php";
    } else if ($_GET['page'] == 'add_user') {
        include "page/master_user/add_user.php";
    } else if ($_GET['page'] == 'delete_user') {
        include "page/master_user/delete_user.php";
    } else if ($_GET['page'] == 'edit_user') {
        include "page/master_user/edit_user.php";
    } 
    //Master Produk
    else if ($_GET['page'] == 'master_produk') {
        include "page/master_produk/master_produk.php";
    }else if ($_GET['page'] == 'add_produk'){
        include "page/master_produk/add_produk.php";
    }else if($_GET['page'] == 'delete_produk'){
        include "page/master_produk/delete_produk.php";
    }else if($_GET['page'] == 'edit_produk'){
        include "page/master_produk/edit_produk.php";
    }
    //Master Loop
    else if ($_GET['page'] == 'master_loop'){
        include "page/master_loop/master_loop.php";
    }else if($_GET['page'] == 'add_loop'){
        include "page/master_loop/add_loop.php";
    }else if($_GET['page'] == 'delete_loop'){
        include "page/master_loop/delete_loop.php";
    }else if($_GET['page'] == 'edit_loop'){
        include "page/master_loop/edit_loop.php";
    }
    else if($_GET['page'] == 'master_brand'){
        include "page/master_brand/master_brand.php";
    }else if($_GET['page'] == 'add_brand'){
        include "page/master_brand/add_brand.php";
    }else if($_GET['page'] == 'delete_brand'){
        include "page/master_brand/delete_brand.php";
    }else if($_GET['page'] == 'edit_brand'){
        include "page/master_brand/edit_brand.php";
    }
    //SA PC
    else if($_GET['page'] == 'index_sa_cr'){
        include "page/sa_pc/index_pc.php";
    }else if($_GET['page'] == 'add_pc'){
        include "page/sa_pc/add_pc.php";
    }else if($_GET['page'] == 'delete_pc'){
        include "page/sa_pc/delete_pc.php";
    }else if($_GET['page'] == 'edit_pc'){
        include "page/sa_pc/edit_pc.php";
    }else if($_GET['page'] == 'barcode_pc'){
        include "page/sa_pc/barcode_pc.php";
    }else if($_GET['page'] == 'barcode_form'){
        include "page/sa_pc/barcode_form.php";
    }
    //SA PC Detail
    else if($_GET['page'] == 'index_detail_pc'){
        include "page/sa_pc_detail/index_detail_pc.php";
    }else if($_GET['page'] == 'add_detail_pc'){
        include "page/sa_pc_detail/add_detail_pc.php";
    }else if($_GET['page'] == 'delete_detail_pc'){
        include "page/sa_pc_detail/delete_detail_pc.php";
    }else if($_GET['page'] == 'edit_detail_pc'){
        include "page/sa_pc_detail/edit_detail_pc.php";
    }
    //SA TS
    else if($_GET['page'] == 'index_detail_ts'){
        include "page/sa_ts_detail/index_detail_ts.php";
    }else if($_GET['page'] == 'add_detail_ts'){
        include "page/sa_ts_detail/add_detail_ts.php";
    }else if($_GET['page'] == 'delete_detail_ts'){
        include "page/sa_ts_detail/delete_detail_ts.php";
    }else if($_GET['page'] == 'edit_detail_ts'){
        include "page/sa_ts_detail/edit_detail_ts.php";
    }
    //CR TWS
    else if($_GET['page'] == 'index_detail_tws'){
        include "page/cr_tws_detail/index_detail_tws.php";
    }else if($_GET['page'] == 'add_detail_tws'){
        include "page/cr_tws_detail/add_detail_tws.php";
    }else if($_GET['page'] == 'delete_detail_tws'){
        include "page/cr_tws_detail/delete_detail_tws.php";
    }else if($_GET['page'] == 'edit_detail_tws'){
        include "page/cr_tws_detail/edit_detail_tws.php";
    }
    //CR FCP
    else if($_GET['page'] == 'index_detail_fcp'){
        include "page/cr_fcp_detail/index_detail_fcp.php";
    }else if($_GET['page'] == 'add_detail_fcp'){
        include "page/cr_fcp_detail/add_detail_fcp.php";
    }else if($_GET['page'] == 'delete_detail_fcp'){
        include "page/cr_fcp_detail/delete_detail_fcp.php";
    }else if($_GET['page'] == 'edit_detail_fcp'){
        include "page/cr_fcp_detail/edit_detail_fcp.php";
    }
    //Summary Report
    else if ($_GET['page'] == 'index_report'){
        include "page/summary_report/index_report.php";
    }
    else if ($_GET['page'] == 'detail_report'){
        include "page/summary_report/detail_report.php";
    }else if ($_GET['page']  == 'report_FCP'){
        include "page/summary_report/report_fcp.php";
    }else if($_GET['page'] == 'report_TWS.5.6' || $_GET['page'] == 'report_TWS.7.2'){
        include "page/summary_report/report_tws.php";
    }else if($_GET['page'] == 'report_PC32' || $_GET['page'] == 'report_PC14' ||$_GET['page'] == 'report_Cassava' ){
        include "page/summary_report/report_pc.php";
    }else if($_GET['page'] == 'report_TS'){
        include "page/summary_report/report_ts.php";
    }
    ?>

</div>