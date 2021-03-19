<?php include 'template-parts/header.php' ?>
<?php include 'template-parts/menu-top.php' ?>

<div class="main-wrapper">
	<div id="main-products" class="container">
		<div class="row">
			<div class="box">
				<div class="title-cate-box">
					<div class="title-cate">
						<h2 class="title-pro">Mua nhiều trong 24h</h2>
						<div class="cate-right">
							<ul class="nav nav-pills">
								<li class="nav-item">
								<a href="#tab1" data-toggle="tab" class="nav-link active">Thời trang</a>
								</li>
								<li class="nav-item"> 
									<a href="#tab2" data-toggle="tab" class="nav-link">Công nghệ</a>
								</li>
								<li class="nav-item">
								<a href="#tab3" data-toggle="tab" class="nav-link">Nội thất</a> 
								</li> 
								<li class="nav-item"> 
								<a href="#tab4" data-toggle="tab" class="nav-link">Trang sức</a> 
								</li>
							</ul> 
						</div>
					</div>
					<div class="box-left">
						<img src="assets/images/banner5.jpg" alt="">
					</div>
					<div class="box-right">
						<div class="box-product">
							<div class="tab-content"> 
								<div class="tab-pane container active" id="tab1"> 	
								<?php 
								  	$pd = $product->show_product();
								  	if($pd){
								  		while ($result_pd = $pd->fetch_assoc()) {
								  			      	
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
								<div class="tab-pane container fade" id="tab2"> 
									<p>Thử thay đổi gì đó khi chuyển tab.</p>
								</div> 
								<div class="tab-pane container fade" id="tab3"> 
									</p>Thử thay đổi gì đó khi chuyển tab.</p>
								</div> 
								<div class="tab-pane container fade" id="tab4"> 
									</p>Thử thay đổi gì đó khi chuyển tab.</p>
								</div> 
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="box">
				<div class="title-cate-box">
					<div class="title-cate">
						<h2 class="title-pro">Thời trang nam</h2>
						<div class="cate-right">
							<ul class="nav nav-pills">
								<li class="nav-item">
								<a href="#tab1" data-toggle="tab" class="nav-link active">Thời trang</a>
								</li>
								<li class="nav-item"> 
									<a href="#tab2" data-toggle="tab" class="nav-link">Công nghệ</a>
								</li>
								<li class="nav-item">
								<a href="#tab3" data-toggle="tab" class="nav-link">Nội thất</a> 
								</li> 
								<li class="nav-item"> 
								<a href="#tab4" data-toggle="tab" class="nav-link">Trang sức</a> 
								</li>
							</ul> 
						</div>
					</div>
					<div class="box-left">
						<img src="assets/images/banner5.jpg" alt="">
					</div>
					<div class="box-right">
						<div class="box-product">
							<div class="tab-content"> 
								<div class="tab-pane container active" id="tab1"> 	
								<?php 
								  	$pd = $product->show_product();
								  	if($pd){
								  		while ($result_pd = $pd->fetch_assoc()) {
								  			      	
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
								<div class="tab-pane container fade" id="tab2"> 
									<p>Thử thay đổi gì đó khi chuyển tab.</p>
								</div> 
								<div class="tab-pane container fade" id="tab3"> 
									</p>Thử thay đổi gì đó khi chuyển tab.</p>
								</div> 
								<div class="tab-pane container fade" id="tab4"> 
									</p>Thử thay đổi gì đó khi chuyển tab.</p>
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

