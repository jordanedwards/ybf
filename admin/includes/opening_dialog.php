<script>

$(function() {
	$( "#opening_dialog" ).dialog({
	// Select item
		width: 550,	
		modal: true,		
		autoOpen: false,
		show: {
			 effect: "fade",
			duration: 300
		},
		hide: {
			effect: "puff",
			percent:110,
			duration: 200
			},
		buttons: {	
			'Go': {
				click: function() {
					$('#openingForm').submit();	
               		$(this).dialog('close');
			   	},
			text: "Go",
			class: 'btn btn-primary'			
            },				
			"Cancel": {
				click: function() {
						$( this ).dialog( "close" );
					},
				text: "Cancel",
				class: 'btn btn-primary'
			}
		}
	});

	// Add component click:
	$(".opening").on("click", function (e) {
		e.preventDefault();
		var itemId = $(this).data("component-id");
		
		$('#opening_dialog').dialog('open');
		$('#openingDialogComponentId').val(itemId);
	});
	
	

});		
</script>


<div id="opening_dialog" title="Add / Edit Mat Opening" style="display:none">
<!--<h3>Add Mat Opening:</h3>-->
<form action='actions/action_mat_opening.php?action=add' method='POST' id='openingForm'>
<input type='hidden' name='componentId' id='openingDialogComponentId' value=''>
<input type='hidden' name='orderId' value='<?php echo $orders_id ?>'>
<table class='admin_table'>
<tr>
<?php
	$dd_measurement = New DropDown();	
	$dd_measurement->set_static(true);								
	$dd_measurement->set_name("top_fraction");
	/*$dd_measurement->set_selected_value($orders->get_frame("width-fraction"));*/
	$dd_measurement->set_option_list("0,1/32,1/16,3/32,1/8,5/32,3/16,7/32,1/4,9/32,5/16,11/32,3/8,13/32,7/16,15/32,1/2,17/32,9/16,19/32,5/8,21/32,11/16,23/32,6/8,25/32,13/16,27/32,7/8,29/32,15/16,31/32");
	$dd_measurement->set_class_name("measurement");			
?> 			
<td><b>Top:</b></td><td><input name="top_whole" value="" type="number" step="1" min="0" class="measurement"/>&nbsp;<?php $dd_measurement->display(); ?></td>
<td><b>Bottom:</b></td><td><input name="bottom_whole" value="" type="number" step="1" min="0" class="measurement"/>&nbsp;<?php $dd_measurement->set_name("bottom_fraction"); $dd_measurement->display(); ?></td></tr>
<tr><td><b>Left:</b> </td><td><input name="left_whole" value="" type="number" step="1" min="0" class="measurement"/>&nbsp;<?php $dd_measurement->set_name("left_fraction"); $dd_measurement->display(); ?></td>
<td><b>Right:</b> </td><td><input name="right_whole" value="" type="number" step="1" min="0" class="measurement"/>&nbsp;<?php $dd_measurement->set_name("right_fraction"); $dd_measurement->display(); ?></td></tr>
</table>
</form>  
</div>	