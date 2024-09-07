  
<?php
include "../../koneksi.php";
$brand = $_POST['brand'];
$querySelect = pg_query($dbconn, "SELECT * FROM tbl_brand WHERE brand='$brand'");
while($data = pg_fetch_assoc($querySelect)){
    ?>
    <option value="<?=$data['rasa']?>"><?=$data['rasa']?></option>
<?php
}
?>