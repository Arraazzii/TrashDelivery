<?php 
	if (!isset($_SESSION['level'])) {
		echo "<script>window.history.back();</script>";
	}else{
?>
<div class="modal fade bd-example-modal-lg" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Tambahkan Kurir</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
					<span aria-hidden="true">&times;</span>
				</button>
			</div>

			<div class="modal-body">
				<?php include '../components/form/tambah-kurir-form.php'; ?>
			</div>
		</div>
	</div>
</div>
<?php } ?>