<?php include 'template-parts/header.php' ?>
<div class="main-wrapper">	
	<div class="container">
		<div class="row">
		<?php 
			if(session::get('customer_id')){
				$id = session::get('customer_id');
				$showOrder = $cus -> getorderbyuserId($id); 
			}	
			if ($showOrder) {
				while ($result = $showOrder->fetch_assoc()) {
				
			 ?>
			<div class="main-suss">
				<div class="cart-col-left_content">
						<table class="table table-borderless">
						  <thead>

						    <tr>
						      <th scope="col">ID sản phẩm</th>
						      <th scope="col">Tên sản phẩm</th>
						      <th scope="col">Preview</th>
						      <th scope="col">Số lượng</th>
						      <th scope="col">Thành tiền</th>
						      <th scope="col">Ngày đặt hàng</th>
						      <th scope="col">Trạng thái</th>
						    </tr>
						  </thead>
						  <tbody>
						    <tr>
						      	<td class="resizetitle"><?php echo $result['proId']?></td>
								<td class="resizetitle"><?php echo $result['proName']?></td>
								<td><div class="img-left">
						      	<img src="<?php echo $result['image'] ?>"> </div></td>
								<td class="resizetitle"><?php echo $result['quantity']?></td>
								<td class="resizetitle"><?php echo $result['price']." VNĐ"?></td>
								<td class="resizetitle"><?php echo $result['ordate']?></td>
								<td class="resizetitle" style="color:red"><?php 

								if ($result['status'] == 1) echo "Đang xử lý"
								?>
									
								</td>

						    </tr>
						  </tbody>
						</table>
					</div>
        	</div>
		<?php } } ?>
		</div>
	</div>
</div>
<?php include 'template-parts/footer.php' ?>	