<?php include 'template-parts/header.php' ?>
<?php
  // gọi class adminlogin
   if(isset($_GET['id'])){
    $id = $_GET['id'];
    $delpaymentpd = $pm -> del_payment_product($id); 
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $payId = $_POST['payId'];
        $proId = $_POST['proId'];
        $quantity = $_POST['quantity'];
        $updatePayment = $pm -> update_payment($payId,$quantity,$proId); // hàm check catName khi submit lên
    } 

?>

<div class="main-wrapper">	
	<div class="container">
		<div class="row">
			<div class="product-cart">
				<ul class="list-step">
                        <li class="item-step active"><a href="payment.php" class="box" title="Giỏ hàng">Giỏ hàng</a></li>
                        <li class="item-step "><a href="payment-detail.php" class="box" title="Thông tin">Thông tin giao hàng</a></li>
                        <li class="item-step "><a href="" class="box" title="Thanh toán">Thanh toán</a></li>
                        <li class="item-step "><a href="" class="box" title="Xác nhận">Xác nhận</a></li>

                    </ul>
				<div class="cart-col-left">
					<div class="cart-col-left_content">
						<table class="table table-borderless">
						  <thead>

						    <tr>
						      <th scope="col">Đơn hàng 	</th>
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
						      <form action="" method="POST">
						      <td class="resizetitle"><?php echo number_format($result_pdpm['price'])."đ" ?></td>
						      <td class="resizetitle"><input type="number" name="quantity" min="1" value="<?php echo $result_pdpm['quantity'] ?>" style="width:45px"></td>
						      <td class="resizetitle"><?php echo number_format($result_pdpm['price']*$result_pdpm['quantity'])."đ" ?></td>
						      <td class="resizetitle">
						      		<input type="hidden" name="payId" min="0" value="<?php echo $result_pdpm['payId'] ?>"/>
										<input type="hidden" name="proId" min="0" value="<?php echo $result_pdpm['proId'] ?>"/>
										<input type="submit" name="submit" value="Update"/>
						      	</form>

						      </td>

						    </tr>
							<?php } } ?>
						  </tbody>
						</table>
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
								<span class="info-content"><?php echo number_format($total + $total*0.1)."đ" ?></span>
							</p>
						</div>
					<?php }  ?>

					</div>	
									<div class="paymentdetail">
						<a href="payment-detail.php" title="">Tiến hành thanh toán</a>
					</div>
				</div>
				<div class="cart-col-right">
					<div class="cart-col-right_content">
						<div class="coupon">
							<p><b>Mã giảm giá</b></p>
							<p>Áp dụng cho 01 lần đặt hàng</p>
							<input type="text" name="coupon" class="incoupon" />
							<button type="submit" class="btncoupon">Áp dụng</button>

						</div>
					</div>
				</div>

			</div>
		</div>
	</div>
</div>
<?php include 'template-parts/footer.php' ?>	