<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary ">
            Master Brand
        </h3>
        <div class="card-body">
            <form method="post">
                    <!-- Kolom Kiri -->
                        <div class="mb-3">
                            <label for="id" class="form-label">ID :</label>
                            <input type="text" class="form-control" id="id" name="id">
                        </div>
                        <div class="mb-3">
                            <label for="brand" class="form-label">Brand :</label>
                            <input type="text" class="form-control" id="brand" name="brand">
                        </div>
                        
                    <!-- Kolom Kanan -->
                        <div class="mb-3">
                            <label for="rasa" class="form-label">Rasa :</label>
                            <input type="text" class="form-control" id="rasa" name="rasa">
                        </div>
                        <div class="mb-3">
                            <label for="seasoning" class="form-label">Sesasoning :</label>
                            <input type="text" class="form-control" id="seasoning" name="seasoning">
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

    $queryInsert = pg_query($dbconn, "INSERT INTO tbl_brand(brand, rasa, seasoning, id) VALUES ('$brand', '$rasa', '$seasoning', $id)");

    if ($queryInsert) {
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