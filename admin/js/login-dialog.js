$(document).ready(function() {

function signInSubmit() {
	
	
//  $("#sign-in-form").submit(function(e){
//        e.preventDefault();
		if ($('#signin-honeypot').val() == "" && $('#signin-email').val() != "" && $('#signin-password').val() != ""){
			$('#sign-in-form').submit();
		} else {
			$('#sign-in-warning').show();
			if (!$('#signin-honeypot').val() == ""){
				$('#sign-in-warning').html("nice try, robots: "+$('#signin-honeypot').val());
			} else {
				$('#sign-in-warning').html("Please fill in your username/password. If you need to register, please click on 'Create Account'");
			}
		}
				
//    });
};
  
	$( "#sign-in-dialog" ).dialog({
		width: 550,
		modal: true,
		autoOpen: false,
		position: { my: "top", at: "center", of: ".navbar" },
		open: function(){
		},
		hide: {
			effect: "puff",
			percent:110,
			duration: 200
			},			
		buttons: {
			"Sign In": function(){
				signInSubmit();
			},
			Cancel: function() {
				$( this ).dialog( "close" );
		}
		}
	});
	
	$( "#create-account-dialog" ).dialog({
		width: 550,
		modal: true,
		autoOpen: false,
		position: { my: "top", at: "center", of: ".navbar" },		
		open: function(){
		},
		hide: {
			effect: "puff",
			percent:110,
			duration: 200
			},			
		buttons: {
			"Create Account": function(){
				if ($('input[name="scvalue"]').val() != "0"){
					$('#create-account-form').submit();	
				} else {
					$('#captcha-warning').show();
					 $('#captcha-warning').fadeOut( 2000, function() {});
				}
			},
			Cancel: function() {
				$( this ).dialog( "close" );
		}
		}
	});
	
	$('.sign-in').on("click", function(){
		$("#sign-in-dialog").dialog('open');
		/*$("#sign-in-dialog").dialog( "option", "position", { my: "top", at: "center", of: ".navbar" } );*/
	});
	
	$('.create-account').on("click", function(){
			$("#create-account-dialog").dialog('open');							   
	});
	$("#tel").mask("(999) 999-9999"); 

	//$('form').submit (function (e) {
	//	e.preventDefault ();
	//});
	
	var rules = {
		rules: {
			first_name: {
				minlength: 2, required: true
			},
			last_name: {
				minlength: 2, required: true
			},
			email: {
				email: true, required: true
			},
			password: {
				required: true
			},
			tel: {
				required: true
			},
			scvalue : {
				required: true				
			}
		}
	};
		
	var validationObj = $.extend (rules, Application.validationRules);
	$('#create-account-form').validate(validationObj);
	
	$('#signup-email').on("change", function(){
		if ($('#signup-email').val() != ""){
			// Ajax call to check that this email doesn't already exist.
			$.ajax({
				url: "/ajax/ajax_check_unique_login.php?val="+$('#signup-email').val(),	
				success: function (html) {	
					if (html > 0){
						//Match found
						$('#email-check').show();
					} else {
						$('#email-check').hide();						
					}
				}		
			});
		}
	});
	
	
});