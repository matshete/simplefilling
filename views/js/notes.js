/*=============================================
EDIT CATEGORY
=============================================*/

$(".tables").on("click", ".btnEditNotes", function(){

	var idNotes = $(this).attr("idNotes");

	var datum = new FormData();
	datum.append("idNotes", idNotes);

	$.ajax({
		url: "ajax/notes.ajax.php",
		method: "POST",
      	data: datum,
      	cache: false,
     	contentType: false,
     	processData: false,
     	dataType:"json",
     	success: function(answer){
     		
     		//console.log("answer", answer);

     		$("#editNote").val(answer["notes"]);
     		$("#editCash").val(answer["cash"]);
     		$("#editUsed").val(answer["used"]);
     		$("#idNotes").val(answer["id"]);

     	}

	})

})

/*=============================================
DELETE CATEGORY
=============================================*/
$(".tables").on("click", ".btnDeleteNotes", function(){

	 var idNotes = $(this).attr("idNotes");

	 swal({
	 	title: 'Are you sure you want to delete this record?',
		text: "if you're not sure you can cancel!",
		type: 'warning',
		showCancelButton: true,
		confirmButtonColor: '#3085d6',
		cancelButtonColor: '#d33',
		cancelButtonText: 'Cancel',
		confirmButtonText: 'Yes, delete record!'
	 }).then(function(result){

	 	if(result.value){

	 		window.location = "index.php?route=notes&idNotes="+idNotes;

	 	}

	 })

})