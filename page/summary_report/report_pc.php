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
                            <th>ID</th>
                            <th>Shift</th>
                            <th>Loop</th>
                            <th>Nama Produk</th>
                            <th>Sampel</th>
                            <th>Line</th>
                            <th>Tanggal</th>
                            <th>Waktu</th>
                            <th>Seasoning Nacl</th>
                            <th>Base Nacl</th>
                            <th>Nacl (FG-Base)</th>
                            <th>Seasoning Applled</th>
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
                        $line   = $_GET['line'];
                        
                        $query = "SELECT tbl_sa_pc_detail.*, tbl_sa_pc.shift, tbl_sa_pc.nama_produk, tbl_sa_pc.analis, tbl_sa_pc.field FROM tbl_sa_pc_detail, tbl_sa_pc WHERE tbl_sa_pc_detail.line='$line' AND tbl_sa_pc_detail.tanggal >='$tanggal_start' AND tbl_sa_pc_detail.tanggal <='$tanggal_end' AND tbl_sa_pc.id=tbl_sa_pc_detail.id_sa ORDER BY tbl_sa_pc_detail.sampel ASC";
                        if ($shift !== 'all' && !empty($shift)) {
                            $query .= " AND tbl_sa_pc.shift='$shift'";
                        }
                        $result = pg_query($dbconn, $query);

                        $no=0;
                        while ($data = pg_fetch_assoc($result)) {
                        $no++
                        ?>
                        <tr>
                            <td><?= $data['id_sa']?></td>
                            <td><?= $data['shift'] ?></td>
                            <td><?= $data['loop']?></td>
                            <td><?= $data['nama_produk']?></td>
                            <td><?= $data['sampel']?></td>
                            <td><?= $data['line']?></td>
                            <td><?= $data['tanggal'] ?></td>
                            <td><?= $data['waktu'] ?></td>
                            <td><?= $data['seasoning_nacl'] ?></td>
                            <td><?= $data['base_nacl'] ?></td>
                            <td><?= $data['nacl'] ?></td>
                            <td><?= $data['sa'] ?></td>
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