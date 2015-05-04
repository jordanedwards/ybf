<script>

$(function() {
	$( "#customer_add_dialog" ).dialog({
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
					$.ajax({
						url: "ajax/ajax_customer_add.php?first="+$('#add_first_name').val()+"&last=<?php echo $orders_id ?>",	
						success: function (html) {	
							$('#componentForm').html(html);
						}	
					});
					$( this ).dialog( "close" );
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
	$(".addCustomer").on("click", function (e) {
		e.preventDefault();
		$('#customer_add_dialog').dialog('open');
	});

});		
</script>

<div id="customer_add_dialog" title="Add Customer" style="display:none">
<h3>Add Customer:</h3>
<p>
<table style='width:100%' class="admin_table">
<tr><td>First Name:</td><td><input type="text" name="first_name" id="add_first_name" style="  width: 80%;"/> </td></tr>
<tr><td>Last Name:</td><td><input type="text" name="last_name" id="add_last_name"style="  width: 80%;"/> </td></tr>
<tr><td>Phone:</td><td><input type="tel" name="tel" id="add_tel" style="  width: 80%;"/> </td></tr>
<tr><td>Email:</td><td><input type="email" name="email" id="add_email" style="  width: 80%;"/> </td></tr>
</table>
</p>  

</div>	