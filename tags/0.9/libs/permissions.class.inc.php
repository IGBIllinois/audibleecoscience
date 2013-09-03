<?php

//////////////////////////////////////////
//					//
//	permissions.class.inc.php	//
//					//
//	class for purpose of  	//
//	checking user permissions	//
//	on each page			//
//					//
//	By Crystal Ahn		//
//	June 2009			//
//					//
//////////////////////////////////////////

include_once 'db.class.inc.php';

class permissions {


///////////////Private Variables//////////////
	private $db;


//////////////Public Functions///////////////

	public function __construct($mysqlSettings) {

		$this->db = new db($mysqlSettings['host'],$mysqlSettings['database'],$mysqlSettings['username'],$mysqlSettings['password']);
	}
	public function __destruct() {
        	
                
    	}

	/* groupaccess
		returns permission level of given page
		requires page         	*/
	public function groupaccess($page) {
		$safePage = mysql_real_escape_string($page,$this->db->getLink());
		$safeGroup = mysql_real_escape_string($group,$this->db->getLink());
		$new = substr($safePage,strrpos($safePage,"/")+1);			
		$sql = "Select permission_group from permissions WHERE permission_site = '" . $new . "'";
		return $this->db->single_query($sql); 	
	}

	/* access
		returns 1 if given user has privileges to see given page
		returns 0 if not 
		lower number = higher privilege
		requires user_group and page         	*/
	public function access($page, $group) {
		if($this->groupaccess($page) >= $group){  
			return 1;
		}
		else {
			return 0; 	
		}	
	}
}