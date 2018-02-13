<!DOCTYPE html>
<html>
<head>
	<title><?=Config::get('site_name')?></title>
	<meta charset="utf-8">
	<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css">

	<script type="text/javascript" src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
</head>
<body>
<div class="container">

	<div class="starter-template">
        <?php if( Session::hasFlash()){ ?>
            <div class="alert alert-info" role="alert">
				<?php Session::flash(); ?>
            </div>
		<?php } ?>
		<?php echo $data['content']; ?>
	</div>

</div>

</body>
</html>