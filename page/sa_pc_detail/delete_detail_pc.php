<?php
$id = $_GET['id'];
$id_sa = $_GET['id_sa'];
$id_produk = $_GET['id_produk'];
$loop = $_GET['loop'];


$queryDelete = pg_query($dbconn, "DELETE FROM tbl_sa_pc_detail WHERE id = $id");


if($queryDelete){
    ?>
    <script>
        alert("Sampel Ke <?= $data['sampel']?> berhasil di hapus")
        window.location.href = "?page=index_detail_pc&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>&loop=<?=$loop?>";
    </script>
    <?php
}
?>