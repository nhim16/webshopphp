<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../libs/database.php');
	include_once($filepath.'/../format/format.php');
?>
<?php 
	/**
	* 
	*/
	class customer
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function register_customer($data)
		{
			$userName = mysqli_real_escape_string($this->db->link, $data['userName']);
			$userCity = mysqli_real_escape_string($this->db->link, $data['userCity']);
			$userAddress = mysqli_real_escape_string($this->db->link, $data['userAddress']);
			$userPhone = mysqli_real_escape_string($this->db->link, $data['userPhone']);
			$userEmail = mysqli_real_escape_string($this->db->link, $data['userEmail']);
			$userPassword = mysqli_real_escape_string($this->db->link, $data['userPassword']);

			$check_email = "SELECT * FROM tbl_customer WHERE userEmail='$userEmail' LIMIT 1";
			$result_check = $this->db->select($check_email);
			if ($result_check) {
				$alert = "<span class='alerterror'>*Email đã tồn tại! Vui lòng nhập lại </span>";
				return $alert;
			}else {
				if (preg_match('/^[0-9]{10}+$/', $userPhone)){
					$query = "INSERT INTO tbl_customer(userName,userCity,userAddress,userPhone,userEmail,userPassword) VALUES('$userName','$userCity','$userAddress','$userPhone','$userEmail','$userPassword') ";
					$result = $this->db->insert($query);
					if($result){
						$alert = "<span class='alertsuccess'>*Đăng kí tài khoản thành công</span>"." <a href='login.php' title=''>Đăng nhập ngay</a>";
						return $alert;
					}else {
						$alert = "<span class='alerterror'>*Đăng kí không thành công</span>";
						return $alert;
					}
				}else{
					$alert = "<span class='alerterror'>*Không đúng định dạng số điện thoại</span>";
					return $alert;
				}
			}
		}
		public function login_customer($data)
		{
			$userEmail =  $data['userEmail'];
			$userPassword = $data['userPassword'];
			$check_login = "SELECT * FROM tbl_customer WHERE userEmail='$userEmail' AND userPassword='$userPassword' ";
			$result_check = $this->db->select($check_login);
			if ($result_check != false) {
				$value = $result_check->fetch_assoc();
				Session::set('customer_login', true);
				Session::set('customer_id', $value['userId']);
				Session::set('customer_name', $value['userName']);
				header('Location:index.php');
			}else {
				$alert = "<span class='alerterror'>Email hoặc mật khẩu không chính xác</span>";
				return $alert;
			}
			
		}
		public function getcustomerbyuserId($id)
		{
			$query = "SELECT * FROM tbl_customer where userId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getorderbyuserId($id)
		{
			$query = "SELECT * FROM tbl_order where userId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}

	}
 ?>