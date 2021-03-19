<?php include 'inc/header.php'?>
<?php include '../class/account.php'?>

 <?php
  // gọi class adminlogin
  $ac = new account(); 
      $login_check = Session::get('adminlogin');
    if ($login_check==false) {
      header('Location:login.php');
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
          <h1 class="h3 mb-4 text-gray-800">Tài khoản</h1>

          <div class="row">
            <div class="col-lg-12">

              <div class="card shadow mb-4">
                <div class="card-header py-3">
                  <h6 class="m-0 font-weight-bold text-primary">Thông tin tài khoản</h6>
                </div>
                <div class="card-body">
                          <?php 
                            $id = Session::get('adminID');
                            $get_admin = $ac->show_account($id);
                            if ($get_admin) {
                              while ($result = $get_admin->fetch_assoc()) {
                              
                             ?>
                          <form action="/" method="post"  class="cateadd">
                           <table class="table table-striped">
                        <tr>
                            <td>
                                <label>User Id:</label>
                            </td>
                            <td>
                                <label><?php echo $result['adminID'] ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Họ và tên:</label>
                            </td>
                            <td>
                              <label><?php echo $result['adminName'] ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Địa chỉ email:</label>
                            </td>
                            <td>
                              <label><?php echo $result['adminEmail'] ?></label>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                <label>Tên tài khoản:</label>
                            </td>
                            <td>
                              <label><?php echo $result['adminUser'] ?></label>
                            </td>
                        </tr>
                         <tr>
                            <td>
                                <label>Mật khẩu</label>
                            </td>
                            <td>
                                <label><?php echo md5($result['adminPass']) ?></label>
                            </td>
                        </tr>                    
                        <tr>
                            <td>
                                <label>Loại tài khoản:</label>
                            </td>
                            <td>
                                <label>
                                  <?php if ($result['adminLevel'] == 0){
                                      echo "Toàn quyền";
                                    }else{
                                        echo "Nhân viên";
                                      }
                                  ?>
                                </label>

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
                </div>
              </div>

            </div>

          </div>

        </div>
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->

  <?php include'inc/footer.php' ?>