<?php include 'inc/header.php'?>
<?php include '../class/product.php'?>
<?php include '../class/category.php'?>
<?php include '../class/brand.php' ?>

<?php
  if(!isset($_GET['proId']) && $_GET['proId'] == NULL){
    echo "<script>window.locaion='productlist.php'</script>";
  } else{
    $id = $_GET['proId'];
  }
  // gọi class adminlogin
  $pd = new product(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit']) ){
    $updateProduct = $pd->update_product($_POST, $_FILES, $id); // hàm check User and Pass khi submit lên
  }
  ?>

    <!-- Content Wrapper -->
    <div id="content-wrapper">

      <!-- Main Content -->
      <div id="content">

        <!-- Topbar -->
        <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">
          <!-- Sidebar Toggle (Topbar) -->
          <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
            <i class="fa fa-bars"></i>
          </button>
          <!-- Topbar Search -->
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="" method="POST">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2" required="">
              <div class="input-group-append">
                <button class="btn btn-primary" type="button">
                  <i class="fas fa-search fa-sm"></i>
                </button>
              </div>
            </div>
          </form>
          <!-- Topbar Navbar -->
        <?php include 'inc/menutop.php'?>
        </nav>
        <!-- End of Topbar -->
        <!-- Begin Page Content -->
        <div class="container-fluid">

          <!-- Page Heading -->
          <h1 class="h3 mb-4 text-gray-800">Sản phẩm</h1>

          <div class="row">
            <div class="col-lg-12">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa sản phẩm</h6>
                </div>
                <div class="card-body">
                  <?php 
                    $get_product_name = $pd -> getproductbyId($id);
                    if($get_product_name){
                      while ($result_pd = $get_product_name -> fetch_assoc()) {
                     
                  ?>
                 <form action="" method="post" enctype="multipart/form-data" class="cateadd">
                    <table class="table table-striped" >
                        <tr>
                            <td>
                                <label>Tên sản phẩm</label>
                            </td>
                            <td>
                                <input type="text" placeholder="<?php echo $result_pd['proName'] ?>" class="medium" name="proName"/>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Mã sản phẩm</label>
                            </td>
                            <td>
                                <input type="text" placeholder="<?php echo $result_pd['proCode'] ?>" class="medium" name="proCode"/>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Số lượng sản phẩm</label>
                            </td>
                            <td>
                                <input type="text" placeholder="<?php echo $result_pd['quantity'] ?>" class="medium" name="quantity"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Danh mục sản phẩm</label>
                            </td>
                            <td>
                              <select id="select" name="category" class="medium">
                                <option>Chọn chuyên mục</option>
                                <?php 
                                $cat = new category();
                                $catlist = $cat->show_category();
                                if($catlist){
                                    while ($result = $catlist->fetch_assoc()){
                                
                                 ?>
                               <option
                            <?php 
                            if($result['catId']==$result_pd['catId'])
                                { echo 'selected'; }
                             ?> 
                             value="<?php echo $result['catId'] ?>"><?php echo $result['catName']?></option>
                                <?php 
                                  }
                                 }
                                 ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nhãn hiệu</label>
                            </td>
                            <td>
                                <select id="select" class="medium" name="brandName">
                                    <?php
                                      $brand = new brand();
                                      $brandList= $brand ->show_brand();
                                      if ($brandList){
                                        while ( $result = $brandList ->fetch_assoc()) {
                                          # code...
                                      ?>
                                    <option
                            <?php 
                            if($result['brandId']==$result_pd['brandId'])
                                { echo 'selected'; }
                             ?> 
                             value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?></option>
                                    <?php } }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Màu sắc</label>
                            </td>
                            <td>
                              <input type="text" placeholder="<?php echo $result_pd['color'] ?>" class="medium" name="color" />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Kích thước</label>
                            </td>
                            <td>
                                <input type="text" placeholder="<?php echo $result_pd['size'] ?>" class="medium" name="size" />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giá gốc</label>
                            </td>
                            <td>
                                <input type="text" placeholder="<?php echo $result_pd['priceOld'] ?>" class="medium" name="priceOld" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Giá sau khi giảm</label>
                            </td>
                            <td>
                                <input type="text" placeholder="<?php echo $result_pd['priceCurrent'] ?>" class="medium" name="priceCurrent"/>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>
                                <label>Upload Image</label>
                            </td>
                            <td>
                                <input type="file" class="medium" name="image"/>
                            </td>
                        </tr>
                    
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Mô tả sản phẩm</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="proDesc" placeholder="<?php echo $result_pd['proDesc'] ?>"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Trạng thái</label>
                            </td>
                            <td>
                                <select id="select" class="medium" name="status">
                                  <?php 
                                  if ($result_pd['status'] ==0) {
                                   ?>
                                  <option selected value="0">Hết hàng</option>
                                  <option value="1">Còn hàng</option>
                                  <?php 
                                      }else{
                                  ?>
                                  <option selected value="1">Còn hàng</option>
                                  <option value="0">Hết hàng</option>    
                                  <?php 
                                    }
                                   ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                <input type="submit" name="submit" Value="Save" class="btnadd" />
                            </td>
                        </tr>
                    </table>
                  </form>

                  <?php 
                     }
                    }
                  ?>
                  <p> 
                    <?php
                      if(isset($updateProduct)) 
                        echo $updateProduct;
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