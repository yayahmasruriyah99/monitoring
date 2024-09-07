<?php
$id = $_GET['id'];

$queryDelete = pg_query($dbconn, "DELETE FROM tbl_user WHERE username= $id");
if ($queryDelete) {

?>
    <script>
        alert("username <?= $id ?> berhasil di hapus ");
        window.location.href = "index.php?page=master_user";
    </script>
<?php } ?>