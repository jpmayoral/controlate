<div class="span4">
</div>
<div class="span4">
	<?=validation_errors();?>	
	<form class="well" action="<?=base_url();?>login/verifyLogin" method="post" accept-charset="utf-8">
		<fieldset>
			<legend>Login</legend>
			<br/>
			<div class="controls">
            	<div class="input-prepend">
              		<span class="add-on"><i class="icon-envelope"></i></span><input name="usuario_email" id="usuario_email" type="text" placeholder="Ingrese email" autofocus="autofocus">
            	</div>
          	</div>	
          	<br/>
          	<div class="controls">
            	<div class="input-prepend">
              		<span class="add-on"><i class="icon-lock"></i></span><input name="usuario_password" id="usuario_password" type="password" placeholder="Contraseña">
            	</div>
          	</div>          	
			<label class="checkbox">
    			<input type="checkbox"> No cerrar la sesión
  			</label>  			
			<input class="btn btn-primary" type="submit" value="Ingresar"/>
		</fieldset>		
	</form>
</div>
<div class="span4">
</div>
