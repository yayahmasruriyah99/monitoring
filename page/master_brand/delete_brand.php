<?php
$id = $_GET['id'];

$queryDelete = pg_query($dbconn, "DELETE FROM tbl_brand WHERE id= $id");
if ($queryDelete) {

?>
    <script>
        alert("username <?= $id ?> berhasil di hapus ");
        window.location.href = "index.php?page=master_brand";
    </script>
<?php } ?>