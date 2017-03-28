<?php
	$ci = &get_instance();
	$ci->load->model("menus");
	$data_user = $this->session->userdata('logged_in');
	$usuario = $data_user['id'];
	$menuprincipal = $ci->menus->get_menu($usuario);
?>
    <!-- Start Main Wrapper -->
    <div id="mws-wrapper">
    
    	<!-- Necessary markup, do not remove -->
		<div id="mws-sidebar-stitch"></div>
		<div id="mws-sidebar-bg"></div>
        
        <!-- Sidebar Wrapper -->
        <div id="mws-sidebar">
        
            <!-- Hidden Nav Collapse Button -->
            <div id="mws-nav-collapse">
                <span></span>
                <span></span>
                <span></span>
            </div>

        	<!-- Searchbox -->
					<div id="mws-searchbox">
					<br>
					</div>

            <!-- Main Navigation -->
            <div id="mws-navigation">
                <ul>
								<?php
								foreach ($menuprincipal as $key => $row) {
									$cod = $row->codigo_menu;
									$nom = $row->nombre;
									$url = ($row->url == '')?'#':base_url().$row->url;
									echo "<li class='active'><a style='font-size: 11px !important;' href=".$url." class='mws-i-24 {$row->icono}'>".strtoupper($nom)."</a>";
		                echo "<ul class='closed' id='{$cod}'>";
										$submenu = $ci->menus->get_submenu($cod, $usuario);
										foreach ($submenu as $menu) {
												$url = ($menu->url == '')?'#':base_url().$menu->url;
		                    echo "<li id=".str_replace(".", "", $menu->codigo_menu)."SUB".">
		                              <a href=".$url."?active_menu=".$menu->codigo_menu."
		                                 style='padding-left: 12px !important;'>".
		                                    $menu->nombre
                                  ."</a></li>";
										}
		                echo "</ul>";
									echo "</li>";
								}
								?>
                    <!--li>
                        <a href="">
                            <i class="icon-pacman"></i> 
                            Icons <span class="mws-nav-tooltip">2000+</span>
                        </a>
                    </li-->
                </ul>
            </div>         
        </div>
        
        <!-- Main Container Start -->
        <div id="mws-container" class="clearfix">
        
        	<!-- Inner Container Start -->
            <div class="container">
                
                <!-- Panels Start -->
