<?php
    require_once 'dbclass.php';
    /*
     * For Login 
     */
    class Model_Authentication extends Model_DBClass {
    	public function loginUser($data){    		
    		$query="SELECT * FROM `tbl_user`
                    WHERE username = '{$data[user_name]}'
                        AND password = '{$data[user_password]}'
                        AND status = '1'";
            $result = mysql_query($query);
            return $result;
        }
    }
        