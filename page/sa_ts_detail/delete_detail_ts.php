<?php
$id = $_GET['id'];
$id_sa = $_GET['id_sa'];
$id_produk = $_GET['id_produk'];


$queryDelete = pg_query($dbconn, "DELETE FROM tbl_sa_ts_detail WHERE id = $id");

if($queryDelete){
    ?>
    <script>
        alert("Sampel Ke <?= $data['sampel']?> berhasil di hapus")
        window.location.href = "?page=index_detail_ts&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>";
    </script>
    <?php
}
?>