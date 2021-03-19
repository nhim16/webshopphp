<?php include 'template-parts/header.php' ?>
<?php
	if(!isset($_GET['s']) && $_GET['s'] == NULL){
    echo "<script>window.locaion='index.php'</script>";
  } else{
    $s = $_GET['s'];
  }
  echo $s;
?>
<div class="main-wrapper">
	<div class="container">
		<div class="row">
    		<div class="box">
				<div class="title-cate-box">
					<div class="title-cate">
						<h2 class="title-pro">Tìm kiếm với từ khóa "<?php echo $s ?>" </h2>
					
					</div>
					<div class="box-left">
						<img src="assets/images/banner5.jpg" alt="">
					</div>
					<div class="box-right">
						<div class="box-product">
							<div class="tab-content"> 
								<div class="tab-pane container active" id="tab1"> 	
									<?php 
											$search = $product -> searchProductLike($s); 
										
								    		if ($search) {
								    			while ($result_pd = $search->fetch_assoc()) {
								    			
								    		 ?>
									<div class="item-product">
										<div class="item-product-inner">
											<div class="item-image">
												<a href="product-detail.php?proId=<?php echo $result_pd['proId']?> " title=""><img src="admincontroller/uploads/<?php echo $result_pd['preImage'] ?>" alt="<?php echo $result_pd['proName'] ?>"></a>
											</div>
											<div class="item-info">
												<div class="item-title">
													<h3><a href="product-detail.php?proId=<?php echo $result_pd['proId']?>" title="<?php echo $result_pd['proName'] ?>"><?php echo $result_pd['proName'] ?></a></h3>
												</div>
												<div class="item-price">
													<span class="price-sale"><?php echo number_format($result_pd['priceCurrent']) ?>đ</span>
													<span class="price-old"><?php echo number_format($result_pd['priceOld']) ?>đ</span>
													<?php 
														$discount = 100 - ($result_pd['priceCurrent'] / $result_pd['priceOld'] )*100;
													?>
													<span class="percent-discount">(-<?php echo number_format($discount,0 )?>%)</span>
												</div>
											</div>
										</div>
									</div>
								<?php
									}
								}
								?>
								</div>
							
							</div>
						</div>
					</div>
				</div>
			</div>

		</div>
	</div>
</div>
<?php include 'template-parts/footer.php' ?>	