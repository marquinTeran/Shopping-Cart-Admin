<?php

	  $base_url = base_url()."assets/admin/";
	  $user_login = $this->session->userdata('logged_in');
	  $foto = isset($user_login['foto'])?$user_login['foto']:"profile_GAD.jpg";

?>
<!-- Header -->
<div id="mws-header" class="clearfix">
    <!-- Logo Container -->
    <div id="mws-logo-container">
        <!-- Logo Wrapper, images put within this wrapper will always be vertically centered -->
        <div id="mws-logo-wrap">
            <img src="<?=$base_url?>images/apple-touch-icon.png" alt="GECO" width="70">
        </div>
    </div>
    <div class='leyenda'>
        <strong>Gestor de Contenidos del Sitio <?=BUSINESS_NAME?></strong>
    </div>
    <!-- User Tools (notifications, logout, profile, change password) -->
    <div id="mws-user-tools" class="clearfix">
        <!-- User Information and functions section -->
        <div id="mws-user-info" class="mws-inset">
            <!-- User Photo -->
            <div id="mws-user-photo">
                <img src="<?=base_url()?>assets/admin/uploads/profiles/<?=$foto?>"
                     alt="<?=$user_login['nombre'].' '.$user_login['apellido']?>">
            </div>
            <!-- Username and Functions -->
            <div id="mws-user-functions">
                <div id="mws-username">
                    Hola, <?=$user_login['nombre'].' '.$user_login['apellido']?>
                </div>
                <ul>
                    <li>
                        <a href="<?=base_url()?>admin/users/profile/edit/<?=$user_login['id']?>">Perfil</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/users/change_password/edit/<?=$user_login['id']?>">Cambiar Password</a>
                    </li>
                    <li>
                        <a href="<?=base_url()?>admin/login/logout/<?=$user_login['id']?>">Cerrar sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
