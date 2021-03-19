<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../libs/database.php');
	include_once($filepath.'/../format/format.php');
?>

<?php 
	/**
	* 
	*/
	class category
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_category($catName,$catTitle){
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
			$catTitle = $this->fm->validation($catTitle); //gọi ham validation từ file Format để ktra
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$catTitle = mysqli_real_escape_string($this->db->link, $catTitle);

			 //mysqli gọi 2 biến. (catName and link) biến link -> gọi conect db từ file db
			
			if(empty($catName) || empty($catTitle)){
				$alert = "<span class='alerterror'>*Danh mục không bỏ trống</span>";
				return $alert;
			}else{
				$query = "INSERT INTO tbl_category(catName,catTitle) VALUES('$catName','$catTitle') ";
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
		public function show_category()
		{
			$query = "SELECT * FROM tbl_category order by catId asc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_category($catName,$catTitle,$id)
		{
			$catName = $this->fm->validation($catName); //gọi ham validation từ file Format để ktra
			$catTitle = $this->fm->validation($catTitle); //gọi ham validation từ file Format để ktra
			$catTitle = mysqli_real_escape_string($this->db->link, $catTitle);
			$catName = mysqli_real_escape_string($this->db->link, $catName);
			$id = mysqli_real_escape_string($this->db->link, $id);
			if(empty($catName) || empty($catTitle)){
				$alert = "<span class='alerterror'>*Danh mục không được bỏ trống</span>";
				return $alert;
			}else{
				$query = "UPDATE tbl_category SET catName= '$catName' , catTitle='$catTitle' WHERE catId = '$id' ";
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
		public function del_category($id)
		{
			$query = "DELETE FROM tbl_category where catId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='alertsuccess'>*Xóa danh mục thành công</span>";
				return $alert;
			}else {
				$alert = "<span class='alerterror'>*Lỗi</span>";
				return $alert;
			}
		}
		public function getcatbyId($id)
		{
			$query = "SELECT * FROM tbl_category where catId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_category_fontend()
		{
			$query = "SELECT * FROM tbl_category order by catId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_product_by_cat($id)
		{
			$query = "SELECT * FROM tbl_product where catId = '$id' order by catId desc LIMIT 8";
			$result = $this->db->select($query);
			return $result;
		}
		public function get_name_by_cat($id)
		{
			$query = "SELECT tbl_product.*,tbl_category.catName,tbl_category.catId 
					  FROM tbl_product,tbl_category 
					  WHERE tbl_product.catId = tbl_category.catId
					  AND tbl_product.catId ='$id' LIMIT 1 ";
			$result = $this->db->select($query);
			return $result;
		}
	}
 ?>