<?=doctype('html5');?>

<html lang="en">
<head>
	<title>Controlate v1.0</title>
	<?=meta('Content-type','text/html ; charset=utf-8','equiv');?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	<!-- Bootstrap CSS -->
	<?=link_tag('assets/bootstrap/css/bootstrap.css')?>
	<?=link_tag('assets/bootstrap/css/bootstrap-responsive.css')?>

	<!-- Cargo los css de groceryCRUD -->
	<? if(isset($output)): ?>
		<?php foreach ($css_files as $file):?>
			<link type="text/css" rel="stylesheet" href="<?=$file?>"/>
		<? endforeach; ?>
	<? endif; ?>

	<!-- Cargo los js de groceryCRUD -->
	<? if(isset($output)): ?>
		<?php foreach ($js_files as $file):?>
			<script src="<?=$file?>"></script>
		<? endforeach; ?>
	<? else: ?>
		<script src="<?=base_url()?>assets/grocery_crud/js/jquery-1.8.1.min.js"></script>
	<? endif;?>

	<!-- Javascript placed at the end of the document so the pages load faster -->
	<script src="<?=base_url()?>assets/bootstrap/js/bootstrap.js"></script>

	<!-- For IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/bootstrap/ico/favicon/favicon.ico">  

	<style type="text/css">
	body{
		padding-top: 60px;
		padding-bottom: 40px;
	}
	.sidebar-nav{
		padding: 9px 0;
	}
	</style>

	<script>		
		$(document).ready(function(){
			var str = location.href;			
			$("ul.nav.nav-list > li a").each(function() {
				if (str.indexOf(this.href) > -1) { // Si no encuentra en el string devuelve -1
					$("ul.nav.nav-list > li").removeClass("active");
					$(this).parent().addClass("active");
				}
			});
			$("ul.nav.nav-list > li.active").parents().each(function(){
				if ($(this).is("li")){
				$(this).addClass("active");
				}
			});
		});			
	</script>

</head>
	<body>
		<!-- container-fluid: start -->
		<div class="container-fluid">
			<!-- row-fluid: start -->
			<div class="row">						
				<!-- span12: start -->
				<!--<div class="span12">-->
