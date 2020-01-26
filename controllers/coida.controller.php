<?php

class ControllerEmpcoida{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateEmpcoida(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "coida";
				
				$year = date('Y');
				
				$month = date('m');
				
				if($month >=03){$year= $year +1;}
				
				
				$nextdue = 'March 31,'.$year;
				
				
				$fileddate = $_POST["newfileddate"];
				
			   	$data = array("name"=>$_POST["newName"], 
					           "fileddate"=>$_POST["newfileddate"],
							 
								"nextdue"=>$nextdue,
								"howmanyreturns"=> $howmanyreturns,
					           "regnumber"=>$_POST["newRegNumber"] );
							 // print_r($data);exit;
		
			   	$answer = ModelEmpcoida::mdlAddEmpcoida($table, $data);
				//print_r($answer);
				//exit();
				
			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been saved",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "coida";

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

							window.location = "coida";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowEmpcoida($item, $value){

		$table = "coida";

		$answer = ModelEmpcoida::mdlShowEmpcoida($table, $item, $value);
		

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditEmpcoida(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "coida";
				
				
				$year = date('Y');
				
				$month = date('m');
				
				if($month >=03){$year= $year +1;}
				
				
				$nextdue = 'March 31,'.$year;
				
			   	$data = array("name"=>$_POST["editname"], 
					           "fileddate"=>$_POST["editfiledate"],
								"nextdue"=>$nextdue,
								"howmanyreturns"=> $howmanyreturns,
					           "regnumber"=>$_POST["editregnumber"] );
							 // print_r($data);exit;


			   	$answer = ModelEmpcoida::mdlEditEmpcoida($table, $data);
				//print_r($answer);
				

			   	if($answer == "ok"){

					echo'<script>

					swal({
						  type: "success",
						  title: "The customer has been edited",
						  showConfirmButton: true,
						  confirmButtonText: "Close"
						  }).then(function(result){
									if (result.value) {

									window.location = "coida";

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

							window.location =  "coida";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteEmpcoida(){

		if(isset($_GET["regNumber"])){

			$table ="coida";
			$data = $_GET["regNumber"];
		

			$answer = ModelEmpcoida::mdlDeleteEmpcoida($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "coida";


								}
							})

				</script>';

			}		

		}

	}

}

