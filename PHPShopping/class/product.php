<?php
	$filepath = realpath(dirname(__FILE__));
	include_once($filepath.'/../libs/database.php');
	include_once($filepath.'/../format/format.php');
?>

<?php 
	/**
	* 
	*/
	class product
	{
		private $db;
		private $fm;
		public function __construct()
		{
			$this->db = new Database();
			$this->fm = new Format();
		}
		public function insert_product($data,$files){
			
			$proName = mysqli_real_escape_string($this->db->link, $data['proName']);
			$proCode = mysqli_real_escape_string($this->db->link, $data['proCode']);
			$quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);
			$color = mysqli_real_escape_string($this->db->link, $data['color']);
			$size = mysqli_real_escape_string($this->db->link, $data['size']);
			$priceOld = mysqli_real_escape_string($this->db->link, $data['priceOld']);
			$priceCurrent = mysqli_real_escape_string($this->db->link, $data['priceCurrent']);
			$status = mysqli_real_escape_string($this->db->link, $data['status']);
			$proDesc = mysqli_real_escape_string($this->db->link, $data['proDesc']);

			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($category ="" || $proName == "" || $brandName == "" || $color == "" || $size == "" || $proDesc == "" || $priceOld == "" || $status == "" || $file_name == "" || $quantity="" || $proCode=""){
				$alert = "<span class='alerterror'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				move_uploaded_file($file_temp, $uploaded_image);

				$query = "INSERT INTO tbl_product(proName,proCode,quantity,catId,brandId,color,size,priceOld,priceCurrent,preImage,proDesc,status) VALUES('$proName','$proCode','$quantity','$category','$brandName','$color','$size','$priceOld','$priceCurrent','$unique_image','$proDesc','$status')";
				$result = $this->db->insert($query);
				if($result){
					$alert = "<span class='alertsuccess'>*Thêm sản phẩm thành công</span>";
					return $alert;
				}else {
					$alert = "<span class='alerterror'>*Lỗi</span>";
					return $alert;
				}
			}
		}

		public function show_product()
		{
			$query = "SELECT * FROM tbl_product order by proId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function show_order()
		{
			$query = "SELECT * FROM tbl_order order by orderId desc ";
			$result = $this->db->select($query);
			return $result;
		}
		public function del_product($id)
		{
			$query = "DELETE FROM tbl_product where proId = '$id' ";
			$result = $this->db->delete($query);
			if($result){
				$alert = "<span class='alertsuccess'>*Xóa thành công sản phẩm</span>";
				return $alert;
			}else {
				$alert = "<span class='alertsuccess'>Lỗi</span>";
				return $alert;
			}
		}
		public function getproductbyId($id)
		{
			$query = "SELECT * FROM tbl_product where proId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function getproductbycatId($id)
		{
			$query = "SELECT * FROM tbl_product where catId = '$id' ";
			$result = $this->db->select($query);
			return $result;
		}
		public function searchProductLike($s)
		{
			$query = "SELECT * FROM tbl_product WHERE proName LIKE '%s%'";
			$result = $this->db->select($query);
			return $result;
		}
		public function update_product($data,$files,$id){
	
			$proName = mysqli_real_escape_string($this->db->link, $data['proName']);
			$proCode = mysqli_real_escape_string($this->db->link, $data['proCode']);
			$quantity = mysqli_real_escape_string($this->db->link, $data['quantity']);
			$category = mysqli_real_escape_string($this->db->link, $data['category']);
			$brandName = mysqli_real_escape_string($this->db->link, $data['brandName']);
			$color = mysqli_real_escape_string($this->db->link, $data['color']);
			$size = mysqli_real_escape_string($this->db->link, $data['size']);
			$priceOld = mysqli_real_escape_string($this->db->link, $data['priceOld']);
			$priceCurrent = mysqli_real_escape_string($this->db->link, $data['priceCurrent']);
			$status = mysqli_real_escape_string($this->db->link, $data['status']);
			$proDesc = mysqli_real_escape_string($this->db->link, $data['proDesc']);

			
			// kiểm tra hình ảnh và lấy hình ảnh cho vào folder upload
			$permited = array('jpg','jpeg','png','gif');
			$file_name = $_FILES['image']['name'];
			$file_size = $_FILES['image']['size'];
			$file_temp = $_FILES['image']['tmp_name'];
			
			$div =explode('.', $file_name);
			$file_ext = strtolower(end($div));
			$unique_image = substr(md5(time()), 0,10).'.'.$file_ext;
			$uploaded_image = "uploads/".$unique_image;

			if($category ="" || $proName == "" || $brandName == "" || $color == "" || $size == "" || $proDesc == "" || $priceOld == "" || $status == "" || $file_name == "" || $quantity="" || $proCode=""){
				$alert = "<span class='alerterror'>Fiedls must be not empty</span>";
				return $alert;
			}else{
				if(!empty($file_name)){
					move_uploaded_file($file_temp,$uploaded_image);
					$query = "UPDATE tbl_product SET
					proName = '$proName',
					proCode = '$proCode',
					quantity = '$quantity',
					brandId = '$brandName',
					catId = '$category', 
					status = '$status', 
					priceOld = '$priceOld', 
					priceCurrent= '$priceCurrent', 
					preImage = '$unique_image',
					proDesc = '$proDesc',
					color = '$color',
					size = '$size'
					WHERE proId = '$id' ";
					
				}else{
					//Nếu người dùng không chọn ảnh
					$query = "UPDATE tbl_product SET
					proName = '$proName',
					proCode = '$proCode',
					quantity = '$quantity',
					brandId = '$brandName',
					catId = '$category', 
					status = '$status', 
					priceOld = '$priceOld', 
					priceCurrent= '$priceCurrent', 
					preImage = '$unique_image',
					proDesc = '$proDesc',
					color = '$color',
					size = '$size'
					WHERE proId = '$id' ";
					
				}
				$result = $this->db->update($query);
					if($result){
						$alert = "<span class='alertsuccess'>*Sản phẩm Updated thành công</span>";
						return $alert;
					}else{
						$alert = "<span class='alerterror'>*Sản phẩm Updated không thành công</span>";
						return $alert;
					}
				
				}

			}
			public function count_product()
			{
				$query = "SELECT COUNT(*) as total FROM tbl_product ";
				$result = $this->db->select($query);
				return $result;
			}
	}
 ?>