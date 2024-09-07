<?php
$id = $_GET['id'];

$queryselect = pg_query($dbconn, "SELECT * FROM tbl_user WHERE username = $id");
$data = pg_fetch_assoc($queryselect);
?>
<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary ">
            Edit Master User
        </h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <!-- Kolom Kiri -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama :</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $data['nama'] ?>">
                        </div>
                        <div class="mb-3">
                            <label for="regu" class="form-label">Regu :</label>
                            <select class="form-control" name="regu" id="regu">
                                <option>Open this select menu</option>
                                <option <?php if ($data['regu'] == 'A') {
                                            echo "selected";
                                        } ?> value="A">A</option>
                                <option <?php if ($data['regu'] == 'B') {
                                            echo "selected";
                                        } ?> value="B">B</option>
                                <option <?php if ($data['regu'] == 'C') {
                                            echo "selected";
                                        } ?> value="C">C</option>
                                <option <?php if ($data['regu'] == 'D') {echo "selected";}?> value="D">D</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="plant" class="form-label">Plant :</label>
                            <select class="form-control" id="plant" name="plant">
                                <option>Open this select menu</option>
                                <option <?php if ($data['plant'] == '1402'){echo "selected";} ?> value="1402">1402</option>
                                <option <?php if ($data['plant'] == '1403'){echo "selected";} ?> value="1403">1403</option>
                                <option <?php if ($data['plant'] == '1405'){echo "selected";} ?> value="1405">1405</option>
                            </select>
                        </div>
                    </div>
                    <!-- Kolom Kanan -->
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK :</label>
                            <input type="text" class="form-control" id="nik" name="nik" value="<?= $data['nik'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="username" class="form-label">Username :</label>
                            <input type="number" class="form-control" id="username" name="username" value="<?= $data['username'] ?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="exampleInputPassword1" class="form-label">Password :</label>
                            <input type="password" class="form-control" id="exampleInputPassword1" name="password" value="<?= $data['password'] ?>">
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

<?php
$nama = $_POST['nama'];
$username = $_POST['username'];
$password = $_POST['password'];
$regu = $_POST['regu'];
$plant = $_POST['plant'];
$nik = $_POST['nik'];
$submit = $_POST['submit'];

if (isset($submit)) {

    $queryUpdate = pg_query($dbconn, "UPDATE tbl_user SET nama='$nama', password='$password', regu='$regu', plant='$plant'
	WHERE username=$id;");

    if ($queryUpdate) {
?>
        <script>
            alert('Update Data Berhasil');
            window.location.href = "?page=master_user";
        </script>
    <?php
    } else {
    ?>
        <script>
            alert('Update Data Gagal');
            window.location.href = "?page=master_user";
        </script>
<?php
    }
}

?>