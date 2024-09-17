<?php
// Aktifkan error reporting
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "koneksi.php";

// Memeriksa apakah koneksi ke database berhasil
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$shift  = $_POST['shift'];
$regu = $_POST['regu'];


// Menggunakan prepared statements untuk menghindari SQL Injection
$query = "SELECT * FROM tbl_user WHERE username=$1 AND password=$2";
//$data = pg_query($dbconn,$query);
//$data_result = pg_query($dbconn, "my_query", $query);

$result = pg_prepare($dbconn, "my_query", $query);

if (!$result) {
    die("Query preparation failed: " . pg_last_error());
}

$result = pg_execute($dbconn, "my_query", array($username, $password));
if (!$result) {
    die("Query execution failed: " . pg_last_error());
}
$fetch = pg_fetch_assoc($result);
$cek = pg_num_rows($result);

if ($cek > 0) {
    session_start();
    $_SESSION['login'] = 'login';
    $_SESSION['nama']  = $fetch['nama'];
    $_SESSION['shift'] = $shift;
    $_SESSION['regu'] = $regu;
    $_SESSION['role'] = $fetch['role'];
    
?>
    <script>
        alert('login berhasil');
        window.location.href = "index.php";
    </script>
<?php
} else {
?>
    <script>
        alert('login Gagal');
        window.location.href = "index.php";
    </script>
<?php
}

pg_close($dbconn);
?>