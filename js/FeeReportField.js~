$(document).ready(function() {
$("#Report").change(function() {
	if($(this).val() == "Daily") {
	 $("#Date").prop("disabled", false);
	 $("#Date").attr('required', '');
    $("#Date").attr('data-error', 'This field is required.');     
    $("#Month").prop("disabled", true); 
    $("#Year").prop("disabled", true);   
   } 
  else if($(this).val() == "Monthly") {
  	 $("#Month").prop("disabled", false);
	 $("#Month").attr('required', '');
    $("#Month").attr('data-error', 'This field is required.'); 
    $("#Date").prop("disabled", true); 
    $("#Year").prop("disabled", true);
  	}
   else if($(this).val() == "Yearly") {
  	 $("#Year").prop("disabled", false);
	 $("#Year").attr('required', '');
    $("#Year").attr('data-error', 'This field is required.');
    $("#Date").prop("disabled", true); 
    $("#Month").prop("disabled", true);
  	}
 });
 $("#Report").trigger("change");
});
