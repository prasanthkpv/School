$(document).ready(function () {
	$(document).on('click', 'a[data-bs-role=Update]',function () {	
		var SLN = $(this).data('id');		
		 
		$.ajax({
            url: "Validation/StudentDataRead.php",
            method: "POST",
            data: { SLN: SLN
            },
		      dataType: "json",
            success: function(data) { 
            	 $('#SLN').val(data.SLN);
            	 $('#AdmNO').val(data.AdmNO); 
            	 $('#Type').val(data.Type);    	 					 
                $('#FirstName').val(data.Firstname);
                $('#LastName').val(data.Lastname);
                $('#Gender').val(data.Gender);             
                $('#DOA').val(data.DOA);
                $('#Class').val(data.Class);
                $('#Phone').val(data.Phone);
                $('#Email').val(data.Email);
                $('#DOB').val(data.DOB);
                $('#ParentName').val(data.ParentName);
                $('#ParentAddress').val(data.ParentAddress);
                $('#myModal').modal('show');
            }
        });
		});
	$('#insert_form').on("submit", function(event) {													
        event.preventDefault();
       /* if ($('#Syllabus').val() == "") {
            alert("% Syllabus Coverage Required");
        } 
        else { */
            $.ajax({
                url: "Validation/StudentDataUpdate.php",
                method: "POST",
                data: $('#insert_form').serialize(),
                beforeSend: function() {
                },
                dataType: "json",              
                success : function (data) { 
                	  var SLN = data.SLN; 
                	  var Name = data.Firstname +" "+ data.Lastname; 
                	  $('#EditDisplayAdmNO'+SLN).html(data.AdmNO);            	  
						  $('#EditDisplayName'+SLN).html(Name.toUpperCase());
						  $('#EditDisplayGender'+SLN).html(data.Gender);
						  $('#EditDisplayDOA'+SLN).html(data.DOA);
						  $('#EditDisplayClass'+SLN).html(data.Class);
						  $('#EditDisplayPhone'+SLN).html(data.Phone);
                //    $("#myModal .close").click();
                    $('#myModal').modal('toggle');
						}
            });
       // } 
	
	});
});