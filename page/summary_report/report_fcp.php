<div class="container-fluid">

    <!-- Page Heading -->

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">DataTables Example</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="example" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Regu</th>
                            <th>Shift</th>
                            <th>Loop</th>
                            <th>Bagian</th>
                            <th>Nama Produk</th>
                            <th>Waktu</th>
                            <th>Seasoning In Total Slurry</th>
                            <th>Seasoning Nacl</th>
                            <th>FG Nacl</th>
                            <th>FG CR</th>
                            <th>Standar</th>
                            <th>Status</th>
                            <th>Result</th>
                            <th>Analis</th>
                            <th>QC Field</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $tanggal_start = $_GET['tanggal_start'];
                        $tanggal_end = $_GET['tanggal_end'];
                        $shift  = $_GET['shift'];
                        
                        $query = "SELECT tbl_cr_fcp_detail.*, tbl_cr_fcp_detail.shift, tbl_sa_pc.nama_produk, tbl_cr_fcp_detail.analis, tbl_cr_fcp_detail.field, tbl_cr_fcp_detail.regu, tbl_loop.bagian FROM tbl_cr_fcp_detail, tbl_sa_pc, tbl_loop WHERE tbl_cr_fcp_detail.tanggal >='$tanggal_start' AND tbl_cr_fcp_detail.tanggal <='$tanggal_end' AND tbl_sa_pc.id=tbl_cr_fcp_detail.id_sa AND tbl_sa_pc.loop=tbl_loop.loop";
                        if ($shift !== "all") {
                            $query .= " AND tbl_cr_fcp_detail.shift ='$shift'";
                        }
                        $result = pg_query($dbconn, $query);

                        $no=0;
                        while ($data = pg_fetch_assoc($result)) {
                        $no++
                        ?>
                        <tr>

                            <td><?= $no ?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['regu'] ?></td>
                            <td><?= $data['shift'] ?></td>
                            <td><?= $data['loop'] ?></td>
                            <td><?= $data['bagian'] ?></td>
                            <td><?= $data['nama_produk']?></td>
                            <td><?= $data['waktu'] ?></td>
                            <td><?= $data['ts']?></td>
                            <td><?= $data['seasoning_nacl'] ?></td>
                            <td><?= $data['nacl'] ?></td>
                            <td><?= $data['cr'] ?></td>
                            <td><?= $data['standar'] ?></td>
                            <td><?= $data['status'] ?></td>
                            <td><?= $data['result'] ?></td>
                            <td><?= $data['analis'] ?></td>
                            <td><?= $data['field'] ?></td>
                        </tr>
                        <?php } ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>