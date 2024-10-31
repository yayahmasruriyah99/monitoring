<?php
$id_sa = $_GET['id_sa'];
$id_produk = $_GET['id_produk'];
$loop = $_GET['loop'];

$queryLatestSampel = pg_query($dbconn, "SELECT MAX(sampel) as latest_sampel FROM tbl_cr_fcp_detail WHERE id_sa=$id_sa");
$latestSampelRow = pg_fetch_assoc($queryLatestSampel);
$latestSampel = $latestSampelRow['latest_sampel'];

$newSampel = $latestSampel + 1;
session_start();
$tanggal_sekarang = date('Y-m-d');
$shift = $_SESSION['shift'];
//ambil seasoning nacl 
$queryLastNacl = pg_query($dbconn,"SELECT tbl_sa_pc.*, tbl_cr_fcp_detail.* FROM tbl_sa_pc, tbl_cr_fcp_detail WHERE tbl_sa_pc.id=tbl_cr_fcp_detail.id_sa AND tbl_sa_pc.tanggal='$tanggal_sekarang' AND tbl_sa_pc.shift='$shift'AND tbl_sa_pc.loop='$loop' ORDER BY tbl_cr_fcp_detail.sampel DESC");

 
$dataLastNacl = pg_fetch_assoc($queryLastNacl);
$lastNacl = $dataLastNacl['seasoning_nacl']; 
$lastTs = $dataLastNacl['ts'];
//echo $lastNacl;

$querySelect = pg_query($dbconn, "SELECT * FROM tbl_produk WHERE kode=$id_produk");
$data = pg_fetch_assoc($querySelect);

$queryPc = pg_query($dbconn, "SELECT * FROM tbl_sa_pc WHERE id=$id_sa");
$detailPc= pg_fetch_assoc($queryPc);
?>

<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary">Add Detail Coating Ratio <?=$data['nama_produk']?></h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?=$detailPc['tanggal']?>" readonly>
                        </div>
                        <div>
                            <label for="waktu">Shift :</label>
                            <input type="text" class="form-control" id="shift" name="shift" value="<?=$_SESSION['shift']?>" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="waktu">Time :</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" required>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="line">Line :</label>
                            <input type="text" class="form-control" id="line" name="line" required value="<?=$detailPc['line']?>" readonly>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="loop">Loop :</label>
                            <input type="number" class="form-control" id="loop" name="loop" required value="<?=$detailPc['loop']?>">
                        </div> 
                    
                        <div class="mb-3">
                            <label for="sampel">Sampel Ke - :</label>
                            <input type="number" class="form-control" id="sampel" name="sampel" value="<?= $newSampel?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="ts">Seasoning in Total Slurry :</label>
                            <input type="number" class="form-control" id="ts" name="ts" value="<?= $data['slury'] ?>" step="any" oninput="calculate()" required>
                        </div>

                        
                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="seasoning_nacl">Seasoning Nacl :</label>
                            <input type="number" value="<?php echo $lastNacl?>" step='any' class="form-control" id="seasoning_nacl" name="seasoning_nacl" oninput="calculate()" required>
                        </div>
                        <div class="mb-3">
                            <label for="nacl">Nacl (%) :</label>
                            <input type="number" step='any' class="form-control"  id="nacl" name="nacl" oninput="calculate()" required>
                        </div>
                        <div class="mb-3">
                            <label for="cr">Coating Ratio (%) :</label>
                            <input type="number" step='any' class="form-control"  id="cr" name="cr" readonly required>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="standar">Standard PQS / PLS  :</label>
                            <input type="text" step='any' class="form-control" id="standar" name="standar" value="<?= $data['standar']?>" readonly required >
                        </div>
                        
                        <div class="mb-3">
                            <label for="status">Status :</label>
                            <select class="form-control" name="status" id="status" required>
                                <option value="">Open This Select Menu</option>
                                <option value="Release">Release</option>
                                <option value="Reject">Reject</option>
                            </select>  
                        </div>
                        <div class="mb-3">
                            <label for="result">Result :</label>
                            <input type="text" class="form-control" id="result" name="result"  oninput="calculate()" readonly required>
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
        var nacl = parseFloat(document.getElementById('nacl').value) || 0;
        var ts = parseFloat(document.getElementById('ts').value) || 0;
        

        // Hitung nilai D sebagai C + A
        var tsBagi = ts/100;
        var cr = (nacl * 100) / (((tsBagi) * seasoning_nacl) - nacl);
         // Validasi apakah sa adalah NaN atau Infinity
        //document.getElementById('sa').value = sa;
        document.getElementById('cr').value = cr.toFixed(3);

        // Get result based on condition
        var yellowMin = <?= json_encode($data['yellow_min'] ?? 0) ?>; // Ensure yellow_min is defined
        var yellowMax = <?= json_encode($data['yellow_max'] ?? 100) ?>; 

        var greenMin = <?= json_encode($data['green_min'] ?? 0) ?>; // Ensure yellow_min is defined
        var greenMax = <?= json_encode($data['green_max'] ?? 100) ?>; 
        var result = document.getElementById("result");
         if ((cr > yellowMin && cr <= greenMin) || (cr > greenMax && cr <= yellowMax)) { // Correct conditions for yellow range
            result.value = "yellow";
        } else if (cr > greenMin && cr < greenMax) {  // Use <= to include upper bound for green range
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
$ts = $_POST['ts'];
$nacl = $_POST['nacl'];
$cr = $_POST['cr'];
$standar =  $_POST['standar'];
$status = $_POST['status'];
$id = $_POST['id'];
$result = $_POST['result'];
$tanggal = $_POST['tanggal'];
$loop = $_POST['loop'];
$line = $_POST['line'];
$shift = $_POST['shift'];
$submit = $_POST['submit'];

if(isset($submit)){
    $queryInsert = pg_query($dbconn, "INSERT INTO tbl_cr_fcp_detail(
	sampel, ts, seasoning_nacl, nacl, cr, status, id, id_sa, waktu, standar, result, loop, tanggal, line, shift)
	VALUES ($sampel, $ts, $seasoning_nacl, $nacl, $cr, '$status', DEFAULT, $id_sa, '$waktu', '$standar', '$result', $loop, '$tanggal', '$line', '$shift')");
    
    if($queryInsert){
        session_start();
        $_SESSION['seasoning_nacl'] = $seasoning_nacl;
?>
    <script>
        alert("Add Data Berhhasil");
        window.location.href = "?page=index_detail_fcp&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>&loop=<?=$loop?>";
    </script>
    <?php
    }else {
    ?>
    <script>
        alert("Add Data Gagal");
        window.location.href = "?page=index_detail_fcp&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>&loop=<?=$loop?>";
    </script>
    <?php    
    }
}
