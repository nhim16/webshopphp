<?php include 'template-parts/header.php' ?>
<?php
     
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        // LẤY DỮ LIỆU TỪ PHƯƠNG THỨC Ở FORM POST
        $registerCustomer = $cus -> register_customer($_POST); 
    }
 ?>
<div class="main-wrapper">
    <div class="container">
        <div class="row">
            <div class="card-wrapper">
                <div class="card-left">
                    <div class="card-left_title">
                        <h2>Đăng kí tài khoản PHP SHOPPING</h2>
                    </div>
                    <div class="card">
                        <article class="card-body">
                            	<form action="" method="POST">
                                    <div class="card-body_left">
                                        <div class="form-group">
                                        	<label>Email của bạn(Nhập đúng Email để kích hoạt tài khoản)*</label>
                                            <input name="userEmail" class="form-control" placeholder="Email" type="email">
                                        </div> <!-- form-group// -->
                                        <div class="form-group">
                                        	<label>Họ và tên*</label>
                                            <input class="form-control" placeholder="Họ và tên" type="text" name="userName" required="">
                                        </div> <!-- form-group// --> 
                                        <div class="form-group">
                                            <label>Thành phố*</label>
                                            <input class="form-control" placeholder="Thành phố" type="text" name="userCity" required="">
                                        </div> <!-- form-group// --> 
                                        <div class="form-group">
                                            <label>Địa chỉ của bạn*</label>
                                            <input class="form-control" placeholder="Địa chỉ hiện tại" type="text" name="userAddress" required="">
                                        </div> <!-- form-group// --> 
                                        <div class="form-group">
                                            <label>Số điện thoại*</label>
                                            <input class="form-control" placeholder="Số điện thoại" type="text" name="userPhone" required="">
                                        </div> <!-- form-group// --> 
                                        
                                    </div>
                                    <div class="card-body_right"> 
                                        <div class="form-group">
                                            <a class="float-right" href="#">Quên mật khẩu?</a>
                                            <label>Mật khẩu*</label>
                                            <input class="form-control" placeholder="******" type="password" name="userPassword" required="">
                                        </div> <!-- form-group// --> 
                                         <div class="form-group"> 
                                        <div class="checkbox">
                                          <label> <input type="checkbox"> Lưu mật khẩu </label>
                                        </div> <!-- checkbox .// -->
                                        </div> <!-- form-group// -->  
                                         <p>
                                        <?php
                                             if(isset($registerCustomer))
                                                echo $registerCustomer;
                                        ?>
                                        </p>  
                                        <div class="form-group">
                                            <button type="submit" class="btnlogin" name="submit"> Đăng kí ngay  </button>
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
