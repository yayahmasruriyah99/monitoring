<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary ">
            Master User
        </h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama">
                        </div>
                        <div class="mb-3">
                            <label for="regu" class="form-label">Regu :</label>
                            <select class="form-control" name="regu" id="regu">
                                <option selected>Open this select menu</option>
                                <option value="A">A</option>
                                <option value="B">B</option>
                                <option value="C">C</option>
                                <option value="D">D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="plant" class="form-label">Plant :</label>
                            <select class="form-control" id="plant" name="plant">
                                <option selected>Open this select menu</option>
                                <option value="1402">1402</option>
                                <option value="1403">1403</option>
                                <option value="1405">1405</option>
                            </select>
                        </div>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK :</label>
                            <input type="text" class="form-control" id="nik" name="nik">
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username :</label>
                            <input type="number" class="form-control" id="username" name="username" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password :</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password">
                        </div>
                        <div class="d-flex justify-content-end">
                            <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                        </div>
                    </div>
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
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$regu = $_POST['regu'];
$plant = $_POST['plant'];
$nik = $_POST['nik'];
$submit = $_POST['submit'];

if (isset($submit)) {

    $queryInsert = pg_query($dbconn, "INSERT INTO tbl_user(nama, username, password, regu, plant, nik) VALUES ('$nama', $username, '$password', '$regu', '$plant', $nik)");

    if ($queryInsert) {
?>
        <script>
            alert('Add Data Berhasil');
            window.location.href = "?page=master_user";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Add Data Gagal');
            window.location.href = "?page=master_user";
        </script>
<?php
    }
}

?>