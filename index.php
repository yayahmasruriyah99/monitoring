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

    <script>
    var idleTime = 0;

    // Fungsi untuk me-reload halaman
    function reloadPage() {
        window.location.reload();
    }

    // Reset waktu idle setiap kali ada aktivitas pengguna
    function resetIdleTime() {
        idleTime = 0;
    }

    // Memantau aktivitas pengguna (gerakan mouse, klik, atau ketikan)
    window.onload = function() {
        window.addEventListener('mousemove', resetIdleTime);
        window.addEventListener('keypress', resetIdleTime);
        window.addEventListener('click', resetIdleTime);
    }

    // Setiap 1 menit, cek apakah pengguna sudah idle selama 30 menit
    setInterval(function() {
        idleTime += 1; // Tambah waktu idle setiap menit
        if (idleTime >= 30) { // Jika sudah 30 menit
            reloadPage(); // Reload halaman
        }
    }, 60000); // 1 menit = 60000 milidetik
</script>


        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->

</body>

</html>