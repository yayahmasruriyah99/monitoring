<?php
$id = $_GET['id'];
$id_produk = $_GET['id_produk'];

$querySelect = pg_query($dbconn, "SELECT * FROM tbl_produk WHERE kode=$id_produk");
$data = pg_fetch_assoc($querySelect);



$querySelect = pg_query($dbconn, "SELECT * FROM tbl_cr_tws_detail WHERE id=$id");
$select = pg_fetch_assoc($querySelect);

$time_value = !empty($select['waktu']) ? date('H:i', strtotime($select['waktu'])) : '';
?>

<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary">Edit Detail Coating Ratio <?=$data['nama_produk']?></h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?=$select['tanggal']?>" readonly>
                        </div>
                        <div class="mb-3">
                            <label for="waktu">Time :</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" value="<?=$time_value?>" required>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="line">Line :</label>
                            <input type="text" class="form-control" id="line" name="line" required value="<?=$select['line']?>" readonly>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="loop">Loop :</label>
                            <input type="number" class="form-control" id="loop" name="loop" required value="<?=$select['loop']?>">
                        </div> 
                    
                        <div class="mb-3">
                            <label for="sampel">Sampel Ke - :</label>
                            <input type="number" class="form-control" id="sampel" name="sampel" value="<?= $select['sampel']?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="ts">Seasoning in Total Slurry :</label>
                            <input type="number" class="form-control" id="ts" name="ts" value="<?= $select['ts']?>" oninput="calculate()" required>
                        </div>

                        <div class="mb-3">
                            <label for="seasoning_nacl">Seasoning Nacl :</label>
                            <input type="number" value="<?php echo $select['seasoning_nacl']?>" step='any' class="form-control" id="seasoning_nacl" name="seasoning_nacl" oninput="calculate()" required>
                        </div>
                        <div class="mb-3">
                            <label for="base_nacl">Base Nacl :</label>
                            <input type="number" step='any'  class="form-control" id="base_nacl" name="base_nacl" value="<?=$select['base_nacl']?>" oninput="calculate()" required>
                        </div>
                        
                        
                    </div>
                    <div class="col-md-6">
                        
                        <div class="mb-3" hidden>
                            <label for="id_sa">ID SA :</label>
                            <input type="number" step='any' class="form-control" id="id_sa" name="id_sa" value="<?=$select['id_sa']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="fg_nacl">FG Nacl :</label>
                            <input type="number" step='any'  class="form-control" id="fg_nacl" name="fg_nacl" oninput="calculate()" value="<?=$select['fg_nacl']?>" required>
                        </div>
                        
                        <div class="mb-3">
                            <label for="nacl">Nacl (%) :</label>
                            <input type="text" step='any' class="form-control"  id="nacl" name="nacl" value="<?=$select['nacl']?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="cr">Coating Ratio (%) :</label>
                            <input type="text" step='any' class="form-control"  id="cr" name="cr" value="<?=$select['cr']?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="standar">Standard PQS / PLS  :</label>
                            <input type="text" step='any' class="form-control" id="standar" name="standar" value="<?= $select['standar']?>" readonly required >
                        </div>
                        
                        <div class="mb-3">
                            <label for="status">Status :</label>
                            <select class="form-control" name="status" id="status">
                                <option>Open This Select Menu</option>
                                <option <?php if($select['status'] == 'Release'){echo "selected";}?> value="Release">Release</option>
                                <option <?php if($select['status'] == 'Reject'){echo "selected";}?> value="Reject">Reject</option>
                                
                            </select>  
                        </div>
                        <div class="mb-3">
                            <label for="result">Result :</label>
                            <input type="text" class="form-control" id="result" name="result"  oninput="calculate()" value="<?=$select['result']?>" required>
                        </div>
                        
                            <div class="d-flex justify-content-end">
                                <button name="submit" type="submit" class="btn btn-primary">Submit</button>
                            </div>
                    </div >
                </div>
            </form>
        </div>
    </div>

</div>
<script>
    function calculate() {
        // Ambil nilai dari field A dan B
        var seasoning_nacl = parseFloat(document.getElementById('seasoning_nacl').value) || 0;
        var fg_nacl = parseFloat(document.getElementById('fg_nacl').value) || 0;
        var base_nacl = parseFloat(document.getElementById('base_nacl').value) || 0;
        var ts = parseFloat(document.getElementById('ts').value) || 0;
        

        // Hitung nilai D sebagai C + A
        var nacl = fg_nacl - base_nacl;
        var cr = (nacl * 100) / (((ts/100) * seasoning_nacl) - nacl);
         // Validasi apakah sa adalah NaN atau Infinity
        if (isNaN(nacl) || !isFinite(nacl)) {
            alert("Error: The value of sa is not valid (NaN or Infinity). Please check your input.");
            document.getElementById('nacl').value = "Error";
            return;
        }
        if (isNaN(cr) || !isFinite(cr)) {
            alert("Error: The value of cr is not valid (NaN or Infinity). Please check your input.");
            document.getElementById('cr').value = "Error";
            return;
        }
        //document.getElementById('sa').value = sa;
        document.getElementById('nacl').value = nacl.toFixed(3);
        document.getElementById('cr').value = cr.toFixed(3);

        // Get result based on condition
        var yellowMin = <?= json_encode($data['yellow_min'] ?? 0) ?>; // Ensure yellow_min is defined
        var yellowMax = <?= json_encode($data['yellow_max'] ?? 100) ?>; 

        var greenMin = <?= json_encode($data['green_min'] ?? 0) ?>; // Ensure yellow_min is defined
        var greenMax = <?= json_encode($data['green_max'] ?? 100) ?>; 
        var result = document.getElementById("result");
         if ((nacl > yellowMin && nacl <= greenMin) || (nacl > greenMax && nacl <= yellowMax)) { // Correct conditions for yellow range
            result.value = "yellow";
        } else if (nacl > greenMin && nacl < greenMax) {  // Use <= to include upper bound for green range
            result.value = "green";
        } else {
            result.value = "red";
        }
    }
    
</script>

<?php


$waktu = $_POST['waktu'];
$sampel =  $_POST['sampel'];
$seasoning_nacl =  $_POST['seasoning_nacl'];
$fg_nacl =  $_POST['fg_nacl'];
$base_nacl =  $_POST['base_nacl'];
$ts = $_POST['ts'];
$nacl = $_POST['nacl'];
$cr = $_POST['cr'];
$standar =  $_POST['standar'];
$status = $_POST['status'];
$id_sa = $_POST['id_sa'];
$result = $_POST['result'];
$tanggal = $_POST['tanggal'];
$loop = $_POST['loop'];
$line = $_POST['line'];
$submit = $_POST['submit'];

if(isset($submit)){
    $queryUpdate = pg_query($dbconn, "UPDATE tbl_cr_tws_detail
	SET sampel=$sampel, ts=$ts, seasoning_nacl=$seasoning_nacl, base_nacl=$base_nacl, fg_nacl=$fg_nacl, nacl=$nacl, cr=$cr, status='$status', id_sa=$id_sa, waktu='$waktu', standar='$standar', result='$result', loop=$loop, tanggal='$tanggal', line='$line'
	WHERE id=$id;");
    
    if($queryUpdate){
?>
    <script>
        alert("Add Data Berhhasil");
        window.location.href = "?page=index_detail_tws&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>";
    </script>
    <?php
    }else {
    ?>
    <script>
        alert("Add Data Gagal");
        window.location.href = "?page=index_detail_tws&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>";
    </script>
    <?php    
    }
}
