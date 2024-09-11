<div class="container-fluid">

    <!-- Page Heading -->
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Report Summary</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <form method="post" action="?page=detail_report">
            <div class="row">
                
                <div class="col-md-2 mb-3">
                    <input type="date" class="form-control" placeholder="Tanggal" name="tanggal_start" value="<?php echo $tanggal; ?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <input type="date" class="form-control" placeholder="Tanggal" name="tanggal_end" value="<?php echo $tanggal; ?>" required>
                </div>
                <div class="col-md-3 mb-3">
                    <div class="form-group">
                            <select class="form-control" id="shift" name="shift" required>
                                <option value="">Selected Shift</option>
                                <option value=1>1</option>
                                <option value=2>2</option>
                                <option value=3>3</option>
                                <option value="all">All</option>
                            </select>
                    </div>
                </div>
                <div class="col-md-3 mb-3">
                    <select name="line" id="line" class="form-control" required>
                        <option value="">Select Line</option>
                        <option value="PC32">PC32</option>
                        <option value="PC14">PC14</option>
                        <option value="Cassava">Cassava</option>
                        <option value="FCP">FCP</option>
                        <option value="TWS">TWS</option>
                        <option value="TS">TS</option>
                    </select>
                </div>
                <div class="col-md-1 mb-3">
                    <button type="submit" class="btn btn-warning" name="cari">Cari</button>
                    
                </div>
                </form>
            </div>
            </div>
        </div>
    </div>

</div>