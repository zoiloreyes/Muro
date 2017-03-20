<?php
	plantilla::inicio();
?>
    <!-- validation -->
	<div class="grids">
		<div class="progressbar-heading grids-heading">
			<h2>Registro de usuario</h2>
		</div>
		
		<div class="forms-grids">
			<div class="forms3">
			<div class="w3agile-validation w3ls-validation">
				<div class="panel panel-widget agile-validation register-form">
					<div class="validation-grids widget-shadow" data-example-id="basic-forms"> 
						<div class="input-info">
							<h3>Unete :</h3>
						</div>
						<div class="form-body form-body-info">
							<form enctype="multipart/form-data" action="" method="post">
								<div class="form-group input-group">
									<label class="input-group-addon">Foto de perfil: </label>
									<input required type="file" name="imagen" class="form-control"></input> 
								</div>
								<div class="form-group valid-form">
									<input type="text" class="form-control" name="name" placeholder="Nombre" required="" value="<?php echo !empty($user['name'])?$user['name']:''; ?>">
									<?php echo form_error('name','<span class="help-block">','</span>'); ?>
								</div>
								<div class="form-group has-feedback">
									<input type="email" class="form-control inputEmail" name="email" placeholder="Correo" data-error="La dirección es invalida" required="" value="<?php echo !empty($user['email'])?$user['email']:''; ?>">
									<?php echo form_error('email','<span class="help-block">','</span>'); ?>
								</div>
								<div class="form-group valid-form">
									<input type="text" class="form-control" name="phone" placeholder="Teléfono" value="<?php echo !empty($user['phone'])?$user['phone']:''; ?>">
								</div>
								<div class="form-group">
								  <input type="password" class="form-control inputPassword" name="password" placeholder="Contraseña" required="">
								  <?php echo form_error('password','<span class="help-block">','</span>'); ?>
								</div>
								<div class="form-group">
								  <input type="password" class="form-control" data-match=".inputPassword" data-match-error="La contraseña no coincide" name="conf_password" placeholder="Confirme contraseña" required="">
								  <?php echo form_error('conf_password','<span class="help-block">','</span>'); ?>
								</div>
								<div class="form-group">
									<?php
									if(!empty($user['gender']) && $user['gender'] == 'Female'){
										$fcheck = 'checked="checked"';
										$mcheck = '';
									}else{
										$mcheck = 'checked="checked"';
										$fcheck = '';
									}
									?>
									<div class="radio">
										<label>
										<input type="radio" name="gender" value="Male" <?php echo $mcheck; ?>>
										Hombre
										</label>
									</div>
									<div class="radio">
										<label>
										  <input type="radio" name="gender" value="Female" <?php echo $fcheck; ?>>
										  Mujer
										</label>
									</div>
								</div>
								<div class="form-group">
									<input type="submit" name="regisSubmit" class="btn btn-primary" value="Enviar"/>
								</div>
							</form>
						</div>
						<p class="footInfo">Ya tienes una cuenta? <a href="<?php echo site_url('users/login'); ?>">Inicia aquí</a></p>
					</div>
				</div>
			</div>
			<div class="clear"> </div>
			</div>
		</div>
	</div>
	<!-- //validation -->
</div>
</body>
</html>