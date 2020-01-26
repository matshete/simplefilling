<?phprequire_once "connection.php";class ModelempvatA{	/*=============================================	CREATE CUSTOMERS	=============================================*/	static public function mdlAddempvatA($table, $data){		$stmt = Connection::connect()->prepare("INSERT INTO $table(	REGISTRATION_NUMBER, ENTERPRISE_NAME, YEAR_FILED, NEXT_PERIOD, RETURNS_DUE) VALUES (:regnumber, :name, :fileddate, :nextdue, :howmanyreturns)");		$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);		$stmt->bindParam(":fileddate", $data["fileddate"], PDO::PARAM_STR);				$stmt->bindParam(":nextdue", $data["nextdue"], PDO::PARAM_STR);		$stmt->bindParam(":howmanyreturns", $data["howmanyreturns"], PDO::PARAM_STR);		$stmt->bindParam(":regnumber", $data["regnumber"], PDO::PARAM_STR);						if($stmt->execute()){			return "ok";		}else{			return "error";				}		$stmt->close();		$stmt = null;	}	/*=============================================	SHOW CUSTOMERS	=============================================*/	static public function mdlShowempvatA($table, $item, $value){		if($item != null){			$stmt = Connection::connect()->prepare("SELECT * FROM $table WHERE $item = :$item");			$stmt -> bindParam(":".$item, $value, PDO::PARAM_STR);			$stmt -> execute();			//print_r($stmt);			return $stmt -> fetch();		}else{			$stmt = Connection::connect()->prepare("SELECT * FROM $table");			$stmt -> execute();			return $stmt -> fetchAll();		}		$stmt -> close();					$stmt = null;	}	/*=============================================	EDIT ANNUALS	=============================================*/	static public function mdlEditempvatA($table, $data){										 		$stmt = Connection::connect()->prepare("UPDATE $table SET REGISTRATION_NUMBER = :regnumber, ENTERPRISE_NAME = :name, YEAR_FILED = :fileddate, NEXT_PERIOD = :nextdue, RETURNS_DUE = :howmanyreturns WHERE REGISTRATION_NUMBER = :id");		$stmt->bindParam(":id", $data["regnumber"], PDO::PARAM_STR);				$stmt->bindParam(":name", $data["name"], PDO::PARAM_STR);		$stmt->bindParam(":fileddate", $data["fileddate"], PDO::PARAM_STR);		$stmt->bindParam(":nextdue", $data["nextdue"], PDO::PARAM_STR);		$stmt->bindParam(":howmanyreturns", $data["howmanyreturns"], PDO::PARAM_STR);		$stmt->bindParam(":regnumber", $data["regnumber"], PDO::PARAM_STR);				if($stmt->execute()){			print_r($stmt);			return "ok";		}else{			print_r($stmt);			return "error";							}		$stmt->close();		$stmt = null;	}	/*=============================================	DELETE CUSTOMER	=============================================*/	static public function mdlDeleteempvatA($table, $data){		$stmt = Connection::connect()->prepare("DELETE FROM $table WHERE REGISTRATION_NUMBER = :id");		$stmt -> bindParam(":id", $data, PDO::PARAM_STR);				if($stmt -> execute()){						return "ok";					}else{			return "error";			}		$stmt -> close();		$stmt = null;	}	/*=============================================	UPDATE CUSTOMER	=============================================*/	static public function mdlUpdateempvatA($table, $item1, $value1, $value){		$stmt = Connection::connect()->prepare("UPDATE $table SET $item1 = :$item1 WHERE id = :id");		$stmt -> bindParam(":".$item1, $value1, PDO::PARAM_STR);		$stmt -> bindParam(":id", $value, PDO::PARAM_STR);		if($stmt -> execute()){			return "ok";				}else{			return "error";			}		$stmt -> close();		$stmt = null;	}}