<?php include 'inc/header.php'?>
<?php include '../class/category.php'?>
<?php
  if(!isset($_GET['catId']) && $_GET['catId'] == NULL){
    echo "<script>window.location='catelist.php'</script>";
  } else{
    $id = $_GET['catId'];
  }
  // gọi class adminlogin
  $cat = new category(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    $catName = $_POST['catName'];
    $catTitle = $_POST['catTitle'];
    $updateCat = $cat->update_category($catName,$catTitle,$id); // hàm check User and Pass khi submit lên
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
          <h1 class="h3 mb-4 text-gray-800">Danh mục sản phẩm</h1>

          <div class="row">
            <div class="col-lg-12">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Chỉnh sửa danh mục</h6>
                </div>
                <div class="card-body">
                  <?php 
                    $get_cat_name = $cat -> getcatbyId($id);
                    if($get_cat_name){
                      while ($result = $get_cat_name -> fetch_assoc()) {
                     
                  ?>
                  <table class="table table-striped">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Danh mục chỉnh sửa</th>
                        <th scope="col">Đường dẫn</th>

                      </tr>
                    </thead>
                    <tbody>
                      <tr>
                        <th scope="row"><?php echo $result['catId'] ;?></th>
                        <td><?php echo $result['catName'] ;?></td>
                        <td><?php echo $result['catTitle'] ;?></td>
                      </tr>
                    </tbody>
                  </table>
                  <form action="" method="post" class="cateadd">
                    <table class="table table-striped">
                        <tr>
                            <td>
                              <label>Tên danh mục mới <span style="color:red">(*) </span> </label>
                            </td>
                            <td>
                              <input type="text" placeholder="Sửa danh mục sản phẩm..." class="medium" name="catName" />
                            </td>
                        </tr>
                        <tr>
                            <td>
                              <label>Đường dẫn <span style="color:red">(*) </span> </label>
                            </td>
                            <td>
                              <input type="text" placeholder="ten-danh-muc" class="medium" name="catTitle" />
                            </td>
                        </tr>
                        <tr>
                          <td>
                            <button type="submit" class="btnadd"><a href="cateadd.php" title="" style="color:#fff">Quay lại</a></button>
                          </td>
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
                      if(isset($updateCat)) 
                        echo $updateCat;
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