<?php
 $id = $_GET['id'];


?>

<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Dashboard CR</h1>
        <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Generate Report</a>
    </div>

    
    <!-- Content Row -->
    <div class="row">

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                Earnings (Monthly)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$40,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-calendar fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-success shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                Earnings (Annual)</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">$215,000</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Earnings (Monthly) Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Tasks
                            </div>
                            <div class="row no-gutters align-items-center">
                                <div class="col-auto">
                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">50%</div>
                                </div>
                                <div class="col">
                                    <div class="progress progress-sm mr-2">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->

        <!-- Pending Requests Card Example -->
        <!-- <div class="col-xl-3 col-md-6 mb-4">
            <div class="card border-left-warning shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                Pending Requests</div>
                            <div class="h5 mb-0 font-weight-bold text-gray-800">18</div>
                        </div>
                        <div class="col-auto">
                            <i class="fas fa-comments fa-2x text-gray-300"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div> -->
    </div>

    <!-- Content Row -->
    <div class="mb-3">
        <form method="post">
        <div class="row">
        <div class="col-md-1">
            <label for="line">Line</label>
            </div>    
        <div class="col-md-4">
                    <select name="loop" id="loop" class="form-control">
                       <?php
                       $querySelect = pg_query($dbconn, "SELECT * FROM tbl_loop WHERE loop BETWEEN 16 AND 17");
                        while($data = pg_fetch_assoc($querySelect)){
                            ?>
                            <option value="<?=$data['loop']."-".$data['line']."-".$data['bagian']?>"><?=$data['loop']."-".$data['line']."-".$data['bagian']?></option>
                        <?php
                        }
                       ?>
                    </select>
        </div>
        <div class="col-md-5">
            <button type="submit" class="btn btn-warning">Cari</button>
        </div>
        </div>
        </form>
    </div>

    <?php 
        
        $loop_line = explode("-", $_POST['loop']);
        
        $loop =  $loop_line[0];
        $line = $loop_line[1];
        $bagian =  $loop_line[2];
    ?>


    <div class="row">

        <!-- Area Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                <!-- Card Header - Dropdown -->
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">Line <?=$line?> | Loop  <?=$loop."-".$bagian?></h6>
                </div>
                <!-- Card Body -->
                <div class="card-body">
                    <table class="table table-bordered"  border="1" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>Jam</th>
                                <th>Loop</th>
                                <th>Nama Produk</th>
                                <th>NaCl</th>
                                <th>Coating Ratio</th>
                                <th>Result</th>
                            </tr>
                        </thead>
                    
                    <tbody>
                        <?php
                       
                        $tanggal_sekarang = date("Y-m-d");
                        $shift = $_SESSION['shift'];
                        if(empty($loop)){
                             $query = pg_query($dbconn, "SELECT tbl_cr_tws_detail.*, tbl_sa_pc.nama_produk, tbl_produk.yellow_min, tbl_produk.yellow_max, tbl_produk.green_min, tbl_produk.green_max FROM tbl_cr_tws_detail, tbl_sa_pc, tbl_produk WHERE tbl_produk.kode=tbl_sa_pc.kode AND tbl_sa_pc.id=tbl_cr_tws_detail.id_sa AND tbl_cr_tws_detail.tanggal='$tanggal_sekarang' AND tbl_sa_pc.shift='$shift'");
                        }else{
                            if($loop >= 16 && $loop <= 17){
                                $query = pg_query($dbconn, "SELECT tbl_cr_tws_detail.*, tbl_sa_pc.nama_produk, tbl_produk.yellow_min, tbl_produk.yellow_max, tbl_produk.green_min, tbl_produk.green_max  
                                    FROM tbl_cr_tws_detail, tbl_sa_pc, tbl_produk 
                                    WHERE tbl_produk.kode = tbl_sa_pc.kode 
                                    AND tbl_cr_tws_detail.loop = '$loop' 
                                    AND tbl_sa_pc.id = tbl_cr_tws_detail.id_sa 
                                    AND tbl_cr_tws_detail.tanggal = '$tanggal_sekarang' 
                                    AND tbl_sa_pc.shift = '$shift'");
                            }
                        } 
                        
                        
                        while ($data = pg_fetch_assoc($query)) {
                            //$data_sa[] = $data['sa'];
                            $data_nacl[]          = (float) $data['nacl'];
                            $data_yellow_min[]  = (float) $data['yellow_min'];
                            $data_yellow_max[]  = (float) $data['yellow_max'];
                            $data_green_min[]  = (float) $data['green_min'];
                            $data_green_max[]  = (float) $data['green_max'];
                        ?>
                            <tr>
                                <td><?= $data['waktu']?></td>
                                <td><?=$data['loop']?></td>
                                <td><?=$data['nama_produk']?></td>
                                <td><?= $data['nacl'] ?></td>
                                <td><?= $data['cr'] ?></td>
                                
                                <td style="display: flex; justify-content: center; align-items: center;" class="<?= 
                                    $data['result'] == 'green' ? 'btn btn-success' : 
                                    ($data['result'] == 'yellow' ? 'btn btn-warning' : 
                                    ($data['result'] == 'red' ? 'btn btn-danger' :'')) ?>">
                                    <?= $data['result'] ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                    </table>
                </div>
            </div>
        </div>

        <!-- Pie Chart -->
        <div class="col-xl-6 col-lg-6">
            <div class="card shadow mb-4">
                                <!-- Card Header - Dropdown -->
                                <div
                                    class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                                    <h6 class="m-0 font-weight-bold text-primary">Earnings Overview</h6>
                                </div>
                                <!-- Card Body -->
                                <div class="card-body">
                                    <div id="container"></div>
                                </div>
                            </div>
        </div>

    </div>
    

    <!-- Content Row -->
    

</div>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/series-label.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
    // Data yang diperoleh dari PHP dan dikonversi menjadi format JavaScript
    var data_nacl = <?php echo json_encode($data_nacl); ?>;
    var data_yellow_min = <?php echo json_encode($data_yellow_min); ?>;
    var data_yellow_max = <?php echo json_encode($data_yellow_max); ?>;
    var data_green_min = <?php echo json_encode($data_green_min); ?>;
    var data_green_max = <?php echo json_encode($data_green_max); ?>;

    Highcharts.chart('container', {
        title: {
            text: 'Trend SA',
            align: 'left'
        },

        subtitle: {
            text: 'Analis',
            align: 'left'
        },

        yAxis: {
            title: {
                text: 'Nilai Nacl'
            }
        },

        xAxis: {
            title: {
                text: 'Jumlah Sampel'
            },
            categories: data_nacl.map((_, index) => index + 1) // Menampilkan jumlah sampel sebagai nilai x
        },

        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },

        plotOptions: {
            series: {
                label: {
                    connectorAllowed: false
                }
            }
        },

        series: [{
            
            name: 'Nilai Nacl',
            data: data_nacl,
            color: 'blue' // Data yang diambil dari PHP
        },{
            name: 'Minimum',
            data: data_yellow_min, // Data yang diambil dari PHP
            color: 'red'
        },{
            name: 'Maximum',
            data: data_yellow_max, // Data yang diambil dari PHP
            color: 'red'
        },{
            name: 'green max',
            data: data_green_max, // Data yang diambil dari PHP
            color: 'green'
        },{
            name: 'green min',
            data: data_green_min, // Data yang diambil dari PHP
            color: 'green'
        }
        
        ],

        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }

    });
</script>