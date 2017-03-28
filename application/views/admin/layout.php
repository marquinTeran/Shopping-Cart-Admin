<?php
	  if ($this->session->userdata('logged') != 1){
		   redirect('admin/login', 'refresh');
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
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/reset.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/text.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/fonts/ptsans/stylesheet.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/fonts/font-awesome/font-awesome.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/fluid.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/mws.style.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/icons/16x16.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/icons/24x24.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/icons/32x32.css" />
        <!-- Demo and Plugin Stylesheets -->
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/colorpicker/colorpicker.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/imgareaselect/css/imgareaselect-default.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/fullcalendar/fullcalendar.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/fullcalendar/fullcalendar.print.css" media="print" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/chosen/chosen.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/prettyphoto/css/prettyPhoto.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/tipsy/tipsy.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/sourcerer/Sourcerer-1.2.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/jgrowl/jquery.jgrowl.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>plugins/spinner/ui.spinner.css" />
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>jui/css/jquery.ui.all.css" />
        <!-- Theme Stylesheet -->
        <link rel="stylesheet" type="text/css" href="<?=$template_url?>css/mws.theme.css" />
    </head>
    <body>

    <?php
        $this->load->view('admin/Header');
        $this->load->view('admin/Left_menu');
    ?>

    <script src="<?=$template_url?>js/jquery-1.7.2.min.js"></script>
    <script src="<?=$template_url?>js/jquery.mousewheel.min.js"></script>
    <script src="<?=$template_url?>js/jquery.placeholder.js"></script>
    <script src="<?=$template_url?>js/jquery.fileinput.js"></script>
    <!-- jQuery-UI Dependent Scripts -->
    <script src="<?=$template_url?>jui/js/jquery-ui-1.8.20.min.js"></script>
    <script src="<?=$template_url?>jui/js/jquery.ui.timepicker.min.js"></script>
    <script src="<?=$template_url?>jui/js/jquery.ui.touch-punch.js"></script>
    <script src="<?=$template_url?>plugins/spinner/ui.spinner.min.js"></script>
    <!-- Plugin Scripts -->
    <script src="<?=$template_url?>plugins/imgareaselect/jquery.imgareaselect.min.js"></script>
    <script src="<?=$template_url?>plugins/duallistbox/jquery.dualListBox-1.3.min.js"></script>
    <script src="<?=$template_url?>plugins/jgrowl/jquery.jgrowl-min.js"></script>
    <script src="<?=$template_url?>plugins/fullcalendar/fullcalendar.min.js"></script>
    <script src="<?=$template_url?>plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?=$template_url?>plugins/chosen/chosen.jquery.min.js"></script>
    <script src="<?=$template_url?>plugins/prettyphoto/js/jquery.prettyPhoto.min.js"></script>
    <!--[if lt IE 9]>
    <script src="plugins/flot/excanvas.min.js"></script>
    <![endif]-->
    <script src="<?=$template_url?>plugins/flot/jquery.flot.min.js"></script>
    <script src="<?=$template_url?>plugins/flot/jquery.flot.pie.min.js"></script>
    <script src="<?=$template_url?>plugins/flot/jquery.flot.stack.min.js"></script>
    <script src="<?=$template_url?>plugins/flot/jquery.flot.resize.min.js"></script>
    <script src="<?=$template_url?>plugins/colorpicker/colorpicker-min.js"></script>
    <script src="<?=$template_url?>plugins/tipsy/jquery.tipsy-min.js"></script>
    <script src="<?=$template_url?>plugins/sourcerer/Sourcerer-1.2-min.js"></script>
    <script src="<?=$template_url?>plugins/validate/jquery.validate-min.js"></script>
    <!-- Core Script -->
    <script src="<?=$template_url?>js/core/mws.js"></script>
    <script src="<?=$template_url?>js/core/mws.wizard.js"></script>
    <!-- Themer Script (Remove if not needed) -->
    <script src="<?=$template_url?>js/core/themer.js"></script>
    <!-- Demo Scripts (remove if not needed) -->
    <script src="<?=$template_url?>js/demo/demo.js"></script>
    <script src="<?=$template_url?>js/tutorializame.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/clipboard.js/1.6.0/clipboard.min.js"></script>

            <?=$content_for_layout?> 
            
            <!-- Panels End -->
            </div>
            <!-- Inner Container End -->
             
            <!-- Footer -->
            <div id="mws-footer">
                Todos los derechos reservados
                <span class="pull-right">
                    <span style="vertical-align: baseline; font-size: 0; line-height: 26px; background-image: url('http://fsymbols.com/images/fb-smileys.png'); background-position: -224px 0px; height: 16px; width: 16px; display: inline-block;">
                        &nbsp;
                    </span> 
                    with love by, 
                    <a target="_blank" href="https://tutorializa.me/">
                        Tutorializame
                    </a>
                </span>
            </div>

        </div>
        <!-- Main Container End -->

    </div>

    </body>
</html>
