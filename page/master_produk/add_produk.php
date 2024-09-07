
<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary">Master Produk</h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required>
                        </div>
                        <div class="mb-3">
                            <label for="kode">Kode Produk :</label>
                            <input type="number" class="form-control" id="kode" name="kode" required>
                        </div>
                        <div class="mb-3">
                            <label for="brand">Brand :</label>
                            <select class="form-control" name="brand" id="brand" oninput="concatenate()" required>
                                
                                <?php 
                                $querySelect = pg_query($dbconn, "SELECT brand FROM tbl_brand GROUP BY brand");
                                while($data = pg_fetch_assoc($querySelect)){
                                ?>
                                    <option value="<?=$data['brand']?>"><?=$data['brand']?></option>
                                <?php
                                }
                                ?>      
                            </select>  
                        </div>
                        <div class="mb-3">
                            <label for="rasa">Rasa :</label>
                            <select class="form-control" name="rasa" id="rasa" oninput="concatenate()" required>
                           </select>
                        </div>
                        <div class="mb-3">
                            <label for="size">Size :</label>
                            <input type="text" class="form-control" id="size" name="size" oninput="concatenate()" required>
                        </div>
                        <div class="mb-3">
                            <label for="seasoning">Seasoning :</label>
                            <input type="text" class="form-control" name="seasoning" id="seasoning" readonly required>
                        </div>
                        
                        
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label for="nama_produk">Nama Produk :</label>
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" readonly required>
                        </div>
                        <div class="mb-3">
                            <label for="green_min">Standar Green Min :</label>
                            <input type="number" step='any' class="form-control" id="green_min" name="green_min" oninput="standars()" required>
                        </div>
                        <div class="mb-3">
                            <label for="green_max">Standar Green Max :</label>
                            <input type="number" step='any' class="form-control" id="green_max" name="green_max" oninput="standars()" required>
                        </div>
                        <div class="mb-3">
                            <label for="yellow_min">Standar Yellow Min :</label>
                            <input type="number" step='any' class="form-control" id="yellow_min" name="yellow_min" required>
                        </div>
                        <div class="mb-3">
                            <label for="yellow_max">Standar Yellow Max :</label>
                            <input type="number" step='any' class="form-control" id="yellow_max" name="yellow_max" required>
                        </div>
                        <div class="mb-3">
                            <label for="standar">Standar PQS :</label>
                            <input type="text" class="form-control" id="standar" name="standar" readonly oninput="standars()" required/>
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
        // Mendapatkan elemen input tanggal dan waktu
        const inputTanggal = document.getElementById('tanggal');
        const inputWaktu = document.getElementById('waktu');

        
        function setCurrentDateTime() {
            const sekarang = new Date();

            
            const tahun = sekarang.getFullYear();
            const bulan = String(sekarang.getMonth() + 1).padStart(2, '0'); 
            const hari = String(sekarang.getDate()).padStart(2, '0'); 
            const tanggalHariIni = `${tahun}-${bulan}-${hari}`;
            inputTanggal.value = tanggalHariIni;

            
            const jam = String(sekarang.getHours()).padStart(2, '0');
            const menit = String(sekarang.getMinutes()).padStart(2, '0');
            const waktuSekarang = `${jam}:${menit}`;
            inputWaktu.value = waktuSekarang;
        }

        // Memanggil fungsi untuk mengatur tanggal dan waktu saat ini saat halaman dimuat
        window.onload = setCurrentDateTime;
    </script>
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
</script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
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
echo $seasoning = $_POST['seasoning'];
$nama_produk = $_POST['nama_produk'];
$standar = $_POST['standar'];
$yellow_min = $_POST['yellow_min'];
$yellow_max = $_POST['yellow_max'];
$green_min = $_POST['green_min'];
$green_max = $_POST['green_max'];
$submit = $_POST['submit'];

if(isset($submit)){
    $queryInsert = pg_query($dbconn, "INSERT INTO tbl_produk(kode, brand, rasa, size, tanggal, seasoning, nama_produk, standar, green_min, green_max, yellow_min, yellow_max) VALUES ('$kode', '$brand', '$rasa', '$size', '$tanggal', '$seasoning', '$nama_produk', '$standar', $green_min, $green_max, $yellow_min, $yellow_max)");

    if($queryInsert){
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
