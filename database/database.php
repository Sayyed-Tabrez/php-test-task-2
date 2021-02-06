<?php
	require_once "config.php";

	class Database{
		private $dbType = "mysql";
		private $host = "localhost";
		private $dbName = "task";
		private $userName = "root";
		private $password = '';
		public $conn;

		public function getConnection(){
			$this->conn = null;
			$this->conn = new PDO($this->dbType.":host=" . $this->host . ";dbname=" . $this->dbName.";charset=utf8", $this->userName, $this->password, array(PDO::ATTR_PERSISTENT => true, PDO::ATTR_TIMEOUT => 15));
				$this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return $this->conn;
		}

		public function selectQuery($conn, $sql){
			try{
				$resp = array();
				$this->conn = $conn;
				$stmt = $this->conn->prepare($sql);
				$stmt->execute();
				$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($data as $item) {
					$temp = array();
					foreach ($item as $key => $value) {
						$temp[$key] = is_null($value) ? "" : $value;
					}
					array_push($resp, $temp);
				}
			}catch(PDOException $e){
				return "failed";
			}catch(Exception $e){
				return "failed";
			}
			return $resp;
		}

		public function selectParamQuery($conn, $sql, $param){
			try{
				$resp = array();
				$this->conn = $conn;
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($param);
				$data=$stmt->fetchAll(PDO::FETCH_ASSOC);
				foreach ($data as $item) {
					$temp = array();
					foreach ($item as $key => $value) {
						$temp[$key] = is_null($value) ? "" : $value;
					}
					array_push($resp, $temp);
				}
			}catch(PDOException $e){
				return "failed";
			}catch(Exception $e){
				return "failed";
			}
			return $resp;
		}

		public function insertQuery($conn, $sql, $param){
			try{
				$this->conn = $conn;
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($param);
				$resp = $this->conn->lastInsertId();
			}catch(PDOException $e){
				return "failed";
			}catch(Exception $e){
				return "failed";
			}
			return $resp;
		}

		public function updateQuery($conn, $sql, $param){
			try{
				$this->conn = $conn;
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($param);
				$resp= "success";
			}catch(PDOException $e){
				return "failed";
			}catch(Exception $e){
				return "failed";
			}
			return $resp;
		}

		public function deleteParamQuery($conn, $sql, $param){
			try{
				$this->conn = $conn;
				$stmt = $this->conn->prepare($sql);
				$stmt->execute($param);
				$resp= "success";
			}catch(PDOException $e){
				return "failed";
			}catch(Exception $e){
				return "failed";
			}
			return $resp;
		}
		public function close(){
			$this->conn = null;
		}
	}
?>
