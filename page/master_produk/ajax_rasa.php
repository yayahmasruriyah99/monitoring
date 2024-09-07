  
<?php
include "../../koneksi.php";
$rasa = $_POST['rasa'];
$querySelect = pg_query($dbconn, "SELECT * FROM tbl_brand WHERE rasa='$rasa'");
while($data = pg_fetch_assoc($querySelect)){
    ?>
    <?=$data['seasoning']?>
<?php
}
?>