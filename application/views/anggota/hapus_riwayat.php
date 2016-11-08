		<!--Start Row -->
		<div class="row">
			<div class="col-md-8 col-md-offset-2">
				<div class="panel panel-danger">
					<div class="panel-heading">
						<h3 class="panel-title text-center"><strong>Apakah anda yakin akan menghapus data berikut ?</strong></h3>
					</div>
					<div class="panel-body">
						<table class="table table-hover">
							<thead>
							<?php foreach ($table['header'] as $row): ?>
								<th><?php echo $row ;?></th>
							<?php endforeach; ?>
							</thead>
							<tbody>
								<tr>
								<?php foreach ($attribute as $row): ?>
									<td><?php echo $riwayat[$row] ;?></td>
								<?php endforeach; ?>
								</tr>
							</tbody>
						</table>
					</div>
				
					<div class="panel-footer text-right">
						<form method="post">
							<a href="<?php echo site_url('anggota/profile');?>" class="btn btn-success">Batal</a>
							<button type="submit" class="btn btn-danger">Hapus</button>
						</form>
					</div>
				</div>
			</div>
		</div> <!-- End Row -->
		
	</div>

</body>
</html>