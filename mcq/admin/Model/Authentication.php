<?php
    require_once 'dbclass.php';
    /*
     * For Login 
     */
    class Model_Authentication extends Model_DBClass {
    	public function loginUser($data){    		
    		$query="SELECT * FROM `tbl_admin`
                    WHERE login_name = '{$data[admin_name]}'
                        AND login_pass = '{$data[password]}'
                        AND status != '0'";
            $result = mysql_query($query);
            return $result;
        }
    }
        