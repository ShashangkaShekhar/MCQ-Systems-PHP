<?php
	class Model_DBClass {

		public $_hostName = "localhost";
		public $_userName = "sa";
		public $_userPass = "sa@12345";
		public $_dbName = "dbMCQ";

		protected $_link;
		
		public function __construct(){
			if(!$this->_link = @mysql_pconnect($this->_hostName, $this->_userName, $this->_userPass)){
				echo 'Could not connect to the database Server!';
			}
					
			mysql_select_db($this->_dbName, $this->_link);
			mysql_query('SET CHARACTER SET utf8');
			mysql_query("SET SESSION collation_connection= 'utf8_general_ci'");
		}
		
		public function doQuery($query){
			$result = mysql_query($query, $this->_link);
			return $result;
		}
		
		public function fetchObject($result){
			$row = mysql_fetch_object($result);
			return $row;
		}
		
		public function numRows($result){
			$num = mysql_num_rows($result);
			return $num;
		}
		
		public function __destruct(){
			
		}
		
	}
	