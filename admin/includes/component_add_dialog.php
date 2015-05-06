<script>

$(function() {
	$( "#component_add_dialog" ).dialog({
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
			'Add': {
				click: function() {
					$('#newComponentForm').submit();	
               		$(this).dialog('close');
			   	},
			text: "Add",
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
	$(".component-add").on("click", function (e) {
		e.preventDefault();
		$('#component_add_dialog').dialog('open');
	});
		

	function update_type(type){
		$.ajax({
			url: "ajax/ajax_component_form.php?type="+type+"&orderId=<?php echo $orders_id ?>",	
			success: function (html) {	
				$('#componentForm').html(html);
			}	
		});
	};
	
		$("#barcodeAddComponent").on("blur", function (e) {
			e.preventDefault();
			var typeDD = $('#addComponentType');
			var barcode = $(this).val();
			console.log(barcode);

			$.getJSON("ajax/ajax_barcode_lookup.php?type=json&barcode="+barcode, function(jd) {
			// JSON: get barcode response, get looked up component id, and get new price:
				if (jd.response == "0"){
					$('#warning').show();
				} else {
					$('#warning').hide();						
					//Update selection with new value from barcode lookup	
					typeDD.val(jd.componentType);
					update_type(jd.componentType);					
					$('#componentSelection').val(jd.selection_id);
				}
			});			

		});
});			  
</script>


<div id="component_add_dialog" title="Add component" style="display:none">
<h3>Choose Type:</h3>
 <p>
 <?php
	$dd = New DropDown();
	$dd->set_table("componenttype");
	$dd->set_name_field("componentType_name");
	$dd->set_name("addComponentType");
	$dd->set_active_only(true);
	$dd->set_class_name("form-control inline");
	$dd->set_required(true);	
	$dd->set_order("ASC");
	$dd->set_onchange("update_type(this.value);");	
	$dd->display();
	?>	  	  
  </p>
 <p>
<input type="text" placeholder="Scan barcode here to find item" style="width: 80%;" id="barcodeAddComponent"/>  	  
  </p>  
<div id="componentForm">

</div>
</div>	