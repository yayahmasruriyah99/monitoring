<?php
$id = $_GET['id'];

$querySelect = pg_query($dbconn, "SELECT tbl_sa_pc.*, tbl_loop.bagian FROM tbl_sa_pc, tbl_loop WHERE id = $id");
$data = pg_fetch_assoc($querySelect);
?>

<div class="container mt-4">
    <div class="card border-primary">
        <h3 class="card-header border-primary">Add Data Seasoning Applied</h3>
        <div class="card-body">
            <form method="post">
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3" hidden>
                            <label for="id">ID :</label>
                            <input type="number" class="form-control" id="id" name="id" required value="<?=$data['id']?>">
                        </div>
                        <div class="mb-3">
                            <label for="tanggal">Tanggal :</label>
                            <input type="date" class="form-control" id="tanggal" name="tanggal" required value="<?=$data['tanggal']?>">
                        </div>
                        <div class="mb-3">
                            <label for="regu">Regu :</label>
                            <input type="text" class="form-control" id="regu" name="regu" required value="<?= $data['regu']?>">
                        </div>
                        <div class="mb-3">
                            <label for="line">Line :</label>
                            <select name="line" id="line" class="form-control" required>
                                <option selected>- Open this Select Menu -</option>
                                <option <?php if ($data['line'] == 'PC32'){echo "selected";}?> value="PC32">PC32</option>
                                <option <?php if ($data['line'] == 'PC14'){echo "selected";}?> value="PC14">PC14</option>
                                <option <?php if ($data['line'] == 'Cassava'){echo "selected";}?> value="Cassava">Cassava</option>
                                <option <?php if ($data['line'] == 'TS'){echo "selected";}?> value="TS">TS</option>
                                <option <?php if ($data['line'] == 'TWS.5.6'){echo "selected";}?> value="TWS.5.6">TWS 5.6</option>
                                <option <?php if ($data['line'] == 'TWS.7.2'){echo "selected";}?> value="TWS.7.2">TWS 7.2</option>
                                <option <?php if ($data['line'] == 'FCP'){echo "selected";}?> value="FCP">FCP</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="field">QC Field :</label>
                            <input type="text" class="form-control" id="field" name="field" required value="<?= $data['field']?>">
                        </div>
                        <div class="mb-3">
                            <label for="loop">Loop :</label>
                            <select class="form-control" name="loop" id="loop" oninput="concatenate()" > 
                                <option value="<?=$data['loop']?>"><?=$data['loop']."-".$data['line']."-".$data['bagian']?></option>  
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="nama_produk">Nama Produk :</label>
                            <div class="d-flex align-items-center">
                            <div class="input-group">
                            <input type="text" class="form-control" id="nama_produk" name="nama_produk" required readonly value="<?= $data['nama_produk']?>">
                            <div class="input-group-append">
                                <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#nameModal">Pilih</button>
                            </div>
                            </div>  
                            </div>
                        </div>
                        
                        
                        
                        
                    </div>
                    <div class="col-md-6">
                        
                        <div class="mb-3">
                            <label for="kode">Kode Etiket :</label>
                            <input type="number" class="form-control" name="kode" id="kode" readonly required value="<?= $data['kode']?>">
                            
                        </div>
                        <div class="mb-3">
                            <label for="brand">Brand :</label>
                            <input type="text" class="form-control" id="brand" name="brand" readonly required value="<?= $data['brand']?>">
                        </div>
                        <div class="mb-3" hidden>
                            <label for="rasa">Rasa :</label>
                            <input type="text" class="form-control" id="rasa" name="rasa" required readonly value="<?= $data['rasa']?>">
                        </div>
                        
                        <div class="mb-3">
                            <label for="size">Size :</label>
                            <input type="text" class="form-control" id="size" name="size" required readonly value="<?= $data['size']?>">
                        </div>
                        <div class="mb-3">
                            <label for="seasoning">Kode Seasoning :</label>
                            <input type="text" class="form-control" id="seasoning" name="seasoning" required readonly value="<?= $data['seasoning']?>">
                        </div>
                        <div class="mb-3">
                            <label for="analis">Analis :</label>
                            <input type="text" class="form-control" id="analis" name="analis" value="<?=$_SESSION['nama']?>" required readonly>
                        </div>
                            <div class="d-flex justify-content-end">
                                <button name="submit" type="submit" class="btn btn-primary" onclick="return validateForm()">Submit</button>
                            </div>
                    </div >
                </div>
            </form>
        </div>
    </div>

</div>
<!-- Modal -->
  <div class="modal fade" id="nameModal" tabindex="-1" role="dialog" aria-labelledby="nameModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="nameModalLabel">Pilih Nama</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0" border="1">
                <thead>
                    <tr>
                        <th>Kode</th>
                        <th>Nama Produk</th>
                        <th>Option</th>
                        </tr>
                </thead>
                <tbody>
                        <?php
                            $query = pg_query($dbconn, "SELECT * FROM tbl_produk");
                            while ($data = pg_fetch_assoc($query)){
                        ?>
                        <tr>
                            <td><?= $data['nama_produk']?></td>
                            <td><?= $data['kode']?></td>
                            <td><button class="btn btn-warning name-option" data-dismiss="modal" data-nama_produk="<?= $data['nama_produk']?>" data-brand="<?= $data['brand']?>" data-rasa="<?= $data['rasa']?>" data-seasoning="<?= $data['seasoning']?>" data-size="<?= $data['size']?>" data-kode="<?= $data['kode']?>"><i class="fa fa-plus"></i></button></td>
                        </tr>
                        <?php
                         }
                        ?>
                </tbody>
            </table>
        </div>
      </div>
    </div>
  </div>

  <script>
    function validateForm() {
        var nameInput = document.getElementById('name').value;
        if (nameInput === "") {
            alert("Nama Produk harus diisi!");
            return false; // Mencegah form dari submit
        }
        return true; // Membolehkan form untuk submit
    }
 </script>

  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
  <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
  <script>
    $(document).ready(function() {
      $('.name-option').click(function() {
        var nama_produk = $(this).data('nama_produk');
        var brand = $(this).data('brand');
        var rasa = $(this).data('rasa');
        var size = $(this).data('size');
        var seasoning = $(this).data('seasoning');
        var kode = $(this).data('kode');
        $('#nama_produk').val(nama_produk);
        $('#brand').val(brand);
        $('#rasa').val(rasa);
        $('#size').val(size);
        $('#seasoning').val(seasoning);
        $('#kode').val(kode);
        $('#nameModal').modal('hide');
      });
    });
  </script>
<script type="text/javascript" src="asset/https/add_pc/jquery.min.js"></script>
<script type="text/javascript">
	$('#brand').change(function() { 
		var brand = $(this).val(); 
		$.ajax({
			type: 'POST', 
			url: 'page/master_produk/ajax_brand.php', 
			data: 'brand=' + brand, 
			success: function(response) { 
				$('#rasa').html(response); 
			}
		});
	});

    $('#line').change(function() { 
		var line = $(this).val(); 
		$.ajax({
			type: 'POST', 
			url: 'page/sa_pc/ajax_line.php', 
			data: 'line=' + line, 
			success: function(response) { 
				$('#loop').html(response); 
			}
		});
	});
 
</script>
<script src="asset/https/add_pc/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $("#rasa").on('input', function() {
            var data = $(this).val();
            $("#seasoning").val(data);
        });
    });
</script>

<?php

$tanggal = $_POST['tanggal'];
$regu = $_POST['regu'];
$line = $_POST['line'];
$nama_produk = $_POST['nama_produk'];
$brand = $_POST['brand'];
$rasa = $_POST['rasa'];
$size = $_POST['size'];
$seasoning = $_POST['seasoning'];
$analis = $_POST['analis'];
$field = $_POST['field'];
$kode = $_POST['kode'];
$id = $_POST['id'];
$loop = $_POST['loop'];
$submit = $_POST['submit'];

if(isset($submit)){
    $queryUpdate = pg_query($dbconn, "UPDATE tbl_sa_pc SET 
        tanggal='$tanggal', 
        brand='$brand', 
        size='$size', 
        seasoning='$seasoning', 
        analis='$analis', 
        field='$field', 
        regu='$regu', 
        rasa='$rasa', 
        line='$line', 
        nama_produk='$nama_produk', 
        kode=$kode,
        loop=$loop
        WHERE id=$id;");

    if($queryUpdate){
?>
    <script>
        alert("Update Data Berhhasil");
        window.location.href = "?page=index_sa_cr";
    </script>
    <?php
    }else {
    ?>
    <script>
        alert("Update Data Gagal");
        window.location.href = "?page=index_sa_cr";
    </script>
    <?php    
    }
}

