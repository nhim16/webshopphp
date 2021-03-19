<?php include 'inc/header.php'?>
<?php include '../class/category.php'?>
 <?php
  // gọi class adminlogin
  $cat = new category(); 
  if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
    // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
    $catName = $_POST['catName'];
    $catTitle = $_POST['catTitle'];
    $insertCat = $cat -> insert_category($catName,$catTitle); // hàm check User and Pass khi submit lên
  }
   if(isset($_GET['delId'])){
    $id = $_GET['delId'];
    $delCat = $cat -> del_category($id); 
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
          <form class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search" action="cateadd.php" method="POST">
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
                  <h6 class="m-0 font-weight-bold text-primary">Thêm danh mục sản phẩm</h6>
                </div>
                <div class="card-body">
                                 <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                      <tr>
                        <th scope="col">Id</th>
                        <th scope="col">Danh mục</th>
                        <th scope="col">Đường dẫn</th>
                        <th scope="col">Chỉnh sửa</th>
                        <th scope="col">Xóa</th>
                      </tr>
                    </thead>
                    <tbody>
                      <?php $showCat = $cat ->show_category();
                      if ($showCat){
                        $i=0;
                        while ( $result = $showCat ->fetch_assoc()) {
                          # code...
                          $i++;
                      ?>
                      <tr>
                        <th scope="row"><?php echo $result['catId'] ?></th>
                        <td><?php echo $result['catName'] ?></td>
                        <td><?php echo $result['catTitle'] ?></td>
                        <td><a href="catedit.php?catId=<?php echo $result['catId'] ?>" title="">Chỉnh sửa</a></td>
                        <td><a onclick ="return confirm('Bạn có thật sự muốn xóa không?')" href="?delId=<?php echo $result['catId'] ?>" title="">Xóa</a></td>
                      </tr>
                      <?php 
                      }
                      }
                      ?>
                    </tbody>
                  </table>
                  <p>
                    <?php 
                        if(isset($delCat))
                          echo $delCat
                      ?>
                  </p>
                </div>
                  <form action="cateadd.php" method="post" enctype="multipart/form-data" class="cateadd">
                  <table class="table table-striped">
                  <tr>
                      <td>
                          <label>Tên danh danh mục <span style="color:red">(*) </span> </label>
                      </td>
                      <td>
                          <input type="text" name="catName" placeholder="Vui lòng thêm danh mục sản phẩm..." class="medium" />
                      </td>
                  </tr>
                  <tr>
                      <td>
                          <label>Đường dẫn (BreadcrumbTitle) <span style="color:red">(*) </span></label>
                      </td>
                      <td>
                        <input type="text" placeholder="ten-danh-muc" class="medium" name="catTitle" />

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
                      <p> 
                        <?php
                          if(isset($insertCat)) 
                            echo $insertCat;
                        ?> 
                      </p>
                      <

                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  <?php include'inc/footer.php' ?>