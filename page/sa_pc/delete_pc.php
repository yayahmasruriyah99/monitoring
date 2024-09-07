<?php
$id = $_GET['id'];
$line = $_GET['line'];

$queryDelete = pg_query($dbconn, "DELETE FROM tbl_sa_pc WHERE id = $id");

if($line== "PC32"){
    $queryDeleteDetail = pg_query($dbconn, "DELETE FROM tbl_sa_pc_detail WHERE id_sa = $id");
}else if ($line == "TS"){
    $queryDeleteDetail = pg_query($dbconn, "DELETE FROM tbl_sa_ts_detail WHERE id_sa = $id");
}else if ($line == "TWS"){
    $queryDeleteDetail = pg_query($dbconn, "DELETE FROM tbl_cr_tws_detail WHERE id_sa = $id");
}
if ($queryDelete){
?>
<script>
    alert("username <?= $id?> berhasil di hapus");
    window.location.href = "index.php?page=index_sa_cr";
</script>
<?php
}
?>