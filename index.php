<?php
include "koneksi.php";
date_default_timezone_set("Asia/Jakarta");
session_start();
if ($_SESSION['login'] != "login") {
    header("Location: login.php");
    exit();
} else
    include "header.php";
?>

<body id="page-top">
    <!-- Page Wrapper -->
    <div id="wrapper">

        <?php include "sidebar.php" ?>

        <!-- Content Wrapper -->
        <div id="content-wrapper" class="d-flex flex-column">

            <?php
            include "topbar.php";

            include "footer.php";
            ?>

            <script>
        // Menghitung waktu 5 detik sebelum logout otomatis
            setTimeout(function() {
            // Redirect ke halaman logout.php setelah 5 detik
            window.location.href = 'logout.php';
        }, 3600000); // 5000 milidetik = 5 detik
    </script>

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->

</body>

</html>