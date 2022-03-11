$(document).ready(function () {
	var OldAmount;
	$(document).on('click', 'a[data-bs-role=Update]',function () {	
		var SLN = $(this).data('id');		 
		var FeeHead = $(this).data('row-id');	
			
		//alert(FeeHead);
		$.ajax({
            url: "Validation/StudentFeeRead.php",
            method: "POST",
            data: { SLN: SLN, FeeHead: FeeHead},
		      dataType: "json",
            success: function(data) {
            	// alert(FeeHead);
            	 $('#insert_form')[0].reset();            
            	 $('#AdmNO').val(data[0]); 
            	 $('#Name').val(data[1]);
            	 $('#StudentName').val(data[1]);
            	 $('#Field').val(FeeHead);
            	 $('#FieldName').val(FeeHead);
            	 $('#Amount').val(data[2]);
            	 if ((FeeHead.localeCompare("TotalFee")) && (FeeHead.localeCompare("PrevDue"))) 
            	 {
            	 	$('#Receipt').val(data[3]);
            	 }            	
            	 else {	  
            	 	$('#Receipt').val("NA");
            	 }                               
                $('#myModalFee').modal('show');
                OldAmount = data[2];
            }
        });       
      //  alert(Amount);
		});
	$('#insert_form').on("submit", function(event) {													
        event.preventDefault();
        var Field = $('#Field').val();
        var NewAmount = $('#Amount').val();
       // alert(Amount);
        //alert(NewAmount);
        
       /* if ($('#Syllabus').val() == "") {
            alert("% Syllabus Coverage Required");
        } 
        else { */
         $.ajax({
             url: "Validation/StudentFeeUpdate.php",
             method: "POST",
             data: $('#insert_form').serialize(),
             beforeSend: function() {
             },
             dataType: "json",              
             success : function (data) {                 	 
             	  var AdmNO = data.AdmNO; 
             	  var Name = data.Name;                 	  
					  $('#EditDisplayPrevDue'+AdmNO).html(data.PrevDue);
					  $('#EditDisplayTotalFee'+AdmNO).html(data.TotalFee);
					  $('#EditDisplayTerm1'+AdmNO).html(data.Term1);
					  $('#EditDisplayTerm2'+AdmNO).html(data.Term2);
					  $('#EditDisplayTerm3'+AdmNO).html(data.Term3);
					  $('#EditDisplayTerm4'+AdmNO).html(data.Term4);
					  $('#EditDisplayTotalPaid'+AdmNO).html(data.TotalPaid);
					  $('#EditDisplayBalance'+AdmNO).html(data.Balance);
					  
					  switch(Field) {
					  		case 'PrevDue':
					  			var TotalDue = $('#TotalDue').html();
					  			var TotalBalanace = $('#TotalBalanace').html();
					  		  	$('#TotalDue').html(parseInt(TotalDue) + (parseInt(NewAmount) - parseInt(OldAmount)));				  		  	
					  			$('#TotalBalanace').html(parseInt(TotalBalanace) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  		  	break;
					  		case 'TotalFee':
					  		  	var GrantTotalFee = $('#GrantTotalFee').html();
					  		  	$('#GrantTotalFee').html(parseInt(GrantTotalFee) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  		  	var TotalBalanace = $('#TotalBalanace').html();
					  			$('#TotalBalanace').html(parseInt(TotalBalanace) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  		  	break;
					  		case 'Term1':
					  			var TotalTerm1 = $('#TotalTerm1').html();
					  			$('#TotalTerm1').html(parseInt(TotalTerm1) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalFeePaid = $('#TotalFeePaid').html();
					  			$('#TotalFeePaid').html(parseInt(TotalFeePaid) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalBalanace = $('#TotalBalanace').html();
					  			$('#TotalBalanace').html(parseInt(TotalBalanace) - (parseInt(NewAmount) - parseInt(OldAmount)));
					  		  	break;
					  		case 'Term2':
					  			var TotalTerm2 = $('#TotalTerm2').html();
					  			$('#TotalTerm2').html(parseInt(TotalTerm2) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalFeePaid = $('#TotalFeePaid').html();
					  			$('#TotalFeePaid').html(parseInt(TotalFeePaid) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalBalanace = $('#TotalBalanace').html();
					  			$('#TotalBalanace').html(parseInt(TotalBalanace) - (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			break;
					  		case 'Term3':
					  			var TotalTerm3 = $('#TotalTerm3').html();
					  			$('#TotalTerm3').html(parseInt(TotalTerm3) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalFeePaid = $('#TotalFeePaid').html();
					  			$('#TotalFeePaid').html(parseInt(TotalFeePaid) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalBalanace = $('#TotalBalanace').html();
					  			$('#TotalBalanace').html(parseInt(TotalBalanace) - (parseInt(NewAmount) - parseInt(OldAmount)));
					  			break;
					 		case 'Term4':
					  			var TotalTerm4 = $('#TotalTerm4').html();
					  			$('#TotalTerm4').html(parseInt(TotalTerm4) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalFeePaid = $('#TotalFeePaid').html();
					  			$('#TotalFeePaid').html(parseInt(TotalFeePaid) + (parseInt(NewAmount) - parseInt(OldAmount)));
					  			
					  			var TotalBalanace = $('#TotalBalanace').html();
					  			$('#TotalBalanace').html(parseInt(TotalBalanace) - (parseInt(NewAmount) - parseInt(OldAmount)));
					  			break;
					  	
					  		}					 
              // $('#myModal .close').click();                   
                 $('#myModalFee').modal('toggle');
					}
            });
       // } 
	
	});
});