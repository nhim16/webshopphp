<?php include 'template-parts/header.php' ?>
<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $loginCustomer = $cus -> login_customer($_POST); 
    }
 ?>
<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="card-wrapper">
                <div class="card-left">
                    <div class="card-left_title">
                        <h2>Chào mừng bạn đến với PHP SHOPPING</h2>
                    </div>
                    <div class="card-title_right">
                        <div class="regsiter-redirect">
                            Bạn chưa có tài khoản ? <a href="register.php" title="">Đăng kí ngay</a>
                        </div>
                    </div>
                    <div class="card">
                        <article class="card-body">
                            	<form action="" method="POST">
                                    <div class="card-body_left">
                                        <div class="form-group">
                                        	<label>Email của bạn*</label>
                                            <input name="userEmail" class="form-control" placeholder="Email" type="email">
                                        </div> <!-- form-group// -->
                                        <div class="form-group">
                                        	<a class="float-right" href="#">Quên mật khẩu?</a>
                                        	<label>Mật khẩu*</label>
                                            <input class="form-control" placeholder="******" type="password" name="userPassword" required="">
                                        </div> <!-- form-group// --> 
                                        <div class="form-group"> 
                                        <div class="checkbox">
                                          <label> <input type="checkbox"> Lưu mật khẩu </label>

                                        </div> <!-- checkbox .// -->
                                        <p>
                                            <?php
                                                if(isset($loginCustomer)) 
                                                    echo $loginCustomer;
                                            ?>
                                        </p>
                                        </div> <!-- form-group// -->  
                                    </div>
                                    <div class="card-body_right">   
                                        <div class="form-group">
                                            <button type="submit" class="btnlogin" name="submit"> Đăng nhập ngay  </button>
                                        </div> <!-- form-group// -->   
                                        <div class="form-group">
                                            <label>Hoặc, đăng nhập bằng</label>
                                            <button type="submit" class="btnloginfb"> Facebook  </button>
                                            <button type="submit" class="btnlogingg"> Google  </button>
                                        </div> 
                                    </div>
                                </form>
                        </article>
                    </div>  
                </div>
            </div>
        </div>
    </div>
</div>
<?php include 'template-parts/footer.php' ?>    
