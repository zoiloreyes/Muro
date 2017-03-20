<?php
	plantilla::inicio();
	if(isset($_POST['mensajeSubmit'])){
		$CI =& get_instance();
		$mensaje = new stdClass();
		$mensaje->Texto = $_POST['mensaje'];
		$mensaje->idUsuario = (int) $user['id'];

		$CI->db->insert('mensaje',$mensaje);
	}

	if(isset($_POST['ComentarioSubmit'])){
		$CI =& get_instance();
		$comentarioData = new stdClass();
		$comentarioData->Texto = $_POST['comentario'];
		$comentarioData->IdUsuario = (int) $user['id'];
		$comentarioData->IdMensaje = (int) $_POST['IdMensaje'];

		$CI->db->insert('comentario',$comentarioData);
	}
?>	
	<div class="row">
		<div class="hidden-sm-down col-md-3" style="background-color:lightblue;">
			<img style="border-radius: 5px; margin:4px" class="img-responsive" src="<?php echo base_url()?>/fotos/<?php echo $user['id']?>.jpg"/>
			<h4><strong><?php echo $user['name']; ?></strong></h4>
			<h4 style="color:gray;"><?php echo $user['email']; ?></h4>
			<a href="<?php echo site_url("users/logout"); ?>" style="margin: 5px; border-radius: 4px"class="btn btn-danger logoutBtn">Cerrar sesión</a>
		</div>
		<div class="col-xs-12 col-xs-12 col-md-9">
			<form method="post" action="" style="background-color: lightblue;">	
				<div class="form-group">
					<textarea style="width: 100%; resize:none;" type="text" rows="5" required name="mensaje" class="form-control" placeholder="Que piensas?"></textarea> 
				</div>
				<div class="text-center">
					<button type="submit" class="btn btn-primary" style="margin: 5px;" name="mensajeSubmit">Enviar</button>
				</div>
			</form>		
		</div>
	</div>
		<?php
			$mensajes =  cargar_mensajes();
			foreach($mensajes as $mensaje){
				$CI =& get_instance();
				$sql = "Select * from users where id = {$mensaje->IdUsuario}";
				$rs = $CI->db->query($sql);
				$ret = $rs->result();			
				$row = $rs->row();
				$url=$this->config->base_url();
				if (isset($row))
				{
					    echo"
					    	<div class='row' style='margin-top: 10px; margin-bottom: 10px;'>
					    		<div class='col-xs-3'>
					    			<img class='img-responsive' src='" . $url . "fotos/{$row->id}.jpg' />
					    		</div>
					    		<div class='col-xs-9'>
					    			<p style='margin-top: 20px'>{$mensaje->Texto}</p>
					    		</div>
					    	</div>
					    ";
					    $sql = "Select * from comentario where IdMensaje = {$mensaje->Id}";
					    $rs = $CI->db->query($sql);
					    $comentarios = $rs->result();

					    foreach ($comentarios as $comentario) {
					    	echo "<div class='row' style='border-radius: 5px;background-color:lightblue'>
					    		<div class='col-xs-offset-2 col-xs-2'>
					    		<img class='img-responsive' src='" . $url ."fotos/{$comentario->IdUsuario}.jpg'/>
					    		</div>
					    		<div class='col-xs-8'>
					    			<p style='margin-top: 20px;'>{$comentario->Texto}</p>
					    		</div>
					    	</div>";
					    }
					    echo "
					    	<div class='row'>
					    		<div class='col-xs-offset-2 col-xs-10'>
					    			<form method='post' action='' style='background-color: lightblue;'>	
					    			<div class='form-group'>
											<textarea style='width: 100%; resize:none;' type='text' rows='3' required name='comentario' class='form-control' placeholder='Comenta'></textarea> 
										</div>
										<div class='text-center'>
											<input type='text' required name='IdMensaje' style='display:none' readonly value={$mensaje->Id} class='form-control'></input>
											<button type='submit' class='btn btn-primary' style='margin: 5px;' name='ComentarioSubmit'>Comentar</button>
										</div>
					    			</form>
					    		</div>
					    	</div>
					    ";

				}
			}
		?>
	</div>
	<script type="text/javascript">
	</script>