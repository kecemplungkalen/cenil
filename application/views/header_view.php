<!doctype html>
<html>
	<head>
		<title>Universal Gammu Monitor</title>
		<meta name="viewport" content="width=device-width, initial-scale=1">
			<meta content="text/html; charset=UTF-8" http-equiv="Content-Type">
			<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap.min.css">
			<link rel="stylesheet" href="<?php echo base_url(); ?>asset/css/bootstrap-editable.css">

 			<script src="<?php echo base_url(); ?>asset/js/jquery.min.js"></script> 
			<script src="<?php echo base_url(); ?>asset/js/bootstrap.min.js"></script>
 			<script src="<?php echo base_url(); ?>asset/js/bootstrap-editable.min.js"></script> 
 			<script src="<?php echo base_url(); ?>asset/js/cenil.js"></script> 
		<script>
			var baseURL = '<?php echo base_url();?>';
			$(document).ajaxStart(function() {
				$('#prog').modal('show');
			});

			$(document).ajaxStop( function() {
				$('#prog').modal('hide');

			});
			
			$(window).load(function() {
				$('#prog').modal('hide');
			});
		</script>
		 <style type="text/css">
			  #prog {
				outline: none;
				position: absolute;
				margin-top: 0;
				top: 50%;
				overflow: visible;
				z-index : 99999;
				}
			 .modal-backdrop{
			     background-color:#ffffff;
			 }
		  </style>
	</head>
<div id="prog" class="modal hide fade progress progress-striped active" >
	<div class="bar" style="width: 100%;"></div>
</div>