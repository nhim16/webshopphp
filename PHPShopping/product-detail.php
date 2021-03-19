<?php include 'template-parts/header.php' ?>
<?php 
	if(!isset($_GET['proId']) && $_GET['proId'] == NULL){
    echo "<script>window.locaion='index.php'</script>";
  } else{
    $id = $_GET['proId'];
  }
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
  	$quantity = $_POST['quantity'];
  	$addtopayment = $pm -> add_to_payment($quantity,$id);
  }
?>
<div class="main-wrapper">
	<div class="container">
		<div class="row">
			<ol class="breadcrumb" style="margin:0">
				<li class="breadcrumb-item"><a href="#">Trang chủ</a></li>
				<li class="breadcrumb-item"><a href="#">Thời trang</a></li>
				<li class="breadcrumb-item active">Thời trang nam</li>
			</ol>
		</div>
	</div>
	<div id="main-products" class="container">
		<div class="row">
			<?php 
	    		$get_product_details = $product->getproductbyId($id);
	    		if ($get_product_details) {
	    			while ($result_dt = $get_product_details->fetch_assoc()) {
	    				# code...
	    			
	    		 ?>
			<div class="wrapper-detail">
				<div class="col-left-detail">
					<div class="box-content-detail">
						<div class="row">
							<div class="col-md-6">
								<div class="img-preview">
									<a href="#" title=""><img src="admincontroller/uploads/<?php echo $result_dt['preImage'] ?>" alt=""></a>
								</div>
							</div>
							<div class="col-md-6">
								<div class="box-title-detail">
									<h1 class="product-title"><?php echo $result_dt['proName'] ?></h1>
								</div>
								<div class="box-price-detail">
									<span class="price-old"><?php echo number_format($result_dt['priceOld'])."đ" ?></span>
									<span class="price-current"><?php echo number_format($result_dt['priceCurrent'] )."đ" ?></span>
									<?php 
										$discount = 100 - ($result_dt['priceCurrent'] / $result_dt['priceOld'] )*100;
									?>
									<span class="sale">(-<?php echo number_format($discount,0 )?>%)</span>
								</div>
								<div class="flash-detail">
									<span class="countdown"><i class="far fa-clock"></i> Kết thúc sau: 24h</span>
								</div>
								<div class="code-detail">
									<span class="coupon"><b>Khuyến mãi:</b> Giảm 6%</span>
								</div>
								<div class="shipment-detail">
									<div class="ship-left">
										<b>Vận chuyển:</b>
									</div>
									<div class="ship-right">
										<span><i class="fas fa-truck"></i> Hỗ trợ chi phí ship 10.000đ cho đơn hàng từ 200.000đ</span>
									</div>
								</div>
								<div class="product-attribute">
									<div class="box-colors">
										<h5 class="color"><b>Màu sắc:</b> <span class="name-color"><?php echo $result_dt['color'] ?></span></h5>
									</div>
									<div class="status">
										<h5 class="status"><b>Trạng thái:</b> 
											<span class="status">
												<?php
												if($result_dt['status']==0){echo '<span style="color:#858796">Hết hàng</span>';}else{echo '<span style="color:#4cae4c">Còn hàng</span>';} 
											?></span>
										</h5>
									</div>
									<div class="box-sizes">
										<h5 class="sizes"><b>Kích thước:</b></h5>
										<div class="list-sizes">
											<span class="size"><?php echo $result_dt['size'] ?></span>
										</div>
									</div>

								</div>
								<form action="" method="post" class="cateadd" >
									<div class="group-button">
										<div class="product-option">
											<div class="opt-quantity">
												<div class="quantity">Số lượng: </div>
												<div class="input-quantity">
			                                        <input type="number" name="quantity" min="1" max="100" value="1" id="number" class="choose-quantity" data-toggle="tooltip" data-original-title="" title="">
		                                        </div>
											</div>
											<div class="wisthlist">
			                                    <span class="txt-label">Yêu thích: </span>
			                                    <span class="fas fa-heart" id="my-heart-product" data-pid="124495" data-toggle="tooltip" title="" data-original-title="Thêm vào danh sách yêu thích"></span>
			                                </div>
										</div>
										<input type="submit" class="btn-addcart" value="Thêm vào giỏ hàng" name="submit"></input>
									</div>
								</form>
								<?php
									if(isset($addtopayment)) {
										echo $addtopayment;
									}
								?>
							</div>
						</div>
					</div>
				<div class="col-bottom-detail">
					<div class="col-bottom_content">
						<h2 class="col-bottom_content__title">Tính năng nổi bật</h2>
						<div class="tab-content"> 
							<span><?php echo $result_dt['proDesc'] ?>
							</span>							
						</div>
					</div>
				</div>
				<div class="col-bottom-detail">
					<div class="col-bottom_content">
						<h2 class="col-bottom_content__title">Review sản phẩm</h2>
						<div class="box-review">
				    		<div id="fb-root"></div>
							<script async defer crossorigin="anonymous" src="https://connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v8.0&appId=439933956980315&autoLogAppEvents=1" nonce="KIkmXZGr"></script>
							<div class="fb-comments" data-href="https://hezoshop.ml" data-numposts="5" data-width="" width="100%"></div>
				    	</div>
					</div>
				</div>
				</div>
				<div class="col-right-detail">
					<div class="box-content-detail">
						<div class="right-content">
							<span class="right-content-title">Sản phẩm cung cấp bởi:</span>
							<p><?php echo $result_dt['brandId'] ?> | Truy cập shop</p>

							<div class="right-content-col">
								<div class="right-content-col_title">
								Xếp hạng người bán tích cực
								</div>
								<p>90%</p>
							</div>
							<div class="right-content-col">
								<div class="right-content-col_title">
								Giao hàng đúng giờ
								</div>
								<p>90%</p>

							</div>
							<div class="right-content-col">
								<div class="right-content-col_title">
								Tỷ lệ phản hồi trò chuyện
							</div>
								<p>90%</p>

							</div>
						</div>
					</div>
				</div>
			</div>
		<?php } } ?>
		</div>
	</div>
</div>
<?php include 'template-parts/footer.php' ?>	