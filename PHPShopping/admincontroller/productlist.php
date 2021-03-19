<?php include 'inc/header.php'?>
<?php include '../class/product.php'?>
<?php
  // gọi class adminlogin
  $pd = new product(); 
   if(isset($_GET['delpdId'])){
    $id = $_GET['delpdId'];
    $delpd = $pd -> del_product($id); 
  }

?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" >
      <!-- Main Content -->
      <div id="content">
        <?php include 'inc/menutop.php'?>
        <div class="container-fluid">
          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Sản phẩm</h1>
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Tất cả sản phẩm </h6>
                </div>
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
                          <th scope="col">Chỉnh sửa</th>
                          <th scope="col">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                         <?php
                          $pdList = $pd -> show_product();
                          $i=0;
                          if($pdList){
                            while ( $result = $pdList ->fetch_assoc()) {
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
                              <td><a href="productedit.php?proId=<?php echo $result['proId'] ?>" title="">Chỉnh sửa</a></td>
                              <td><a onclick ="return confirm('Bạn có thật sự muốn xóa không?')" href="?delpdId=<?php echo $result['proId'] ?>" title="">Xóa</a></td>
                            </tr>
                        <?php 
                          }
                        }
                        ?>
                      </tbody>
                  </table>
                </div>
                  <p>
                  <?php 
                    if(isset($delpd))
                      echo $delpd;
                  ?>
                  </p>
                </div>
              </div>
            </div>
          </div>
        </div>

        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  <?php include'inc/footer.php' ?>