<?php
$host = 'localhost';        // Ganti dengan host database Anda, biasanya 'localhost' jika berjalan di mesin lokal
$dbname = 'db_monitoring_sa';
$port = '5432'; // Ganti dengan nama database Anda
$user = 'postgres';    // Ganti dengan username PostgreSQL Anda
$password = 'Yayah@12345';

$connection_string = "host=$host port=$port dbname=$dbname user=$user password=$password";
$dbconn = pg_connect($connection_string);
if (!$dbconn) {
    die("Error connecting to database: " . pg_last_error());
}
