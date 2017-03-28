<?php
	$user_login = $this->session->userdata('logged_in');
	$usuario = $this->uri->segment(5);
	if($user_login['id'] != $usuario){
		redirect('error_404', 'refresh');
	}
?>
<?php
foreach ($grocery_crud->css_files as $file):
?>
   <link type="text/css" rel="stylesheet" href="<?=$file;?>" />
<?php endforeach; ?>
<?php
	foreach ($grocery_crud->js_files as $file):
?>
   <script src="<?=$file;?>"></script>
<?php endforeach; ?>
	<div class="mws-panel grid_8 mws-collapsible">
		<div class="mws-panel-header">
			<span><i class="icon-business-card"></i> PERFIL DE USUARIO</span>
		</div>
		<div class="mws-panel-body no-padding">
		<?php
			echo $grocery_crud->output;
		?>
		</div>
	</div>
