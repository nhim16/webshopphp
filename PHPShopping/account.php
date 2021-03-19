<?php include 'template-parts/header.php' ?>
<div class="main-wrapper">
	<div class="container">
		<div class="row">
			<div class="main-suss">
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
		</div>
	</div>
</div>
<?php include 'template-parts/footer.php' ?>	