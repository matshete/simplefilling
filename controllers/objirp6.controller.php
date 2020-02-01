<?php

class ControllerEmpobjirp6{

	/*=============================================
	CREATE CUSTOMERS
	=============================================*/

	static public function ctrCreateEmpobjirp6(){

		if(isset($_POST["newName"])){

			if(isset($_POST["newName"])
			   ){

			   	$table = "objirp6";
				
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
		
			   	$answer = ModelEmpobjirp6::mdlAddEmpobjirp6($table, $data);
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

									window.location = "objirp6";

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

							window.location = "objirp6";

							}
						})

			  	</script>';

			}

		}

	}

	/*=============================================
	SHOW CUSTOMERS
	=============================================*/

	static public function ctrShowEmpobjirp6($item, $value){

		$table = "objirp6";

		$answer = ModelEmpobjirp6::mdlShowEmpobjirp6($table, $item, $value);
		

		return $answer;

	}

	/*=============================================
	EDIT CUSTOMER
	=============================================*/

	static public function ctrEditEmpobjirp6(){

		if(isset($_POST["editname"])){

			if($_POST["editname"]
			   ){

			   	$table = "objirp6";
				
				
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


			   	$answer = ModelEmpobjirp6::mdlEditEmpobjirp6($table, $data);
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

									window.location = "objirp6";

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

							window.location =  "objirp6";

							}
						})

			  	</script>';



			}

		}

	}

	/*=============================================
	DELETE CUSTOMER
	=============================================*/

	static public function ctrDeleteEmpobjirp6(){

		if(isset($_GET["regNumber"])){

			$table ="objirp6";
			$data = $_GET["regNumber"];
		

			$answer = ModelEmpobjirp6::mdlDeleteEmpobjirp6($table, $data);
			
		

			if($answer == "ok"){

				echo'<script>

				swal({
					  type: "success",
					  title: "The customer has been deleted",
					  showConfirmButton: true,
					  confirmButtonText: "Close"
					  }).then(function(result){
								if (result.value) {

									window.location =  "objirp6";


								}
							})

				</script>';

			}		

		}

	}

}

