<?=doctype('html5');?>

<?=meta('Content-type','text/html ; charset=utf-8','equiv');?>

<html lang="es">
<head>
	<title>Controlate v1.0</title>
	<?=link_tag('assets/bootstrap/css/bootstrap.css')?>
	<?=link_tag('assets/bootstrap/css/bootstrap-responsive.css')?>

	<!-- Cargo los js de groceryCRUD -->
	<? if(isset($output)): ?>
		<?php foreach ($css_files as $file):?>
			<link type="text/css" rel="stylesheet" href="<?=$file?>"/>
		<? endforeach; ?>
	<? endif; ?>

	<!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="<?=base_url();?>assets/bootstrap/ico/favicon/favicon.ico">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?=base_url();?>assets/bootstrap/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?=base_url();?>assets/bootstrap/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?=base_url();?>assets/bootstrap/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="<?=base_url();?>assets/bootstrap/ico/apple-touch-icon-57-precomposed.png">

	<style type="text/css">
	body{
		padding-top: 60px;
		padding-bottom: 40px;
	}
	.sidebar-nav{
		padding: 9px 0;
	}
	</style>

</head>
<body>
	<!-- container-fluid: start -->
	<div class="container-fluid">
		<!-- row-fluid: start -->
		<div class="row-fluid">						
			<!-- span12: start -->
			<div class="span12">
