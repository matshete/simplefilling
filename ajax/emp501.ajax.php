<?phprequire_once "../controllers/emp501.controller.php";require_once "../models/emp501.model.php";class AjaxEmp501{	/*=============================================	EDIT CUSTOMER	=============================================*/		public $regNumber;	public function ajaxEditEmp501(){		$item = "REGISTRATION_NUMBER";		$value = $this->regNumber;		$answer = Controlleremp501::ctrShowemp501($item, $value);		//print_r($answer);					echo json_encode($answer);	}				/*=============================================	VALIDATE IF USER ALREADY EXISTS	=============================================*/	public $validateregNumber;	public function ajaxValidateRegNumber(){		$item = "REGISTRATION_NUMBER";		$value = $this->validateregNumber;		$answer = Controlleremp501::ctrShowemp501($item, $value);		//print_r($answer);		echo json_encode($answer);	}}/*=============================================EDIT Emp501=============================================*/	if(isset($_POST["regNumber"])){	$Customer = new AjaxEmp501();	$Customer -> regNumber = $_POST["regNumber"];	$Customer -> ajaxEditEmp501();}/*=============================================VALIDATE IF USER ALREADY EXISTS=============================================*/if (isset($_POST["validateregNumber"])) {	$valUser = new AjaxEmp501();	$valUser -> validateregNumber = $_POST["validateregNumber"];	$valUser -> ajaxValidateRegNumber();}