<?php include 'inc/header.php'?>
<?php include '../class/product.php'?>

<?php   
  $pd = new product(); 
?>
<?php
	if(!isset($_GET['s']) && $_GET['s'] == NULL){
    echo "<script>window.locaion='index.php'</script>";
  } else{
    $s = $_GET['s'];
  }
?>
    <div id="content-wrapper" >
      <div id="content">
   		<div class="card-body">
                  <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                      <thead>
                        <tr>
                         <th scope="col">#</th>
                          <th scope="col">Tên sản phẩm</th>
                          <th scope="col">Mã sản phẩm</th>
                          <th scope="col">Số lượng</th>
                          <th scope="col">Danh mục</th>
                          <th scope="col">Màu sắc</th>
                          <th scope="col">Size</th>
                          <th scope="col">Giá niêm yết</th>
                          <th scope="col">Giá thị trường</th>
                          <th scope="col">Preview</th>
                          <th scope="col">Trạng thái</th>
                        </tr>
                      </thead>
                      <tbody>
                             <?php
                          $showOrder = $pd -> searchProductLike($s);
                          $i=0;
                          if($showOrder){
                            while ( $result = $showOrder ->fetch_assoc()) {
                              $i++;
                              ?>
                            <tr>
                              <th scope="row"><?php echo $result['proId'] ?> </th>
                              <td><?php echo $result['proName'] ?></td>
                              <td><?php echo $result['proCode'] ?></td>
                              <td><?php echo $result['quantity'] ?></td>
                              <td><?php echo $result['catId'] ?></td>
                              <td><?php echo $result['color'] ?></td>
                              <td><?php echo $result['size'] ?></td>
                              <td><?php echo number_format($result['priceOld'])."đ" ?></td>
                              <td><?php echo number_format($result['priceCurrent'])."đ" ?></td>
                              <td><img src="uploads/<?php echo $result['preImage'] ?>" width="80"></td>
                              <td><?php 
                               if($result['status']==0){echo '<span style="color:#858796">Hết hàng</span>';}else{echo '<span style="color:#4cae4c">Còn hàng</span>';}?></td>
                            </tr>
                        <?php 
                          }
                        }
                        ?>
                      </tbody>
                  </table>
                </div>
                </div>
        </div>
    </div>
<?php include'inc/footer.php' ?>
