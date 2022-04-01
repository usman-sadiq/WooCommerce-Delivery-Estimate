jQuery( function ( $ ) {
	

//Process Time

if( jQuery('#enable_processing_phase_0').is(':checked') ){
    jQuery( "#d-estimate .form-table tr .process-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "block");
});
}
else{
   jQuery( "#d-estimate .form-table tr .process-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "none");
 
});	
}

//Delivery Time

if( jQuery('#enable_delivery_time_6').is(':checked') ){
    jQuery( "#d-estimate .form-table tr .delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "block");
});
}
else{
   jQuery( "#d-estimate .form-table tr .delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "none");
 
});	
}

//Delayed Delivery Time

if( jQuery('#enable_delayed_delivery_time_12').is(':checked') ){
    jQuery( "#d-estimate .form-table tr .delayed-delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "block");
});
}
else{
   jQuery( "#d-estimate .form-table tr .delayed-delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "none");
 
});	
}

//Prcoess Time Change Function

jQuery('#enable_processing_phase_0').change(function() {
	if(this.checked) {
		
			jQuery( "#d-estimate .form-table tr .process-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "block");
});

    }
	else
	{
		jQuery( "#d-estimate .form-table tr .process-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "none");
 
});	
	}
	


	
});

//Delivery Time Change Function

jQuery('#enable_delivery_time_6').change(function() {
	if(this.checked) {
		
			jQuery( "#d-estimate .form-table tr .delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "block");
});

    }
	else
	{
		jQuery( "#d-estimate .form-table tr .delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "none");
 
});	
	}
	


	
});


//Delayed Delivery Time Change Function

jQuery('#enable_delayed_delivery_time_12').change(function() {
	if(this.checked) {
		
			jQuery( "#d-estimate .form-table tr .delayed-delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "block");
});

    }
	else
	{
		jQuery( "#d-estimate .form-table tr .delayed-delivery-time" ).each(function( index ) {
  
   jQuery(this).closest('tr').css("display", "none");
 
});	
	}
	


	
});

});
