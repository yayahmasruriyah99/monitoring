<?php
// Aktifkan error reporting untuk memeriksa kesalahan
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

include "koneksi.php";

// Pastikan koneksi ke database berhasil
if (!$dbconn) {
    die("Connection failed: " . pg_last_error());
}

$username = $_POST['username'];
$password = $_POST['password'];
$shift  = $_POST['shift'];
$regu = $_POST['regu'];

// Menggunakan prepared statements untuk menghindari SQL Injection
$query = "SELECT * FROM tbl_user WHERE username = $1";
$result = pg_prepare($dbconn, "my_query", $query);

if (!$result) {
    die("Query preparation failed: " . pg_last_error());
}

$result = pg_execute($dbconn, "my_query", array($username));
if (!$result) {
    die("Query execution failed: " . pg_last_error());
}

$fetch = pg_fetch_assoc($result);

// Cek apakah user ditemukan
if ($fetch) {
    // Verifikasi password
    // Jika Anda menyimpan password dalam bentuk plain text (tidak disarankan), gunakan perbandingan langsung.
    // Namun, jika Anda menyimpan password dalam bentuk hash, gunakan password_verify()
    
    // Misal: password_verify($password, $fetch['password']); jika password tersimpan sebagai hash
    if ($password === $fetch['password']) {
        // Jika password benar, mulai session dan set login
        session_start();
        $_SESSION['login'] = true;
        $_SESSION['nama']  = $fetch['nama'];
        $_SESSION['shift'] = $shift;
        $_SESSION['regu'] = $regu;
        
        // Redirect ke halaman utama
        header("Location: /monitoring_sa/index.php");
        exit();
    } else {
        // Jika password salah
        header("Location: login.php?error=1");
        exit();
    }
} else {
    // Jika user tidak ditemukan
    header("Location: login.php?error=1");
    exit();
}

pg_close($dbconn);
?>
