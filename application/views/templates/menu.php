<!-- navbar navbar-fixed-top: start -->
	<div class="navbar navbar-fixed-top">
		<div class="navbar-inner">
			<div class="container-fluid">
				<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</a>
				<a class="brand" href="#">Controlate v1.0</a>
				<div class="btn-group pull-right">
					<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
						<i class="icon-user"></i>Username
						<span class="caret"</span>
					</a>
					<ul class="dropdown-menu">						
						<li><a href="#">Profile</a></li>
						<li class="divider"></li>
						<li><a href="#">Sign Out</a></li>
					</ul>						
				</div>
				<!-- .nav-collapse: start -->
				<div class="nav-collapse">
					<ul class="nav">
						<li class="active"><a href="<?=base_url().'news';?>">Inicio</a></li>
						<li><a href="<?=base_url().'news/create';?>">Crear</a></li>		
						<li><a href="<?=base_url().'upload/';?>">Subir Archivo</a></li>				
						<li><a href="#contact">Contacto</a></li>
					</ul>
				</div>
				<!-- .nav-collapse: end -->
			</div>
		</div>
	</div>
	<!-- navbar navbar-fixed-top: end -->