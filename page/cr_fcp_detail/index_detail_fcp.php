<?php
    $id_sa = $_GET['id_sa'];
    $id_produk = $_GET['id_produk'];

    $querySelect = pg_query($dbconn, "SELECT * FROM tbl_sa_pc WHERE id=$id_sa");
    $data = pg_fetch_assoc($querySelect);
?>

<div class="container-fluid">

    <!-- Page Heading -->
    <a href="?page=add_detail_fcp&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>" class="btn btn-primary mb-3">Add</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Detail Monitoring SA | Line <?= $data['line']?> | <?= $data['nama_produk']?></h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color:#ff7f00;color:white">
                        <tr>
                            <th>ID</th>
                            <th>ID SA</th>
                            <th>Sampel Ke-</th>
                            <th>TS</th>
                            <th>Seasoning Nacl</th>
                            <th>FG Nacl</th>
                            <th>CR</th>
                            <th>Status</th>
                            <th>Result</th>
                            <th>Action</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = pg_query($dbconn, "SELECT * FROM tbl_cr_fcp_detail WHERE id_sa=$id_sa");
                        $no = 1;
                        while ($data = pg_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td><?=$data['id']?></td>
                                <td><?=$data['id_sa']?></td>
                                <td><?= $data['sampel']?></td>
                                <td><?= $data['ts']?></td>
                                <td><?= $data['seasoning_nacl'] ?></td>
                                <td><?= $data['nacl'] ?></td>
                                <td><?= $data['cr']?></td>
                                <td><?= $data['status']?></td>
                                
                                
                                <td style="display: flex; justify-content: center; align-items: center;" class="<?= 
                                    $data['result'] == 'green' ? 'btn btn-success' : 
                                    ($data['result'] == 'yellow' ? 'btn btn-warning' : 
                                    ($data['result'] == 'red' ? 'btn btn-danger' :'')) ?>">
                                    <?= $data['result'] ?></td>

                                <td>
                                    <a href="?page=edit_detail_fcp&id=<?= $data['id'] ?>&id_produk=<?=$id_produk?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="?page=delete_detail_fcp&id=<?= $data['id'] ?>&id_sa=<?=$id_sa?>&id_produk=<?=$id_produk?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>