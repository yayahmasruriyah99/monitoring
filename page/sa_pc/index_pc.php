<style>
       .tes {
        background-color: #ff7f00;
        color: white;
        }
</style>
<div class="container-fluid">

    <!-- Page Heading -->
    <a href="?page=add_pc" class="btn btn-primary mb-3">Add</a>
    <a href="?page=barcode_pc" class="btn btn-primary mb-3">Barcode</a>
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Monitoring PC & Cassava</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="GET">
                    <div class="row">
                        <div class="col-md-3 mb-3">
                            <input type="date" class="form-control" id="tanggal" placeholder="Tanggal" name="tanggal" value="<?php echo $tanggal; ?>" required>
                        </div>
                        <div class="col-md-3 mb-3">
                            <div class="form-group">
                                <select class="form-control" id="shift" name="shift" required>
                                    <option value="">Select Shift</option>
                                    <option value="1">1</option>
                                    <option value="2">2</option>
                                    <option value="3">3</option>
                                    <option value="all">All</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-3 mb-3">
                            <select name="line" id="line" class="form-control" required>
                                <option value="">- Open this Select Menu -</option>
                                <option value="PC32">PC32</option>
                                <option value="PC14">PC14</option>
                                <option value="Cassava">Cassava</option>
                                <option value="TS">TS</option>
                                <option value="TWS.5.6">TWS 5.6</option>
                                <option value="TWS.7.2">TWS 7.2</option>
                                <option value="FCP">FCP</option>
                                <option value="all">All</option>
                            </select>
                        </div>
                        <div class="col-md-3 mb-3">
                            <button type="button" id="btnCari" class="btn btn-warning" name="cari">Cari</button>
                        </div>
                    </div>
                </form>

                <script>
                    document.getElementById("btnCari").addEventListener("click", redirectToPage);

                    function redirectToPage() {
                    

                        var tanggal = document.getElementById("tanggal").value;
                        var shift = document.getElementById("shift").value;
                        var line = document.getElementById("line").value;
                        var cari = '';

                        var url = `index.php?page=index_sa_cr&tanggal=${tanggal}&shift=${shift}&line=${line}&cari=${cari}`;
                        console.log("Redirecting to: " + url);

                        window.location.href = url;
                    }
                </script>

                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color:#ff7f00; color:white">
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Nama Produk</th>
                            <th>Seasoning</th>
                            <th>Line</th>
                            <th>Loop</th>
                            <th>Bagian</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        
                       
                        @$tanggal   = $_GET['tanggal'];
                        @$shift     = $_GET['shift'];
                        @$line      = $_GET['line'];
                        @$cari = $_GET['cari'];
                        @$tanggal_sekarang = date("Y-m-d");
                        

                        @$shift_sekarang = $_SESSION['shift'];

                        if(isset($cari)){
                            
                            $query = "SELECT tbl_sa_pc.*, tbl_loop.bagian  FROM tbl_sa_pc, tbl_loop WHERE tbl_sa_pc.tanggal='$tanggal' AND tbl_sa_pc.loop=tbl_loop.loop";
                            if ($shift !== 'all' && !empty($shift)) {
                                $query .= " AND tbl_sa_pc.shift='$shift'";
                            }
                             if ($line !== 'all' && !empty($line)) {
                                $query .= " AND tbl_sa_pc.line='$line'";
                            }
                            
                            $query .= " ORDER BY tbl_sa_pc.loop ASC";

                            $result = pg_query($dbconn, $query);

                        }else{
                            // $query = "SELECT tbl_sa_pc.*, tbl_loop.* FROM tbl_sa_pc, tbl_loop WHERE tanggal='$tanggal_sekarang' AND shift='$shift_sekarang'";
                            $query = "SELECT tbl_sa_pc.*, tbl_loop.bagian FROM tbl_sa_pc, tbl_loop WHERE tbl_sa_pc.loop=tbl_loop.loop AND tbl_sa_pc.tanggal='$tanggal_sekarang'";
                            
                            $query .= " ORDER BY tbl_sa_pc.loop ASC";

                            $result = pg_query($dbconn, $query);
                        }
                        
                        
                        $no = 1;
                        while ($data = pg_fetch_assoc($result)) {
                        ?>
                            <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $data['tanggal'] ?></td>
                                <td><?= $data['nama_produk'] ?></td>
                                <td><?= $data['seasoning'] ?></td>
                                <td><?= $data['line'] ?></td>
                                <td><?= $data['loop'] ?></td>
                                <td><?= $data['bagian']?></td>
                                <td>
                                    <a href="
                                    <?php if($data['line'] == 'PC32' ||$data['line'] == 'PC14' ||$data['line'] == 'Cassava' ){?> 
                                        ?page=index_detail_pc&id_sa=<?= $data['id']?>&id_produk=<?= $data['kode']?>&loop=<?= $data['loop']?> 
                                    <?php }else if($data['line'] == 'TS'){?>
                                        ?page=index_detail_ts&id_sa=<?= $data['id']?>&id_produk=<?= $data['kode']?>&loop=<?= $data['loop']?>
                                    <?php }else if($data['line'] == 'TWS.5.6' || $data['line'] == 'TWS.7.2' ){?>
                                        ?page=index_detail_tws&id_sa=<?= $data['id']?>&id_produk=<?= $data['kode']?>&loop=<?= $data['loop']?>
                                    <?php }else if($data['line'] == 'FCP'){?>
                                        ?page=index_detail_fcp&id_sa=<?= $data['id']?>&id_produk=<?= $data['kode']?>&loop=<?= $data['loop']?>
                                    <?php }?>
                                    " class="btn btn-success"><i class="fa fa-plus"></i></a>
                                    <a href="?page=edit_pc&id=<?= $data['id'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="?page=delete_pc&id=<?= $data['id'] ?>&line=<?= $data['line']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>