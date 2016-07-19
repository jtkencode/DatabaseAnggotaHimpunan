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

<?php

$attrLabel = array(
		'class' => 'col-md-2 control-label'
	);
$attrInputNotRequired = array(
		'class' => 'form-control',
		'autocomplete' => 'off'
	);
$attrInput = array_merge($attrInputNotRequired, array('required' => ''));

?>

	<div class="container">
		<div class="page-header">
			<h1>Tambah Kontak <a href="<?php echo site_url('anggota');?>" class="btn btn-sm btn-success">Kembali ke Dashboard</a></h1>
		</div>

		
			
		
	</div>

	
</body>
</html>