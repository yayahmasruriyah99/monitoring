<?php
$id = $_GET['id'];

$queryselect = pg_query($dbconn, "SELECT * FROM tbl_brand WHERE id = $id");
$data = pg_fetch_assoc($queryselect);
?>
<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary ">
            Master Brand
        </h3>
        <div class="card-body">
            <form method="post">
                    <!-- Kolom Kiri -->
                    <div class="mb-3">
                            <label for="id">ID :</label>
                            <input type="number" class="form-control" id="id" name="id" required value="<?=$data['id']?>">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand :</label>
                            <input type="text" class="form-control" id="brand" name="brand" value="<?=$data['brand']?>">
                        </div>
                        
                    <!-- Kolom Kanan -->
                        <div class="mb-3">
                            <label for="rasa" class="form-label">Rasa :</label>
                            <input type="text" class="form-control" id="rasa" name="rasa" value="<?=$data['rasa']?>">
                        </div>
                        <div class="mb-3">
                            <label for="seasoning" class="form-label">Sesasoning :</label>
                            <input type="text" class="form-control" id="seasoning" name="seasoning" value="<?=$data['seasoning']?>">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                
            </form>
        </div>
    </div>
</div>
<script src="asset/https/add_pc/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#nik").on('input', function() {
            var data = $(this).val();
            $("#username").val(data);
        });
    });
</script>

<?php
@$brand = $_POST['brand'];
@$rasa = $_POST['rasa'];
@$seasoning = $_POST['seasoning'];
@$id = $_POST['id'];
@$submit = $_POST['submit'];

if (isset($submit)) {

    $queryUpdate = pg_query($dbconn, "UPDATE tbl_brand SET brand='$brand', rasa='$rasa', seasoning='$seasoning'
	WHERE id=$id;");

    if ($queryUpdate) {
?>
        <script>
            alert('Add Data Berhasil');
            window.location.href = "?page=master_brand";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Add Data Gagal');
            window.location.href = "?page=master_brand";
        </script>
<?php
    }
}

?>