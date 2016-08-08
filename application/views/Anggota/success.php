<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<html>
<head>
	<title>Data Anggota Himakom</title>
	<link href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>" rel="stylesheet"> 
	<script src="<?php echo base_url('assets/js/jquery-2.1.4.min.js'); ?>"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			</div>
			<div class="row">
				<div class="col-sm-offset-3 col-sm-6">
					<div class="alert alert-success" role="alert">
						<h2 align="center"><strong>Data berhasil disimpan!</strong></h2>
						<h4 align="center">Terima kasih telah berkontribusi untuk Himakom:)</h4>
						Silahkan memeriksa data yang sudah masuk pada <a href="<?php echo site_url('anggota');?>">dashboard anda</a> untuk memastikan data yang kamu masukkan sesuai. Mohon maaf atas ketidaknyamanan sistem kami yang masih belum sempurna :). <br><br>
						<div class="text-center"> 
							<a href="<?php echo site_url('anggota');?>" class="btn btn-success" align="center">Kembali ke Dashboard </a>
						</div>
					</div>
				</div>
			</div><!-- end row -->		
	</div>

	
</body>
</html>