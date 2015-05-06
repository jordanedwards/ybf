<script>

$(function() {
	$( "#barcode_dialog" ).dialog({
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
					// Lookup barcode:
					componentId = $('#scan-component-id').val();
		        	$.getJSON("ajax/ajax_barcode_lookup.php?type=json&ordercomponent_id="+componentId+"&barcode="+$('#barcodeChange').val(), function(jd) {
				  // JSON: get barcode response, get looked up component id, and get new price:
				  		if (jd.response == "0"){
							$('#warning').show();
						} else {
							$('#warning').hide();						
							//Update selection with new value from barcode lookup					
							$('#'+$('#component-list-id').val()).val(jd.selection_id);
							//Update price:
							$('#component-total-'+componentId).html(jd.new_price);
							//Close
							$( "#barcode_dialog" ).dialog('close');
						}
				  });
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
	$(".barcodeScan").on("click", function (e) {
		e.preventDefault();
		var componentId = $(this).data("component-id");
		$('#scan-component-id').val(componentId);
		$('#component-list-id').val("component-list-"+componentId);
		$('#warning').hide();
		$('#barcodeChange').val("");
		$('#barcode_dialog').dialog('open');
	});

});		
</script>

<div id="barcode_dialog" title="Barcode Look up" style="display:none">
<h3>Scan barcode:</h3>
<input type="hidden" id="component-list-id" />
<input type="hidden" id="scan-component-id" />
<p style="display:none; color:red;" id="warning"><i>Barcode not found</i></p>
<p>
<input type="text" id="barcodeChange" placeholder="Scan barcode here to change selection" style="  width: 80%;"/>  	
</p>  

</div>	