<?php
	require_once("extensions/phpMailer/class.PHPMailer.php");
require_once "controllers/template.controller.php";
require_once "controllers/users.controller.php";
require_once "controllers/customers.controller.php";require_once "controllers/emp201.controller.php";require_once "controllers/emp501.controller.php";require_once "controllers/irp6.controller.php";require_once "controllers/vatA.controller.php";require_once "controllers/vatB.controller.php";require_once "controllers/vatC.controller.php";require_once "controllers/annualreturns.controller.php";
require_once "controllers/due.controller.php";require_once "controllers/it12.controller.php";require_once "controllers/it14sd.controller.php";require_once "controllers/cidb.controller.php";require_once "controllers/coida.controller.php";require_once "controllers/objemptax201.controller.php";require_once "controllers/objemptax501.controller.php";require_once "controllers/objit12.controller.php";require_once "controllers/objirp6.controller.php";require_once "controllers/objvat.controller.php";require_once "controllers/taxclearance.controller.php";
require_once "models/users.model.php";
require_once "models/customers.model.php";require_once "models/annualreturns.model.php";require_once "models/due.model.php";require_once "models/emp201.model.php";require_once "models/emp501.model.php";require_once "models/irp6.model.php";require_once "models/vatA.model.php";require_once "models/vatB.model.php";require_once "models/vatC.model.php";require_once "models/it12.model.php";require_once "models/it14sd.model.php";require_once "models/cidb.model.php";require_once "models/coida.model.php";require_once "models/objemptax201.model.php";require_once "models/objemptax501.model.php";require_once "models/objit12.model.php";require_once "models/objirp6.model.php";require_once "models/objvat.model.php";require_once "models/taxclearance.model.php";
				{						echo'<script>					swal({						  type: "error",						  title: "Customer cannot be blank or especial characters!",						  showConfirmButton: true,						  confirmButtonText: "Close"						  }).then(function(result){							if (result.value) {							window.location =  "emp501";							}						})			  	</script>';							}

require_once "extensions/vendor/autoload.php";

$template = new ControllerTemplate();
$template -> ctrTemplate();