<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../libs/database.php');
	include_once($filepath.'/../format/format.php');
?>

<?php 
	/**
	* 
	*/
	class payment
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function add_to_payment($quantity,$id)
		{
			$quantity = $this->fm->validation($quantity); 
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$id = mysqli_real_escape_string($this->db->link, $id);
			$sId = session_id();
			$query ="SELECT *FROM tbl_product where proId='$id'";
			$result = $this->db->select($query)->fetch_assoc();
			$proName = $result['proName'];
			$preImage = $result["preImage"];
			$price = $result["priceCurrent"];
			$query_insert = "INSERT INTO tbl_payment(proId,quantity,sId,proName,image,price) VALUES('$id','$quantity','$sId','$proName','$preImage','$price')";
			$insert_payment = $this->db->insert($query_insert);
			if($result){
				$alert = "<span class='alertsuccess'>*Thêm sản phẩm thành công</span>";
					return $alert;
				header('Location:product-detail.php');
			}else {
				header('Location:404.php');
			}
		}
		public function update_payment($payId,$quantity,$proId)
		{
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$payId = mysqli_real_escape_string($this->db->link, $payId);
			$proId = mysqli_real_escape_string($this->db->link, $proId);
			$query_up = "UPDATE tbl_payment SET quantity = '$quantity' WHERE payId = '$payId'";
			$result_update = $this->db->update($query_up);
			if($result_update){
				header('Location:payment.php');
			}
		}
		public function get_product_payment()
			{
				$sId = session_id();
				$query = "SELECT * FROM tbl_payment WHERE sId = '$sId' ";
				$result = $this->db->select($query);
				return $result;
			}
		public function del_payment_product($id)
		{
			$query = "DELETE FROM tbl_payment where payId = '$id' ";
			$result = $this->db->delete($query);
			if($result){

				header('Location:payment.php');
			}else {
				echo "</script>alert('Lỗi')</script>";
			}
		}
		public function check_payment()
			{
				$sId = session_id();
				$query = "SELECT COUNT(*) as checkpayment FROM tbl_payment WHERE sId = '$sId' ";
				$result = $this->db->select($query);
				return $result;
			}
		public function pro_order($proId,$proName,$image,$userId,$userName,$quantity,$price,$status,$ordate)
		{
			$proId = mysqli_real_escape_string($this->db->link, $proId);
			$proName = mysqli_real_escape_string($this->db->link, $proName);
			$image = mysqli_real_escape_string($this->db->link, $image);
			$userId = mysqli_real_escape_string($this->db->link, $userId);
			$userName = mysqli_real_escape_string($this->db->link, $userName);
			$quantity = $this->fm->validation($quantity); 
			$quantity = mysqli_real_escape_string($this->db->link, $quantity);
			$status = mysqli_real_escape_string($this->db->link, $status);
			$price = mysqli_real_escape_string($this->db->link, $price);
			$ordate = mysqli_real_escape_string($this->db->link, $ordate);

			$query_insert = "INSERT INTO tbl_order(proId,proName,image,userId,userName,quantity,status,price,ordate) VALUES('$proId','$proName','$image','$userId','$userName','$quantity','$status','$price','$ordate')";
			$result = $this->db->insert($query_insert);
			if($result){
				header('Location:successfully.php');
			}else {
			}
		}
	}
 ?>