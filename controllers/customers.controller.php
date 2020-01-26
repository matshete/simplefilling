<?php

class ControllerCustomers{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateCustomer(){

		if(isset($_POST["newCustomer"])){

			if(isset($_POST["newCustomer"])){

			   	$table = "customers";

			   	$data = array("name"=>$_POST["newCustomer"],
					           "regnumber"=>$_POST["newNumber"],
							    "company"=>$_POST["newCompany"],
					           "email"=>$_POST["newEmail"],
					           "phone"=>$_POST["newPhone"],
					           "address"=>$_POST["newAddress"]);

			   	$answer = ModelCustomers::mdlAddCustomer($table, $data);

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "customers";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Customer cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "customers";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowCustomers($item, $value){

		$table = "customers";

		$answer = ModelCustomers::mdlShowCustomers($table, $item, $value);

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditCustomer(){

		if(isset($_POST["editCustomer"])){

			if(isset($_POST["editCustomer"])){

			   	$table = "customers";

			   	$data = array("id"=>$_POST["idCustomer"],
			   				   "name"=>$_POST["editCustomer"],
							    "company"=>$_POST["editCompany"],
					           "regnumber"=>$_POST["editNumber"],
					           "email"=>$_POST["editEmail"],
					           "phone"=>$_POST["editPhone"],
					           "address"=>$_POST["editAddress"]
					          );

			   	$answer = ModelCustomers::mdlEditCustomer($table, $data);
			

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "customers";

									}
								})

					</script>';

				}

			}else{

				echo'<script>

					swal({
						  type: "error",
						  title: "Customer cannot be blank or especial characters!",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
							if (result.value) {

							window.location = "customers";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteCustomer(){

		if(isset($_GET["idCustomer"])){

			$table ="customers";
			$data = $_GET["idCustomer"];

			$answer = ModelCustomers::mdlDeleteCustomer($table, $data);

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

								window.location = "customers";

								}
							})

				</script>';

			}		

		}

	}

}

