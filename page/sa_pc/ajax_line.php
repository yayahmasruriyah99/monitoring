  
<?php
include "../../koneksi.php";
$line = $_POST['line'];
$querySelect = pg_query($dbconn, "SELECT * FROM tbl_loop WHERE line='$line' ORDER BY loop ASC");
while($data = pg_fetch_assoc($querySelect)){
    ?>
    <option value="<?=$data['loop']?>"><?=$data['loop']."-".$data['line']."-".$data['bagian']?></option>
<?php
}
?>