<!-- Footer -->
<footer class="sticky-footer bg-white">
	<div class="container my-auto">
		<div class="copyright text-center my-auto">
			<span>Copyright &copy; SIMARWAH PTIPD 2020</span>
		</div>
	</div>
</footer>
<!-- End of Footer -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
	<i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
	aria-hidden="true">
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
				<a class="btn btn-primary" href="<?php echo site_url('data/logout') ?>">Logout</a>
			</div>
		</div>
	</div>
</div>

<!-- Bootstrap core JavaScript-->

<script src="<?php echo base_url('assets/js/jqueryy.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/bootstrap.bundle.min.js') ?>"></script>

<!-- Core plugin JavaScript-->
<!-- < src="<?php echo base_url('assets/js/jquery.easingg.min.js') ?>"></ -->
<script src="<?php echo base_url('assets/js/jquery.easing.min.js') ?>"></script>

<!-- Custom scripts for all pages-->
<script src="<?php echo base_url('assets/js/sb-admin-2.min.js') ?>"></script>

<script>
	$('.custom-file-input').on('change', function () {
		let fileName = $(this).val().split('\\').pop();
		$(this).next('.custom-file-label').addClass("selected").html(fileName);

	});

</script>
<!-- Page level plugins -->
<script src="<?php echo base_url('assets/js/Chart.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/Chart.bundle.js') ?>"></script>
<script src="<?php echo base_url('assets/js/Chart.bundle.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/Chart.js') ?>"></script>
<script src="<?php echo base_url('assets/js/custom.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/chart-area-demo.js') ?>"></script>
<script src="<?php echo base_url('assets/js/chartpiefakultas.js') ?>"></script>
<script src="<?php echo base_url('assets/js/chartpieukmukk.js') ?>"></script>

<!-- Page level plugins -->
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<script src="<?php echo base_url('assets/js/dataTables.bootstrap4.min.js') ?>"></script>

<!-- Page level custom scripts -->
<script src="<?php echo base_url('assets/js/datatables-demo.js') ?>"></script>

<!-- tambahan datatable -->

<!-- <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.22/js/dataTables.bootstrap4.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script> -->
<script src="https://cdn.datatables.net/1.10.22/css/dataTables.bootstrap4.min.css"></script>

<!-- sweetalert -->
<script src="https://cdn.jsdelivr.net/npm/promise-polyfill"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
<script src="<?= base_url('assets/sweetalert/sweetalert2.all.min.js') ?>"></script>
<script src="<?= base_url('assets/js/mysweetalert.js') ?>"></script>

</body>

</html>
