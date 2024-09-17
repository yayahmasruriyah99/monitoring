<footer class="sticky-footer bg-white">
    <div class="container my-auto">
        <div class="copyright text-center my-auto">
            <span>Copyright &copy; Your Website 2024</span>
        </div>
    </div>
</footer>

<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Ready to Leave?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Select "Logout" below if you are ready to end your current session.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
                <a class="btn btn-primary" href="logout.php">Logout</a>
            </div>
        </div>
    </div>
</div>

<script src="asset/https/jquery-3.7.1"></script>
<script src="asset/https/data_tabels/dataTables.js"></script>
<script src="asset/https/data_tabels/dataTables.buttons.js"></script>
<script src="asset/https//data_tabels/buttons.dataTables.js"></script>
<script src="asset/https//data_tabels/jszip.min"></script>
<script src="asset/https//data_tabels//pdfmake.min"></script>
<script src="asset/https/data_tabels/vfs_fonts"></script>
<script src="asset/https//data_tabels/buttons.html5.min.js"></script>
<script src="asset/https//data_tabels//buttons.print.min.js"></script>
<script>
    new DataTable('#example', {
    layout: {
        topStart: {
            buttons: ['copy', 'csv', 'excel', 'pdf', 'print']
        }
    }
});
</script>

<!-- Bootstrap core JavaScript-->
<script src="asset/vendor/jquery/jquery.min.js"></script>
<script src="asset/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="asset/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="asset/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="asset/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="asset/js/demo/chart-area-demo.js"></script>
<script src="asset/js/demo/chart-pie-demo.js"></script>
<script src="asset/vendor/datatables/jquery.dataTables.min.js"></script>
<script src="asset/vendor/datatables/dataTables.bootstrap4.min.js"></script>

<script src="asset/js/demo/datatables-demo.js"></script>

<script src="asset/https/data_tabels/bootstrap.bundle.min" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
