<div class="container-fluid">

    <!-- Page Heading -->
    <a href="?page=add_produk" class="btn btn-primary mb-3">Add</a>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead style="background-color:#ff7f00; color:white">
                        <tr>
                            <th>Kode</th>
                            <th>Nama Produk</th>
                            <th>Brand</th>
                            <th>Rasa</th>
                            <th>Size</th>
                            <th>Seasoning</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = pg_query($dbconn, "SELECT * FROM tbl_produk");
                        while ($data = pg_fetch_assoc($query)) {
                        ?>
                        <tr>

                            <td><?= $data['kode'] ?></td>
                            <td><?= $data['nama_produk']?></td>
                            <td><?= $data['brand'] ?></td>
                            <td><?= $data['rasa'] ?></td>
                            <td><?= $data['size'] ?></td>
                            <td><?= $data['seasoning']?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><a href="?page=edit_produk&id=<?=$data['kode']?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                            <a href="?page=delete_produk&id=<?=$data['kode']?>" class="btn btn-danger"><i class="fa fa-trash"></i></a></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>