<?php
// Memastikan koneksi ke database
include "koneksi.php";
error_reporting(0);
// Set zona waktu ke Jakarta
date_default_timezone_set("Asia/Jakarta");

// Memulai session
session_start();

// Debug session untuk memastikan login
// echo '<pre>';
// print_r($_SESSION); // Ini hanya untuk sementara debugging, hapus setelah selesai.
// echo '</pre>';
// exit();

// Cek apakah user sudah login atau belum
if (!isset($_SESSION['login']) || $_SESSION['login'] !== true) {
    // Jika user belum login, arahkan ke halaman login
    header("Location: login.php");
    exit();
}

// Jika sudah login, sertakan header
include "header.php";
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "sidebar.php"; ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <?php
            // Sertakan topbar dan footer
            include "topbar.php";
            include "footer.php";
            ?>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
</body>

</html>
