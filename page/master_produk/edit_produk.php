<?php
$id = $_GET['id'];

$querySelect = pg_query($dbconn, "SELECT * FROM tbl_produk WHERE kode=$id");
$data = pg_fetch_assoc($querySelect);
?>

<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary">Master Produk</h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?=$data['tanggal']?>">
                        </div>
                        <div class="mb-3">
                            <label for="kode">Kode Produk :</label>
                            <input type="number" class="form-control" id="kode" name="kode" required value="<?=$data['kode']?>">
                        </div>
                        <div class="mb-3">
                            <label for="brand">Brand :</label>
                            <select class="form-control" name="brand" id="brand" oninput="concatenate()" required value="<?=$data['brand']?>" onchange="clearSize()">
                                
                                <?php 
                                $querySelect1 = pg_query($dbconn, "SELECT brand FROM tbl_brand GROUP BY brand");
                                while($data1 = pg_fetch_assoc($querySelect1)){
                                    
                                ?>
                                    <option <?php if($data1['brand'] == $data['brand']){ echo "selected";} ?> value="<?=$data1['brand']?>"><?=$data1['brand']?></option>
                                <?php
                                }
                                ?>      
                            </select>  
                        </div>
                        <div class="mb-3">
                            <label for="rasa">Rasa :</label>
                            <select class="form-control" name="rasa" id="rasa" oninput="concatenate()" required>
                            <option value="<?=$data['rasa']?>"><?=$data['rasa']?></option>
                           </select>
                        </div>
                        <div class="mb-3">
                            <label for="size">Size :</label>
                            <input type="text" class="form-control" id="size" name="size" oninput="concatenate()" required value="<?=$data['size']?>">
                        </div>
                        <div class="mb-3">
                            <label for="seasoning">Seasoning :</label>
                            <input type="text" class="form-control" name="seasoning" id="seasoning" readonly required value="<?=$data['seasoning']?>">
                            
                        </div>
                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_produk">Nama Produk :</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" readonly required value="<?=$data['nama_produk']?>">
                        </div>
                        <div class="mb-3">
                            <label for="green_min">Standar Green Min :</label>
                            <input type="text" step='any' class="form-control" id="green_min" name="green_min" oninput="standars()" required value="<?=$data['green_min']?>">
                        </div>
                        <div class="mb-3">
                            <label for="green_max">Standar Green Max :</label>
                            <input type="text" step='any' class="form-control" id="green_max" name="green_max" oninput="standars()" required value="<?=$data['green_max']?>">
                        </div>
                        <div class="mb-3">
                            <label for="yellow_min">Standar Yellow Min :</label>
                            <input type="text" step='any' class="form-control" id="yellow_min" name="yellow_min" required value="<?=$data['yellow_min']?>">
                        </div>
                        <div class="mb-3">
                            <label for="yellow_max">Standar Yellow Max :</label>
                            <input type="text" step='any' class="form-control" id="yellow_max" name="yellow_max" required value="<?=$data['yellow_max']?>">
                        </div>
                        <div class="mb-3">
                            <label for="standar">Standar PQS :</label>
                            <input type="text" class="form-control" id="standar" name="standar" readonly oninput="standars()" required value="<?=$data['standar']?>">
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
        function concatenate() {
            // Ambil nilai dari field A dan B
            var brand = document.getElementById('brand').value;
            var rasa = document.getElementById('rasa').value;
            var size = document.getElementById('size').value;
            // Gabungkan nilai A dan B sebagai string
            
            var nama_produk = brand +"*"+ rasa+"*"+ size;
            document.getElementById('nama_produk').value = nama_produk;
            
        }

    function standars(){
        var green_min = document.getElementById('green_min').value;
        var green_max = document.getElementById('green_max').value;

        var standar = "("+green_min+"-"+green_max+")";
        document.getElementById('standar').value = standar;
    }

        $(document).ready(function(){
            $('#name').change(function(){
                var seasoning = $(this).val();
                $('#seasoning').val(seasoning);
            });
        });
    function clearSize() {
        document.getElementById('size').value = '';
    }
</script>

<script type="text/javascript" src="asset/https/add_produk/jquery.min.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
    // Ketika brand berubah
    $('#brand').change(function() { 
        var brand = $(this).val(); 
        
        // Kosongkan elemen seasoning
        $('#seasoning').empty(); 
        $('#nama_produk').val(''); // Pastikan input menjadi kosong
            $('#rasa').html('<option value="">Pilih Rasa</option>');
         
        
        // Lakukan AJAX request untuk mendapatkan rasa berdasarkan brand
        $.ajax({
            type: 'POST', 
            url: 'page/master_produk/ajax_brand.php', 
            data: 'brand=' + brand, 
            success: function(response) { 
                $('#rasa').html(response); 
            }
        });
    });

    // Ketika rasa berubah
   $('#rasa').change(function() { 
            var rasa = $(this).val(); 

            // Clear the product name
            $('#nama_produk').val('');

            // AJAX request to get seasoning based on rasa
            $.ajax({
                type: 'POST', 
                url: 'page/master_produk/ajax_rasa.php', 
                data: { rasa: rasa }, 
                success: function(response) { 
                    // Assuming response contains the seasoning data
                    $('#seasoning').val(response.trim()); // Set the seasoning input value
                }
            });
        });
});

 
</script>

<?php

$kode = $_POST['kode'];
$brand = $_POST['brand'];
$rasa = $_POST['rasa'];
$size = $_POST['size'];
$tanggal = $_POST['tanggal'];
$seasoning = $_POST['seasoning'];
$nama_produk = $_POST['nama_produk'];
$standar = $_POST['standar'];
$yellow_min = $_POST['yellow_min'];
$yellow_max = $_POST['yellow_max'];
$green_min = $_POST['green_min'];
$green_max = $_POST['green_max'];
$submit = $_POST['submit'];

if(isset($submit)){
    $queryUpdate = pg_query($dbconn, "UPDATE tbl_produk
	SET kode='$kode', brand='$brand', rasa='$rasa', size='$size', tanggal='$tanggal', seasoning='$seasoning', nama_produk='$nama_produk', standar='$standar', green_min='$green_min', green_max='$green_max', yellow_min='$yellow_min', yellow_max='$yellow_max' WHERE kode=$id");


    if($queryUpdate){
?>
    <script>
        alert("Add Data Berhhasil");
        window.location.href = "?page=master_produk";
    </script>
    <?php
    }else {
    ?>
    <script>
        alert("Add Data Gagal");
        window.location.href = "?page=master_produk"
    </script>
    <?php    
    }
}