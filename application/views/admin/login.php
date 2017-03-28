<?php
    if ($this->session->userdata('logged') == 1){
	     redirect('admin/main_page', 'refresh');
    }
    $template_url = base_url()."assets/admin/";
?>
<!DOCTYPE HTML>
<html lang="es-EC">
    <head>
        <title><?=strtoupper($title_for_layout)." :: " .BUSINESS_NAME?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1" />
        <!-- Apple iOS and Android stuff (do not remove) -->
        <meta name="apple-mobile-web-app-capable" content="no" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black" />
        <link rel="shortcut icon" type="image/ico" href="<?=$template_url?>images/favicon.png" />
        <link rel="icon" type="image/ico" href="<?=$template_url?>images/favicon.png" />
        <link rel="apple-touch-icon" href="<?=$template_url?>images/apple-touch-icon.png">
        <!-- Required Stylesheets -->
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/reset.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/text.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/fonts/ptsans/stylesheet.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/fonts/icomoon/style.css" media="screen">
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/core/form.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/core/login.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/core/button.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/mws.theme.css" media="screen" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/animate.css" media="screen">
    </head>
    <body>
        <div id="mws-login-wrapper">
            <div id="mws-login">
                <h1>INGRESO AL SISTEMA</h1>
                <div class="mws-login-lock">
                    <img src="<?=$template_url?>css/icons/24/locked-2.png" alt="" />
                </div>
                <div id="mws-login-form">
                    <form class="mws-form"
                          id="login_form"
                          autocomplete="off"
                          action="<?=base_url('admin/create_sessions')?>"
                          method="post">
<?php
    $display = (strlen(validation_errors()) > 0)?"block":"none";
    $class = (strlen(validation_errors()) > 0)?"bounceIn":"";
?>
					              <div class="mws-form-message error animated <?=$class?>"
					                   style="display:<?=$display?>;">
						              <?=validation_errors()?>
					              </div>
                        <div class="mws-form-row">
                            <div class="mws-form-item large">
                                <input type="text" name="username" class="mws-login-username mws-textinput required" placeholder="username" />
                            </div>
                        </div>
                        <div class="mws-form-row">
                            <div class="mws-form-item large">
                                <input type="password" name="password" class="mws-login-password mws-textinput required" placeholder="password" />
                            </div>
                        </div>
                        <div class="mws-form-row mws-inset">
                            <ul class="mws-form-list inline">
                                <li><input type="checkbox" /> <label>No cerrar sesión</label></li>
                            </ul>
                        </div>
                        <div class="mws-form-row">
                            <input type="submit" value="Entrar" class="mws-button green mws-login-button" />
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </body>
    <!-- JavaScript Plugins -->
    <script type="text/javascript" src="<?=$template_url?>js/jquery-1.7.2.min.js"></script>
    <script type="text/javascript" src="<?=$template_url?>js/jquery.placeholder.js"></script>

    <!-- jQuery-UI Dependent Scripts -->
    <script type="text/javascript" src="<?=$template_url?>jui/js/jquery-ui-effects.min.js"></script>

    <!-- Plugin Scripts -->
    <script type="text/javascript" src="<?=$template_url?>plugins/validate/jquery.validate-min.js"></script>

    <!-- Login Script -->
    <script type="text/javascript" src="<?=$template_url?>js/core/login.js"></script>
</html>
