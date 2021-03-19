<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../libs/database.php');
	include_once($filepath.'/../format/format.php');
?>

<?php 
	/**
	* 
	*/
	class account
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function show_account($id)
		{
			$query = "SELECT * FROM tbl_admin WHERE adminID='$id' ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>