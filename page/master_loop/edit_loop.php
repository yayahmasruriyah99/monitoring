<?php
$loop = $_GET['loop'];

$queryselect = pg_query($dbconn, "SELECT * FROM tbl_loop WHERE loop = $loop");
$data = pg_fetch_assoc($queryselect);
?>
<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary ">
            Master Loop
        </h3>
        <div class="card-body">
            <form method="post">
                
                        <div class="mb-3">
                            <label for="loop" class="form-label">loop :</label>
                            <input type="text" class="form-control" id="loop" name="loop" value="<?=$data['loop']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="line" class="form-label">Line :</label>
                            <input type="text" class="form-control" id="line" name="line" value="<?=$data['line']?>">
                        </div>
                   
                        <div class="mb-3">
                            <label for="bagian" class="form-label">Bagian :</label>
                            <input type="text" class="form-control" id="bagian" name="bagian" value="<?=$data['bagian']?>">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                
            </form>
        </div>
    </div>
</div>

<?php
$loop = $_POST['loop'];
$line = $_POST['line'];
$bagian = $_POST['bagian'];
$submit = $_POST['submit'];

if (isset($submit)) {

    $queryUpdate = pg_query($dbconn, "UPDATE tbl_loop SET line='$line', bagian='$bagian'
	WHERE loop=$loop;");

    if ($queryUpdate) {
?>
        <script>
            alert('Add Data Berhasil');
            window.location.href = "?page=master_loop";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Add Data Gagal');
            window.location.href = "?page=master_loop";
        </script>
<?php
    }
}

?>