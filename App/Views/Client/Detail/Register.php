<div class="page-wrapper">
    <div class="breadcrumb">
        <div class="container">
            <ul>
                <li><a href="#" class="active">
                        <span style="color:red;"></span>
                        <span style="color:green;">
                        </span>

                    </a></li>

            </ul>
        </div>
    </div>
    <section class="contact-page inner-page">
        <div class="container">
            <div class="row">
                <!-- REGISTER -->
                <div class="col-md-8">
                    <div class="widget">
                        <div class="widget-body">

                            <form action="/DoAn1/public/dang-ky" method="post">
                                <div class="row">
                                    <?php if (isset($_POST['register']))
                                    { if ($args['KetQuaDK'] == 1){
                                        echo '<div class="alert alert-primary text-success" role="alert">
                                        Đăng ký thành công!
                                    </div>';
                                    } else if ($args['KetQuaDK'] == 0 ){
                                        echo '<div class="alert alert-primary text-danger" role="alert">
                                        Đăng ký thất bại!
                                    </div>';
                                    } else { echo "";} }?>
                                    
                                    
                                    <div>
                                        <h2 class="text-center" style="text-align: center;">ĐĂNG KÝ TÀI KHOẢN</h2>
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="fullname">Họ Tên</label>
                                        <input class="form-control" type="text" name="fullname" id="fullname" placeholder="Nhập họ tên">
                                    </div>
                                    <div class="form-group col-sm-12">
                                        <label for="usernameKH">Tên Đăng Nhập</label>
                                        <input onkeyup="CheckUsserName();" class="form-control" type="text" name="username" id="usernameKH" placeholder="Nhập Tên Đăng Nhập"> <small class="tontaiUN"></small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="password">Mật Khẩu</label>
                                        <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="repassword">Nhập Lại Mật Khẩu</label>
                                        <input onkeyup="checkRepassword();" type="password" class="form-control" name="repassword" id="repassword" placeholder="Nhập lại mật khẩu"><small class="checkpass"></small>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="Email">Email</label>
                                        <input type="text" class="form-control" name="email" id="Email" aria-describedby="emailHelp" placeholder="Nhập Email">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <label for="phone">Số Điện Thoại</label>
                                        <input class="form-control" type="number" name="phone" id="phone" placeholder="Nhập số điện thoại">
                                    </div>

                                    <div class="form-group col-sm-12">
                                        <label for="address">Địa Chỉ Giao Hàng</label>
                                        <textarea class="form-control" id="address" name="address" rows="3"></textarea>
                                    </div>

                                </div>

                                <div class="row">
                                    <div class="col-sm-4">
                                        <p> <input type="submit" value="ĐĂNG KÝ" name="register" class="btn theme-btn"> </p>
                                    </div>
                                </div>
                            </form>

                        </div>
                        <!-- end: Widget -->
                    </div>
                    <!-- /REGISTER -->
                </div>
                <!-- WHY? -->
                <div class="col-md-4">
                    <h4>Đăng ký là nhanh chóng, dễ dàng và miễn phí.</h4>
                    <p>Sau khi đăng ký, bạn có thể:</p>
                    <hr>
                    <img src="http://placehold.it/400x300" alt="" class="img-fluid">
                    <p></p>

                    <!-- end:Panel -->
                    <h4 class="m-t-20">Liên hệ Hỗ trợ khách hàng</h4>
                    <p>Nếu bạn đang tìm kiếm thêm trợ giúp hoặc có câu hỏi cần hỏi, vui lòng</p>
                    <p> <a href="#" class="btn theme-btn m-t-15">Liên Hệ</a> </p>
                </div>
                <!-- /WHY? -->
            </div>
        </div>
    </section>
</div>