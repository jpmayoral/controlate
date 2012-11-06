		<!-- span3: start -->
		<div class="span3">

			<? if($this->session->userdata('logged_in')):?>
			<? $session_data = $this->session->userdata('logged_in'); ?>

			<div class="well sidebar-nav">
				<ul class="nav nav-list">
					<li class="nav-header">Menu Principal</li>						
						<li class="active"><a href="<?=base_url()?>pagos_controller/">Mis Pagos</a></li>									
						<li><a href="#">Mis Comprobantes</a></li>						
					<li class="nav-header">Reportes</li>
						<li><a href="#">Semanal</a></li>
						<li><a href="<?=base_url()?>reportes_controller/mensual">Mensual</a></li>
						<li><a href="#">Anual</a></li>
					<li class="nav-header">Mi Perfil</li>
						<li><a href="#">Modificar Mis Datos</a></li>
						<li><a href="#">Configuración General</a></li>
						<li><a href="#">Pagos Fijos</a></li>
					<li class="nav-header">Administraci&oacute;n</li>
						<li><a href="<?=base_url()?>categorias_controller/">Categor&iacute;as</a></li>
						<li><a href="<?=base_url()?>subcategorias_controller/">Subcategor&iacute;as</a></li>		
						<li><a href="<?=base_url()?>medios_de_pago_controller/">Medios de Pago</a></li>		
						<li><a href="<?=base_url()?>estados_pago_controller/">Estados del Pago</a></li>		
					<li class="divider"></li>
					<li><a href="#">Ayuda</a></li>
				</ul>
			</div>

			<? endif; ?>

		</div>
		<!-- span3: end -->