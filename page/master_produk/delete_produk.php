<?php
$id = $_GET['id'];

$queryDelete = pg_query($dbconn, "DELETE FROM tbl_produk WHERE kode=$id");
if($queryDelete){
    ?>
    <script>
        alert("Kode Produk <?=$id?> berhasil di hapus")
        window.location.href="index.php?page=master_produk";
    </script>
<?php
}
?>