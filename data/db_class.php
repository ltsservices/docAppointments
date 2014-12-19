<?php
require 'config.inc';

class DBConnection{
    private $handle = null;
   
    function getConnection(){
		global $db_host, $db_user, $db_password, $db_name;

    	$this->handle = mysql_connect($db_host,$db_user,$db_password) or die("Could not connect: " . mysql_error());
	    mysql_select_db($db_name) or die("Could not select database: " . mysql_error());
   }
        
   function close(){
       if($this->handle != null){
         mysql_close($this->handle);
       }
   }
}
?>