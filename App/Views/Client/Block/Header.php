<!--header starts-->
<header id="header" class="header-scroll top-header headrom animated headroom--not-top headroom--not-bottom fadeOutUp">
        <!-- .navbar -->
        <nav class="navbar navbar-dark">
            <div class="container">
                <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainNavbarCollapse">☰</button>
                <a class="navbar-brand" href="index.php"> <img class="img-rounded" src="/DoAn1/public/image/food-picky-logo.png" alt=""> </a>
                <div class="collapse navbar-toggleable-md  float-lg-right" id="mainNavbarCollapse">
                    <ul class="nav navbar-nav">
                        <?php if (isset($_SESSION['username-chuCuaHang'])) { ?>
                            <li class="nav-item"> <a class="nav-link active" href="/DoAn1/public/ql-mon-an">QUẢN LÝ MÓN ĂN<span class="sr-only">(current)</span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="/DoAn1/public/don-hang-cua-cua-hang">ĐƠN ĐẶT HÀNG<span class="sr-only"></span></a> </li>
                            <li class="nav-item"> <a class="nav-link active" href="#"><i class='fa fa-user' style='font-size:20px'></i> <?php echo $_SESSION['username-chuCuaHang']; ?><span class="sr-only"></span></a> </li>
                            <li class="nav-item"><a href="/DoAn1/public/dang-xuat-cch" class="nav-link active">ĐĂNG XUẤT</a> </li>
                        <?php } else {?>
                        <li class="nav-item"> <a class="nav-link active" href="/DoAn1/public/">TRANG CHỦ <span class="sr-only">(current)</span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="/DoAn1/public/mon-an">MÓN ĂN<span class="sr-only"></span></a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="/DoAn1/public/ds-cua-hang">CỬA HÀNG<span class="sr-only"></span></a> </li>
                        <?php }?>
                        <?php if (isset($_SESSION['username-client'])) {?>
                        <li class="nav-item"><a href="/DoAn1/public/gio-hang" class="nav-link active">GIỎ HÀNG</a> </li>
                        <li class="nav-item"><a href="/DoAn1/public/hoa-don" class="nav-link active">ĐƠN HÀNG</a> </li>
                        <li class="nav-item"> <a class="nav-link active" href="#"><i class='fa fa-user' style='font-size:20px'></i> <?php echo $_SESSION['username-client']; ?><span class="sr-only"></span></a> </li>
                        <li class="nav-item"><a href="/DoAn1/public/dang-xuat" class="nav-link active">ĐĂNG XUẤT</a> </li>
                        
                        <?php } else if (!isset($_SESSION['username-chuCuaHang'])) {?>
                        <li class="nav-item"><a href="/DoAn1/public/dang-nhap" class="nav-link active">ĐĂNG NHẬP</a> </li>
                        <li class="nav-item"><a href="/DoAn1/public/dang-ky" class="nav-link active">ĐĂNG KÝ</a> </li>
                        <li class="nav-item"><a href="/DoAn1/public/dang-nhap-cch" class="nav-link active">ĐN CỬA HÀNG</a> </li>
                        <?php }?>
                    </ul>

                </div>
                <div></div>
            </div>
        </nav>
        <!-- /.navbar -->
    </header>