<?php
    $tanggal_start = $_POST['tanggal_start'];
    $tanggal_end = $_POST['tanggal_end'];
    $shift = $_POST['shift'];
    $line           = $_POST['line'];



?>
<script>
    window.location.href="?page=report_<?=$line?>&tanggal_start=<?=$tanggal_start?>&tanggal_end=<?=$tanggal_end?>&shift=<?=$shift?>";
</script>