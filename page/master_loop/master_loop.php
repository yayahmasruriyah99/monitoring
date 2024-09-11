<div class="container-fluid">

    <!-- Page Heading -->
    <a href="?page=add_loop" class="btn btn-primary mb-3">Add</a>

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
                            <th>Loop</th>
                            <th>Line</th>
                            <th>Bagian</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $query = pg_query($dbconn, "SELECT * FROM tbl_loop");
                        while ($data = pg_fetch_assoc($query)) {
                        ?>
                            <tr>
                                <td><?= $data['loop'] ?></td>
                                <td><?= $data['line'] ?></td>
                                <td><?= $data['bagian'] ?></td>
                                <td>
                                    <a href="?page=edit_loop&loop=<?= $data['loop'] ?>" class="btn btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="?page=delete_loop&loop=<?= $data['loop'] ?>" class="btn btn-danger"><i class="fa fa-trash"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>