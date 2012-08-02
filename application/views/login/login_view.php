	<?=validation_errors();?>	
	<form class="well" action="<?=base_url();?>/login/verifyLogin" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Login</legend>
			<label for="usuario_email">Email:</label>
			<input type="text" size="20" id="usuario_email" name="usuario_email" placeholder="Ingrese Email" class="span3"/>
			<label for="usuario_password">Contraseña:</label>
			<input type="password" size="20" id="usuario_password" name="usuario_password" placeholder="Contraseña" class="span3"/>				
			<input class="btn" type="submit" value="Ingresar"/>
		</fieldset>		
	</form>
