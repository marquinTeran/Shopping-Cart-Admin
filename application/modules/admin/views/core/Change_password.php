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
			<span><i class="icon-asterisk"></i> CAMBIO DE PASSWORD</span>
		</div>
		<div class="mws-panel-body no-padding">
		<?php
			echo $grocery_crud->output;
		?>
		</div>
	</div>
<script>$(document).ready(function(){$("#form-button-save").attr("disabled",true);$("input").keyup(function(){var e=$("#crudForm").serialize();e=e.split("&");if(e[0]==e[1])$("#form-button-save").removeAttr("disabled");else $("#form-button-save").attr("disabled",true)})})</script>
