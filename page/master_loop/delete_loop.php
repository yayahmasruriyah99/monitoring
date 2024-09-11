<?php
$loop = $_GET['loop'];

$queryDelete = pg_query($dbconn, "DELETE FROM tbl_loop WHERE loop= $loop");
if ($queryDelete) {

?>
    <script>
        alert("username <?= $loop ?> berhasil di hapus ");
        window.location.href = "index.php?page=master_loop";
    </script>
<?php } ?>