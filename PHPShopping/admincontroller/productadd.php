<?php include 'inc/header.php'?>
<?php include '../class/brand.php'?>
<?php include '../class/category.php'?>
<?php include '../class/product.php'?>
 <?php
  // gọi class adminlogin
  $pd = new product(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $insertProduct = $pd -> insert_product($_POST, $_FILES); 
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
            <div class="input-group">
              <input type="text" class="form-control bg-light border-0 small" placeholder="Search for..." aria-label="Search" aria-describedby="basic-addon2">
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
                  <h6 class="m-0 font-weight-bold text-primary">Thêm sản phẩm mới</h6>
                </div>
                <div class="card-body">
                  <p>
                  <?php 
                  if (isset($insertProduct))
                    echo $insertProduct
                  ?>
                  </p>
                  <form action="productadd.php" method="post" enctype="multipart/form-data" class="cateadd">
                    <table class="table table-striped">
                        <tr>
                            <td>
                                <label>Tên sản phẩm <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <input type="text" placeholder="Tên sản phẩm..." class="medium" name="proName" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Mã sản phẩm <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <input type="text" placeholder="Mã sản phẩm..." class="medium" name="proCode" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Số lượng sản phẩm <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <input type="number" placeholder="Số lượng sản phẩm..." class="medium" name="quantity"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Danh mục sản phẩm <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                              <select id="select" class="medium" name="category">
                                <option>Chọn chuyên mục</option>
                                <?php 
                                $cat = new category();
                                $catList = $cat->show_category();
                                if($catList){
                                    while ($result = $catList->fetch_assoc()){
                                
                                 ?>
                                <option value="<?php echo $result['catId'] ?>"><?php echo $result['catName']?> </option>
                                
                                <?php 
                                }
                                 }
                                 ?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Nhãn hiệu <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <select id="select" class="medium" name="brandName">
                                    <option>Chọn nhãn hiệu</option>
                                    <?php
                                      $brand = new brand();
                                      $brandList= $brand ->show_brand();
                                      if ($brandList){
                                        while ( $result = $brandList ->fetch_assoc()) {
                                          # code...
                                      ?>
                                    <option value="<?php echo $result['brandId'] ?>"><?php echo $result['brandName'] ?> </option>
                                    <?php } }?>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Màu sắc</label>
                            </td>
                            <td>
                              <input type="text" placeholder="Màu sắc..." class="medium" name="color" />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Kích thước</label>
                            </td>
                            <td>
                                <input type="text" placeholder="Kích thước..." class="medium" name="size" />

                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Giá gốc <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <input type="text" placeholder="Giá gốc..." class="medium" name="priceOld" />
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Giá sau khi giảm <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <input type="text" placeholder="Giá thị trường..." class="medium" name="priceCurrent"/>
                            </td>
                        </tr>
                    
                        <tr>
                            <td>
                                <label>Upload Image <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <input type="file" class="medium" name="image"/>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Trạng thái <span style="color:red">(*) </span></label>
                            </td>
                            <td>
                                <select id="select" class="medium" name="status">
                                    <option>Trạng thái</option>
                                    <option value="1">Còn hàng</option>
                                    <option value="0">Hết</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="vertical-align: top; padding-top: 9px;">
                                <label>Mô tả sản phẩm</label>
                            </td>
                            <td>
                                <textarea class="tinymce" name="proDesc"></textarea>
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

                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
  <?php include'inc/footer.php' ?>