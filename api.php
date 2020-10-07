<?php
require_once("Rest.inc.php");
	class API extends REST{
		public $data = "";
		const DB_SERVER = "localhost";
		const DB_USER = "adm39080_raspberry";
		const DB_PASSWORD = "7$!v~jmYLi8&";
		const DB = "adm39080_azan";
		private $db = NULL;
		private $mysqli = NULL;
		public function __construct(){
			parent::__construct();				
			$this->dbConnect();					
		}
		private function dbConnect(){
			$this->mysqli = new mysqli(self::DB_SERVER, self::DB_USER, self::DB_PASSWORD, self::DB);
			$this->mysqli->set_charset("utf8");
		}
		public function processApi(){
			$func = strtolower(trim(str_replace("/","",$_REQUEST['x'])));
			if((int)method_exists($this,$func) > 0)
				$this->$func();
			else
				$this->response('',404);
		}
		/********************************************************************************************/
		
		 
		
		private function getTodayAzan_dubai(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan where Azan_Date = CURDATE()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_auh(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_auh where Azan_Date = CURDATE()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_ain(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_ain where Azan_Date = curdate()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
				
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_ajm(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_ajm where Azan_Date = curdate()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
				
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_fuj(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_fuj where Azan_Date = curdate()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
				
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_khor(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_khor where Azan_Date = curdate()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
				
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_rak(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_rak where Azan_Date = curdate()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
				
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_shj(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_shj where Azan_Date = curdate()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
				
			}
			$this->response('',204);
		}
		
		private function getTodayAzan_umm(){
			if($this->get_request_method() != "GET"){
				$this->response('',406);
			}
			$query="SELECT * FROM Azan_umm where Azan_Date = curdate()";
			$r = $this->mysqli->query($query) or die($this->mysqli->error.__LINE__);
			if($r->num_rows > 0){
				$result = $r->fetch_assoc();
				$this->response($this->json($result), 200);
				
			}
			$this->response('',204);
		}
		 
		private function json($data){
			if(is_array($data)){
				return json_encode($data);
			}
		}
	}
	$api = new API;
	$api->processApi();
?>