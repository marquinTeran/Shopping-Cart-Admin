<?php
	$this->set_css($this->default_theme_path.'/flexigrid/css/flexigrid_list.css');
	$this->set_js_lib($this->default_javascript_path.'/'.grocery_CRUD::JQUERY);

	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/jquery.noty.js');
	$this->set_js_lib($this->default_javascript_path.'/jquery_plugins/config/jquery.noty.config.js');
	$this->set_js_lib($this->default_javascript_path.'/common/lazyload-min.js');

	if (!$this->is_IE7()) {
		$this->set_js_lib($this->default_javascript_path.'/common/list.js');
	}

	$this->set_js($this->default_theme_path.'/flexigrid/js/cookies.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/flexigrid.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/jquery.form.js');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.numeric.min.js');
	$this->set_js($this->default_theme_path.'/flexigrid/js/jquery.printElement.min.js');

	/** Fancybox */
	$this->set_css($this->default_css_path.'/jquery_plugins/fancybox/jquery.fancybox.css');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.fancybox-1.3.4.js');
	$this->set_js($this->default_javascript_path.'/jquery_plugins/jquery.easing-1.3.pack.js');

	/** Jquery UI */
	$this->load_js_jqueryui();

?>
<script type='text/javascript'>
	var base_url = '<?php echo base_url();?>';

	var subject = '<?php echo $subject?>';
	var ajax_list_info_url = '<?php echo $ajax_list_info_url; ?>';
	var unique_hash = '<?php echo $unique_hash; ?>';

	var message_alert_delete = "<?php echo $this->l('alert_delete'); ?>";

</script>
<div id='list-report-error' class='report-div error'></div>
<div id='list-report-success' class='report-div success report-list' <?php if($success_message !== null){?>style="display:block"<?php }?>><?php
if($success_message !== null){?>
	<p><?php echo $success_message; ?></p>
<?php }
?></div>
<div class="flexigrid" style='width: 100%;' data-unique-hash="<?php echo $unique_hash; ?>">
	<div id="hidden-operations" class="hidden-operations"></div>
	<div class="mDiv">
		<div class="ftitle">
			&nbsp;
		</div>
		<div title="<?php echo $this->l('minimize_maximize');?>" class="ptogtitle">
			<span></span>
		</div>
	</div>
	<div id='main-table-box' class="main-table-box">

	<?php if(!$unset_add || !$unset_export || !$unset_print){?>
	<div class="tDiv">
		<?php if(!$unset_add){?>
		<div class="tDiv2">
        	<a href='<?php echo $add_url?>' title='<?php echo $this->l('list_add'); ?> <?php echo $subject?>' class='add-anchor add_button'>
			<div class="fbutton">
				<div>
					<span class="add"><?php echo $this->l('list_add'); ?> <?php echo $subject?></span>
				</div>
			</div>
            </a>
			<div class="btnseparator">
			</div>
		</div>
		<?php }?>
		<div class="tDiv3">
			<?php if(!$unset_export) { ?>
        	<a class="export-anchor" data-url="<?php echo $export_url; ?>" target="_blank">
				<div class="fbutton">
					<div>
						<span class="export"><?php echo $this->l('list_export');?></span>
					</div>
				</div>
            </a>
			<div class="btnseparator"></div>
			<?php } ?>
			<?php if(!$unset_print) { ?>
        	<a class="print-anchor" data-url="<?php echo $print_url; ?>">
				<div class="fbutton">
					<div>
						<span class="print"><?php echo $this->l('list_print');?></span>
					</div>
				</div>
            </a>
			<div class="btnseparator"></div>
			<?php }?>
		</div>
		<div class='clear'></div>
	</div>
	<?php }?>

	<?php echo form_open( $ajax_list_url, 'method="post" id="filtering_form" class="filtering_form" autocomplete = "off" data-ajax-list-info-url="'.$ajax_list_info_url.'"'); ?>
	<div class="sDiv quickSearchBox" id='quickSearchBox'>
		
	<div class="pDiv">
		<div class="pDiv2">
			<div class="pGroup" >
				<div style="display: none !important;" class="pSearch pButton quickSearchButton" id='quickSearchButton' title="<?php echo $this->l('list_search');?>">
					<span></span>
				</div>
			</div>
			<div class="pGroup">
			<span class="pcontrol">
			Registros
				<select name="per_page" id='per_page' class="per_page">
					<?php foreach($paging_options as $option){?>
						<option value="<?php echo $option; ?>" <?php if($option == $default_per_page){?>selected="selected"<?php }?>><?php echo $option; ?>&nbsp;&nbsp;</option>
					<?php }?>
				</select>
				<input type='hidden' name='order_by[0]' id='hidden-sorting' class='hidden-sorting' value='<?php if(!empty($order_by[0])){?><?php echo $order_by[0]?><?php }?>' />
				<input type='hidden' name='order_by[1]' id='hidden-ordering' class='hidden-ordering'  value='<?php if(!empty($order_by[1])){?><?php echo $order_by[1]?><?php }?>'/>
				</span>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pFirst pButton first-button">
					<span></span>
				</div>
				<div class="pPrev pButton prev-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pcontrol"><?php echo $this->l('list_page'); ?> 
				<input name='page' type="text" value="1" size="4" id='crud_page' class="crud_page">
				<?php echo $this->l('list_paging_of'); ?>
				<span id='last-page-number' class="last-page-number">
				<?php echo ceil($total_results / $default_per_page)?>
				</span>
				</span>
			</div>
			<div class="btnseparator">
			</div>
			<div class="pGroup">
				<div class="pNext pButton next-button" >
					<span></span>
				</div>
				<div class="pLast pButton last-button">
					<span></span>
				</div>
			</div>
			<div class="btnseparator">
			</div>
			<div style="min-width: 21px !important; min-height: 22px !important;" class="pGroup">
				<div style="min-width: 19px !important; min-height: 19px !important;" class="pReload pButton ajax_refresh_and_loading" id='ajax_refresh_and_loading'>
					<span style="min-width: 19px !important; min-height: 19px !important;"></span>
				</div>
			</div>
			
			<div class="btnseparator">
			</div>
			<div class="pGroup">
<span class="pcontrol">
			<?php echo $this->l('list_search');?>: <input type="text" class="qsbsearch_fieldox search_text" name="search_text" size="30" id='search_text'>
			<select name="search_field" id="search_field">
				<option value=""><?php echo $this->l('list_search_all');?></option>
				<?php foreach($columns as $column){?>
				<option value="<?php echo $column->field_name?>"><?php echo $column->display_as?>&nbsp;&nbsp;</option>
				<?php }?>
			</select>
            <button style="display:none;" class="crud_search" id='crud_search' type="button"><?php echo $this->l('list_search');?></button>
		</div>
	</span>
<div class="btnseparator">
			</div>
			<div class="pGroup">
				<span class="pPageStat">
					<?php $paging_starts_from = "<span id='page-starts-from' class='page-starts-from'>1</span>"; ?>
					<?php $paging_ends_to = "<span id='page-ends-to' class='page-ends-to'>". ($total_results < $default_per_page ? $total_results : $default_per_page) ."</span>"; ?>
					<?php $paging_total_results = "<span id='total_items' class='total_items'>$total_results</span>"?>
					<?php echo str_replace( array('{start}','{end}','{results}'),
											array($paging_starts_from, $paging_ends_to, $paging_total_results),
											$this->l('list_displaying')
										   ); ?>
				</span>
			</div>
	</div>



		</div>

		<div style="clear: both;">
		</div>
	</div>
	<?php echo form_close(); ?>

	<div id='ajax_list' class="ajax_list">
		<?php echo $list_view?>
	</div>
	
	</div>
</div>

<script>
  $(document).ready(function(){
    $("#per_page").css("width", "50px");
    $("#crud_page").css("width", "30px");
    $("#search_field").css("width", "150px");
  });
</script>
