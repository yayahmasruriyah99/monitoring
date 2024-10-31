<?php
$id = $_GET['id'];
$id_produk = $_GET['id_produk'];
$loop = $_GET['loop'];

$querySelect = pg_query($dbconn, "SELECT * FROM tbl_produk WHERE kode=$id_produk");
$data = pg_fetch_assoc($querySelect);



$querySelect = pg_query($dbconn, "SELECT * FROM tbl_sa_pc_detail WHERE id=$id");
$select = pg_fetch_assoc($querySelect);
?>

<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary">Add Detail Seasoning Applied <?=$data['nama_produk']?></h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?=$select['tanggal']?>">
                        </div>
                        <div class="mb-3">
                            <label for="waktu">Time :</label>
                            <input type="time" class="form-control" id="waktu" name="waktu" required value="<?=$select['waktu']?>">
                        </div>
                        <div>
                            <label for="waktu">Shift :</label>
                            <input type="text" class="form-control" id="shift" name="shift" value="<?=$select['shift']?>" required readonly>
                        </div>
                        <div class="mb-3">
                            <label for="line">Line :</label>
                            <input type="text" class="form-control" id="line" name="line" required value="<?=$select['line']?>" readonly>
                        </div>
                        <div class="mb-3" hidden>
                            <label for="loop">Loop :</label>
                            <input type="number" class="form-control" id="loop" name="loop" required value="<?=$select['loop']?>">
                        </div>
                        <div class="mb-3">
                            <label for="sampel">Sampel Ke - :</label>
                            <input type="number" class="form-control" id="sampel" name="sampel" value="<?=$select['sampel']?>" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="seasoning_nacl">Seasoning Nacl :</label>
                            <input type="number" step='any' class="form-control" id="seasoning_nacl" name="seasoning_nacl" value="<?=$select['seasoning_nacl']?>" oninput="calculate()" required>
                        </div>
                        <div class="mb-3">
                            <label for="base_nacl">Base Nacl :</label>
                            <input type="number" step='any' class="form-control" id="base_nacl" name="base_nacl" value="<?=$select['base_nacl']?>" oninput="calculate()" required>
                        </div>
                        
                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3" hidden>
                            <label for="id_sa">ID SA :</label>
                            <input type="number" step='any' class="form-control" id="id_sa" name="id_sa" value="<?=$select['id_sa']?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="fg_nacl">FG Nacl :</label>
                            <input type="number" step='any' class="form-control" id="fg_nacl" name="fg_nacl" value="<?=$select['fg_nacl']?>" oninput="calculate()" required>
                        </div>
                        <div class="mb-3">
                            <label for="nacl">Nacl (FG - Base) :</label>
                            <input type="number" step='any' class="form-control" name="nacl" id="nacl" readonly required value="<?=$select['nacl']?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="sa">Seasoning Applied (%) :</label>
                            <input type="text" step='any' class="form-control" id="sa" name="sa" readonly required value="<?=$select['sa']?>">
                        </div>
                        <div class="mb-3">
                            <label for="standar">Standard PQS / PLS  :</label>
                            <input type="text" step='any' class="form-control" id="standar" name="standar" value="<?= $data['standar']?>" readonly required >
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
                            <input type="text" class="form-control" id="result" name="result"  oninput="calculate()" value="<?=$select['result']?>" readonly>
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
        

        // Hitung nilai C sebagai A + B
        var nacl = fg_nacl - base_nacl;
        //document.getElementById('nacl').value = nacl;
        document.getElementById('nacl').value = nacl    .toFixed(3);
        // Hitung nilai D sebagai C + A
        var sa = nacl/(seasoning_nacl - base_nacl)*100;
         // Validasi apakah sa adalah NaN atau Infinity
        if (isNaN(sa) || !isFinite(sa)) {
            alert("Error: The value of sa is not valid (NaN or Infinity). Please check your input.");
            document.getElementById('sa').value = "Error";
            return;
        }
        //document.getElementById('sa').value = sa;
        document.getElementById('sa').value = sa.toFixed(1);

        // Get result based on condition
        var yellowMin = <?= json_encode($data['yellow_min'] ?? 0) ?>; // Ensure yellow_min is defined
        var yellowMax = <?= json_encode($data['yellow_max'] ?? 100) ?>; 

        var greenMin = <?= json_encode($data['green_min'] ?? 0) ?>; // Ensure yellow_min is defined
        var greenMax = <?= json_encode($data['green_max'] ?? 100) ?>; 
        var result = document.getElementById("result");
         if ((sa > yellowMin && sa <= greenMin) || (sa > greenMax && sa <= yellowMax)) { // Correct conditions for yellow range
            result.value = "yellow";
        } else if (sa > greenMin && sa < greenMax) {  // Use <= to include upper bound for green range
            result.value = "green";
        } else {
            result.value = "red";
        }
    }
    
</script>

<?php



$waktu = $_POST['waktu'];
$fine_tune =  $_POST['fine_tune'];
$sampel =  $_POST['sampel'];
$seasoning_nacl =  $_POST['seasoning_nacl'];
$base_nacl =  $_POST['base_nacl'];
$fg_nacl =  $_POST['fg_nacl'];
$nacl =  $_POST['nacl'];
$sa =  $_POST['sa'];
$standar =  $_POST['standar'];
$status = $_POST['status'];
$id_sa = $_POST['id_sa'];
$tanggal = $_POST['tanggal'];
$loop = $_POST['loop'];
$line = $_POST['line'];
$result = $_POST['result'];
$shift = $_POST['shift'];
$submit = $_POST['submit'];

if(isset($submit)){
    $queryInsert = pg_query($dbconn, "UPDATE tbl_sa_pc_detail
	SET sampel=$sampel, seasoning_nacl=$seasoning_nacl, base_nacl=$base_nacl, fg_nacl=$fg_nacl, nacl=$nacl, sa=$sa, status='$status',  id_sa=$id_sa, waktu='$waktu', standar='$standar', result='$result', loop='$loop', tanggal='$tanggal', line='$line', shift='$shift'
	WHERE id=$id;");
    
    if($queryInsert){
?>
    <script>
        alert("Add Data Berhhasil");
        window.location.href = "?page=index_detail_pc&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>&loop=<?=$loop?>";
    </script>
    <?php
    }else {
        ?>
        <script>
        alert("Add Data Berhhasil");
        window.location.href = "?page=index_detail_pc&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>&loop=<?=$loop?>";
    </script>
       <?php  
    }
}
