<!-- navbar navbar-fixed-top: start -->
	<div class="navbar navbar-inverse navbar-fixed-top">
		<!-- navbar-inner: start -->
		<div class="navbar-inner">
			<div class="container-fluid">				
				<a class="brand" href="<?=base_url();?>">Controlate v1.0</a>
				<? if($this->session->userdata('logged_in')):?>
				<? $session_data = $this->session->userdata('logged_in'); ?>
					<!-- .nav-collapse: start -->
					<!--<div class="nav-collapse collapse">-->
						<ul class="nav">
							<li class="active"><a href="<?=base_url();?>">Inicio</a></li>
							<li><a href="<?=base_url().'pagos_controller/index/add';?>">Cargar Pago</a></li>		
							<li><a href="<?=base_url().'upload/';?>">Subir Archivo</a></li>				
							<li><a href="#contact">Contacto</a></li>
							<li class="divider-vertical">
						</ul>
					<!--</div>-->
					<!-- .nav-collapse: end -->
					
					<form class="navbar-search pull-left">
					  <input type="text" class="search-query" placeholder="Buscar Pago">
					</form>

					<!-- Info del Usuario -->
					<div class="btn-group pull-right">						
						<a class="btn dropdown-toggle" data-toggle="dropdown" href="#">
							<i class="icon-user"></i><?=$session_data['usuario_apellido'].' '.$session_data['usuario_nombre'];?>
							<span class="caret"</span>
						</a>
						<ul class="dropdown-menu">						
							<li><a href="<?=base_url();?>perfil_controller">Mi Perfil</a></li>
							<li class="divider"></li>							
							<li><a href="<?=base_url();?>home/logout">Cerrar sesión</a></li>
						</ul>						
					</div>				
					
				<? endif; ?>				
			</div>
		</div>
		<!-- navbar-inner: end -->
	</div>
	<!-- navbar navbar-fixed-top: end -->