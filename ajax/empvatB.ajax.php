<?phprequire_once "../controllers/vatB.controller.php";require_once "../models/vatB.model.php";class AjaxEmpvatB{	/*=============================================	EDIT CUSTOMER	=============================================*/		public $regNumber;	public function ajaxEditEmpvatB(){		$item = "REGISTRATION_NUMBER";		$value = $this->regNumber;		$answer = ControllerempvatB::ctrShowempvatB($item, $value);		//print_r($answer);					echo json_encode($answer);	}				/*=============================================	VALIDATE IF USER ALREADY EXISTS	=============================================*/	public $validateregNumber;	public function ajaxValidateRegNumber(){		$item = "REGISTRATION_NUMBER";		$value = $this->validateregNumber;		$answer = ControllerempvatB::ctrShowempvatB($item, $value);		//print_r($answer);		echo json_encode($answer);	}}/*=============================================EDIT EmpvatB=============================================*/	if(isset($_POST["regNumber"])){	$Customer = new AjaxEmpvatB();	$Customer -> regNumber = $_POST["regNumber"];	$Customer -> ajaxEditEmpvatB();}/*=============================================VALIDATE IF USER ALREADY EXISTS=============================================*/if (isset($_POST["validateregNumber"])) {	$valUser = new AjaxEmpvatB();	$valUser -> validateregNumber = $_POST["validateregNumber"];	$valUser -> ajaxValidateRegNumber();}