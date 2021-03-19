<?php include 'inc/header.php'?>
<?php include '../class/brand.php'?>
 <?php
  // gọi class adminlogin
  $brand = new brand(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $brandName = $_POST['brandName'];
    $insetBrand = $brand -> insert_brand($brandName); // hàm check User and Pass khi submit lên
  }
  if(isset($_GET['delId'])){
    $id = $_GET['delId'];
    $delbrand = $brand -> del_brand($id); 
  }
  ?>
    <!-- Content Wrapper -->
    <div id="content-wrapper" >
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
          <h1 class="h3 mb-4 text-gray-800">Thương hiệu sản phẩm</h1>
          <div class="row">
            <div class="col-lg-12">
              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Thêm mới thương hiệu</h6>
                </div>
                <div class="card-body">
                      <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">   
                      <thead>
                        <tr>
                          <th scope="col">Id</th>
                          <th scope="col">Tên thương hiệu</th>
                          <th scope="col">Chỉnh sửa</th>
                          <th scope="col">Xóa</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php $showbrand = $brand ->show_brand();
                        if ($showbrand){
                          $i=0;
                          while ( $result = $showbrand ->fetch_assoc()) {
                            # code...
                            $i++;
                        ?>
                        <tr>
                          <th scope="row"><?php echo $result['brandId'] ?></th>
                          <td><?php echo $result['brandName'] ?></td>
                          <td><a href="brandedit.php?brandId=<?php echo $result['brandId'] ?>" title="">Chỉnh sửa</a></td>
                          <td><a onclick ="return confirm('Bạn có thật sự muốn xóa không?')" href="?delId=<?php echo $result['brandId'] ?>" title="">Xóa</a></td>
                        </tr>
                        <?php 
                        }
                        }
                        ?>
                      </tbody>
                  </table>
                     <p>
                <?php 
                    if(isset($delbrand))
                      echo $delbrand
                  ?>
                </p>
                </div>
                  <form action="brandadd.php" method="post" class="cateadd">
                     <table class="table table-striped">
                        <tr>
                            <td>
                              <label>Tên thương hiệu <span style="color:red">(*) </span> </label>
                            </td>
                            <td>
                              <input type="text" name="brandName" placeholder="Thêm thương hiệu sản phẩm..." class="medium" />
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <button type="submit" class="btnadd"><a href="brandlist.php" title="" style="color:#fff">Quay lại</a></button>
                          </td>
                          <td>
                              <input type="submit" name="submit" Value="Save" class="btnadd" />
                          </td>
                        </tr>
                    </table>
                  </form>
                  <?php 
                    if(isset($insetBrand))
                      echo $insetBrand;
                  ?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
  <?php include'inc/footer.php' ?>