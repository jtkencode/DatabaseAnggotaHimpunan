<body>
	<div class="container">
		<div class="page-header">
			<h1><?php echo $page; ?></h1>
		</div>
		<?php if (isset($error)) : ?>
			<div class="alert alert-dismissible alert-danger">
			  	<button type="button" class="close" data-dismiss="alert">&times;</button>
			 	<strong><?php echo $error; ?></strong>
			 </div>
		<?php endif; ?>