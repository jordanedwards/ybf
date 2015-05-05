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
					var first_name = $('#newCustomerFirstName').val();
					var last_name = $('#newCustomerLastName').val();
					var tel = $('#newCustomerTel').val();
					var email = $('#newCustomerEmail').val();
															
					$.ajax({
						url: "ajax/ajax_customer_add.php?first_name="+first_name+"&last_name="+last_name+"&tel="+tel+"&email="+email,	
						success: function (html) {	
							$('#orders_customer_id').append("<option value='"+html+"'>"+first_name+" "+last_name+"</option>");
							$('#orders_customer_id').val(html);
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

 $('#newCustomerTel').mask('(000) 000-0000');	
});	

</script>

<div id="customer_add_dialog" title="Add Customer" style="display:none">
<h3>Add Customer:</h3>
<p>
<table style='width:100%' class="admin_table">
<tr><td>First Name:</td><td><input type="text" id="newCustomerFirstName" style="width: 80%;"/> </td></tr>
<tr><td>Last Name:</td><td><input type="text" id="newCustomerLastName" style="width: 80%;"/> </td></tr>
<tr><td>Phone:</td><td><input type="tel" id="newCustomerTel" style="width: 80%;"/> </td></tr>
<tr><td>Email:</td><td><input type="email" id="newCustomerEmail" style="width: 80%;"/> </td></tr>
</table>
</p>  

</div>	