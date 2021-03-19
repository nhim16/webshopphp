<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../libs/database.php');
	include_once($filepath.'/../format/format.php');
?>

<?php 
	/**
	* 
	*/
	class brand
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_brand($brandName){
			$brandName = $this->fm->validation($brandName); //gọi ham validation từ file Format để ktra
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			 //mysqli gọi 2 biến. (brandName and link) biến link -> gọi conect db từ file db
			
			if(empty($brandName)){
				$alert = "<span class='alerterror'>*Danh mục không bỏ trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_brand(brandName) VALUES('$brandName') ";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='alertsuccess'>*Thêm danh mục thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='alerterror'>*Không thành công</span>";
					return $alert;
				}
			}
		}
		public function show_brand()
		{
			$query = "SELECT * FROM tbl_brand order by brandId asc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_brand($brandName,$id)
		{
			$brandName = $this->fm->validation($brandName); //gọi ham validation từ file Format để ktra
			$brandName = mysqli_real_escape_string($this->db->link, $brandName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($brandName)){
				$alert = "<span class='alerterror'>*Danh mục không được bỏ trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_brand SET brandName= '$brandName' WHERE brandId = '$id' ";
				$result = $this->db->update($query);
				if($result){
					$alert = "<span class='alertsuccess'>*Lưu chỉnh sửa thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='alerterror'>*Lỗi</span>";
					return $alert;
				}
			}

		}
		public function del_brand($id)
		{
			$query = "DELETE FROM tbl_brand where brandId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='alertsuccess'>*Xóa danh mục thành công</span>";
				return $alert;
			}else {
				$alert = "<span class='alerterror'>*Lỗi</span>";
				return $alert;
			}
		}
		public function getbrandbyId($id)
		{
			$query = "SELECT * FROM tbl_brand where brandId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_brand_fontend()
		{
			$query = "SELECT * FROM tbl_brand order by brandId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_brand($id)
		{
			$query = "SELECT * FROM tbl_product where brandId = '$id' order by brandId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_brand($id)
		{
			$query = "SELECT tbl_product.*,tbl_brand.brandName,tbl_brand.brandId 
					  FROM tbl_product,tbl_brand 
					  WHERE tbl_product.brandId = tbl_brand.brandId
					  AND tbl_product.brandId ='$id' LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>