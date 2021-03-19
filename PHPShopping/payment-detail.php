<?php include 'template-parts/header.php' ?>
<?php
  // gọi class adminlogin
   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delpaymentpd = $pm -> del_payment_product($id); 
  }

?>
<?php 
	$login_check = Session::get('customer_login');
	if ($login_check==false) {
		header('Location:login.php');
	}
	if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $proId = $_POST['proId'];
        $proName = $_POST['proName'];
        $userId = $_POST['userId'];
        $userName = $_POST['userName'];
        $price = $_POST['price'];
        $status = $_POST['status'];
        $ordate = $_POST['ordate'];
        $quantity = $_POST['quantity'];
        $image = $_POST['image'];

        $inserttoOrder = $pm -> pro_order($proId,$proName,$image,$userId,$userName,$quantity,$price,$status,$ordate); 
			 // hàm check catName khi submit lên
    } 

?>
<?php 
	if(session::get('customer_id')){
		$id = session::get('customer_id');
		$showCustomer = $cus -> getcustomerbyuserId($id); 
	}	
?>
<div class="main-wrapper">
	<div class="container">
		<div class="row">
			<form action="" method="POST">
			<div class="product-cart">
				<ul class="list-step">
                        <li class="item-step active"><a href="" class="box" title="Giỏ hàng">Giỏ hàng</a></li>
                        <li class="item-step "><a href="" class="box" title="Thông tin">Thông tin giao hàng</a></li>
                        <li class="item-step "><a href="" class="box" title="Thanh toán">Thanh toán</a></li>
                        <li class="item-step "><a href="" class="box" title="Xác nhận">Xác nhận</a></li>

                    </ul>
				<div class="cart-col-left">
					<div class="cart-col-top_content">
						<h2 class="title_detail_cart"><i class="fas fa-truck"></i> Thông tin giao hàng</h2>
							<div class="info-customer">
								<?php 
					    			if(session::get('customer_id')){
										$id = session::get('customer_id');
										$showCustomer = $cus -> getcustomerbyuserId($id); 
									}	
						    		if ($showCustomer) {
						    			while ($result_showCus = $showCustomer->fetch_assoc()) {
						    			
						    		 ?>
						    	<input type="hidden" name="userId" value="<?php echo $result_showCus['userId'] ?>">
 								<input type="hidden" name="userName" value="<?php echo $result_showCus['userName'] ?>">
	                           <table class="table table-striped">
	                           	<?php echo date('Y-m-d,H:i') ?>
		                        <tr>
		                            <td>
		                                <label>Họ và tên</label>
		                            </td>
		                            <td>
		                              <label><?php echo $result_showCus['userName'] ?> </label>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td>
		                                <label>Địa chỉ email</label>
		                            </td>
		                            <td>
		                              <label><?php echo $result_showCus['userEmail'] ?></label>
		                            </td>
		                        </tr>
		                        <tr>
		                            <td>
		                                <label>Địa chỉ</label>
		                            </td>
		                            <td>
		                              <label><?php echo $result_showCus['userAddress'] ?></label>
		                            </td>
		                        </tr>
		                         <tr>
		                            <td>
		                                <label>Thành phố</label>
		                            </td>
		                            <td>
		                                <label><?php echo $result_showCus['userCity'] ?></label>
		                            </td>
		                        </tr>                    
		                        <tr>
		                            <td>
		                                <label>Số điện thoại</label>
		                            </td>
		                            <td>
		                                <label>
		                                  <?php echo $result_showCus['userPhone'] ?>
		                                </label>

		                            </td>
		                        </tr>
	                    	</table>
	                    <?php } } ?>
	                    </div>
					</div>
					<div class="cart-col-left_content">
						<table class="table table-borderless">
						  <thead>
						    <tr>
						      <th scope="col">Chi tiết đơn hàng</th>
						      <th scope="col">Đơn giá</th>
						      <th scope="col">Số lượng</th>
						      <th scope="col">Thành tiền</th>
						    </tr>
						  </thead>
						  <tbody>
						  	<?php 
							$get_product_payment = $pm->get_product_payment();
							if($get_product_payment){
								$subtotal = 0;
								$qty = 0;
								while ($result_pdpm = $get_product_payment->fetch_assoc()) 
								{			
							 ?>
						    <tr>
						      	<td>
						      	<div class="img-left">
						      	<img src="admincontroller/uploads/<?php echo $result_pdpm['image'] ?>"> </div>
						      	<span><?php echo $result_pdpm['proName'] ?> </span>
						      	<div class="delproduct"><a onclick ="return confirm('Bạn có thật sự muốn xóa sản phẩm này không?')" href="?id=<?php echo $result_pdpm['payId'] ?>" title=""><i class="fas fa-trash-alt"></i> Bỏ sản phẩm</a></div>
						      </td>
						       <td class="resizetitle"><?php echo number_format($result_pdpm['price'])."đ" ?></td>
						      <td class="resizetitle"><?php echo $result_pdpm['quantity']?></td>
						      <?php $total = $result_pdpm['price']*$result_pdpm['quantity']; ?>
						      <td class="resizetitle"><?php echo number_format($total)."đ"  ?></td>
						    </tr>
						    <input type="hidden" name="proId" value="<?php echo $result_pdpm['proId'] ?>">
						    <input type="hidden" name="proName" value="<?php echo $result_pdpm['proName'] ?>">
						    <input type="hidden" name="quantity" value="<?php echo $result_pdpm['quantity']?>">
						    <input type="hidden" name="ordate" value="<?php echo date('Y-m-d,H:i') ?>">
						    <input type="hidden" name="status" value="<?php echo "1" ?>">
						   
						    <input type="hidden" name="price" value="<?php echo number_format($total)?>">
						    <input type="hidden" name="image" value="admincontroller/uploads/<?php echo $result_pdpm['image'] ?>">

							<?php } } ?>
						  </tbody>
						</table>
							<input type="submit" value="Submit" name="submit">
							</form>
					</div>
				</div>
				<div class="cart-col-right">
					<div class="cart-col-right_content">
						<div class="shippingPayment">
							<p><b>Phí vận chuyển: 55,000đ</b></p>
							<div class="row">
							<div class="infoShipping">
								<img src="assets/images/shipping.png" alt="">
							</div>
							<div class="conShipping">
								<p>Giao hàng tiết kiệm</p>
								<p>Nhận hàng sau 3-5 ngày</p>
							</div>
							</div>
						</div>
					</div>
				</div>
				<div class="cart-col-right">
					<div class="cart-col-right_content">
						<?php 
							$get_product_payment = $pm->get_product_payment();
							if($get_product_payment){
								$total = 0;
								while ($result_pdpm = $get_product_payment->fetch_assoc()) 
								{				
									$total = $total + $result_pdpm['price']*$result_pdpm['quantity'];
								}
							 ?>

						<div class="info-payment">
							<p>Tiền hàng
								<span class="info-content"><?php echo number_format($total)."đ" ?></span>
							</p>
							<p>Thuế VAT
								<span class="info-content">10%</span>
							</p>
							<p><b>Tổng tiền</b>
								<span class="info-content"><?php echo number_format($total + $total*0.1 + 55000)."đ" ?></span>
							</p>
						</div>
					<?php }  ?>
					</div>	
				</div>
				<div class="cart-col-right">
					<div class="cart-col-bottom_content">
						<p><b>Vui lòng chọn phương thức thanh toán</b></p>
						    <div class="form-group">
								<input type="radio" id="pmOffline" name="payment" value="pmOffline">
								<label for="pmOffline">Thanh toán bằng tiền mặt sau khi nhận hàng </label>
							</div>
							<div class="form-group">
								<div class="pmOnline-content">
									<input type="radio" id="pmOnline" name="payment" value="pmonlineCard">
									<label for="pmOnline">Thanh toán bằng qua Thẻ / SmartBanking</label>
									<br>
									<input type="radio" id="pmOnline" name="payment" value="pmonlineMomo">
									<label for="pmOnline"><img src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/icon-momo.svg" alt="momo" class="card-img" width="44">
	 								Thanh toán bằng ví MoMo</label>
	 								<br>
	 								<input type="radio" id="pmOnline" name="payment" value="pmonlineZalo">
									<label for="pmOnline"><img src="https://frontend.tikicdn.com/_desktop-next/static/img/icons/icon-zalopay.svg" alt="zalopay" class="card-img">
	 								Thanh toán bằng ZaloPay</label>
	 								<br>
								</div>

							<br>
							</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
<?php include 'template-parts/footer.php' ?>	