/*=============================================
EDIT CUSTOMER
=============================================*/

$(".tables").on("click", "tbody .btnEditEmpirp6", function(){

	var regNumber = $(this).attr("regNumber");
	
	
	var datum = new FormData();
    datum.append("regNumber", regNumber);

    $.ajax({

      url:"ajax/empirp6.ajax.php",
      method: "POST",
      data: datum,
      cache: false,
      contentType: false,
      processData: false,
      dataType:"json",
      success:function(answer){
		
		
		$("#editregnumber").val(answer["REGISTRATION_NUMBER"]);
	    $("#editname").val(answer["ENTERPRISE_NAME"]);
	    $("#editfiledate").val(answer["YEAR_FILED"]);
	      
	  }

  	})

})

/*=============================================
VALIDATE IF COMPANY NUMBER ALREADY EXISTS
=============================================*/

$("#newEmpirp6").change(function(){

	$(".alert").remove();
	

	var regnumber = $(this).val();
	

	var data = new FormData();
 	data.append("validateregNumber", regnumber);

  	$.ajax({

	  url:"ajax/empirp6.ajax.php",
	  method: "POST",
	  data: data,
	  cache: false,
      contentType: false,
      processData: false,
      dataType: "json",
      success: function(answer){ 

      	 console.log("answer", answer);

      	if(answer){

      		$("#newEmpirp6").parent().after('<div class="alert alert-warning">This Registration Number Already Exist!</div>');
      		
      		$("#newEmpirp6").val('');
      	}

      }

    });

});


/*=============================================
DELETE CUSTOMER
=============================================*/

$(".tables").on("click", "tbody .btnDeleteEmpirp6", function(){

	var regNumber = $(this).attr("regnumber");
	
	
	swal({
        title: 'Are you sure you want to delete this customer?',
        text: "If you're not you can cancel the action!",
        type: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        cancelButtonText: 'cancel',
        confirmButtonText: 'Yes, delete Customer!'
      }).then(function(result){
        if (result.value) {
          
            window.location = "index.php?route=irp6&regNumber="+regNumber;
        }

  })

})