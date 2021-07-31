<!-- top Links -->
<div class="top-links">
    <div class="container">
        <ul class="row links">

            <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Choose
                    Restaurant</a></li>
            <li class="col-xs-12 col-sm-4 link-item active"><span>2</span><a href="dishes.php?res_id=48">Pick
                    Your favorite food</a></li>
            <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
        </ul>
    </div>
</div>
<!-- end:Top links -->
<!-- start: Inner page hero -->
<section class="inner-page-hero bg-image" data-image-src="/DoAn1/public/image/img/dish.jpeg" style="background: url(&quot;/DoAn1/public/image/img/dish.jpeg&quot;) center center / cover no-repeat;">
    <div class="profile">
        <div class="container">
            <div class="row">
                <?php foreach ($args['MonAnCuaHang']['ThongTinCuaHang'] as $key => $value) {
                    $idCuaHang = $value['IDCuaHang']; ?>
                    <div class="col-xs-12 col-sm-12  col-md-4 col-lg-4 profile-img">
                        <div class="image-wrap">
                            <figure><img src="/DoAn1/public/image/Res_img/<?php echo $value['Anh']; ?>" alt="Restaurant logo"></figure>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                        <div class="pull-left right-text white-txt">

                            <h6><a href="#"><?php echo $value['TenCuaHang']; ?></a></h6>
                            <p><?php echo $value['DiaChi']; ?></p>
                            <ul class="nav nav-inline">
                                <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min $ 10,00</a> </li>
                                <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-motorcycle"></i>
                                        30 min</a> </li>
                                <li class="nav-item ratings">
                                    <a class="nav-link" href="#"> <span>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star"></i>
                                            <i class="fa fa-star-o"></i>
                                        </span> </a>
                                </li>
                            </ul>

                        </div>
                    </div>

                <?php } ?>
            </div>
        </div>
    </div>
</section>
<!-- end:Inner page hero -->
<div class="breadcrumb">
    <div class="container">

    </div>
</div>
<div class="container m-t-30">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-4 col-lg-3">

            <div class="widget widget-cart">
                <div class="widget-heading">
                    <h3 class="widget-title text-dark">
                        Giỏ Hàng
                    </h3>


                    <div class="clearfix"></div>
                </div>
                <div class="order-row bg-white">
                    <div class="widget-body">


                        <?php foreach ($args['gioHang'] as $key => $value) { ?>

                            <div class="title-row">
                                <?php echo $value['TenMonAn']; ?><a href="">
                                    <i class="fa fa-trash pull-right"></i></a>
                            </div>

                            <div class="form-group row no-gutter">
                                <div class="col-xs-4">
                                    <input class="form-control" type="text" readonly="" value="<?php echo $value['SoLuong']; ?>" id="example-number-input">
                                </div>
                                <div class="col-xs-8">
                                    <input type="text" class="form-control b-r-0" value="<?php echo $value['TongTien']; ?>" readonly="" id="exampleSelect1">

                                </div>


                            </div>

                        <?php } ?>





                    </div>
                </div>

                <!-- end:Order row -->

                <div class="widget-body">
                    <div class="price-wrap text-xs-center">
                        <p>TOTAL</p>
                        <h3 class="value"><strong>$133.66</strong></h3>
                        <p>Free Shipping</p>
                        <a href="checkout.php?res_id=48&amp;action=check" class="btn theme-btn btn-lg">Checkout</a>
                    </div>
                </div>




            </div>
        </div>

        <div class="col-xs-12 col-sm-8 col-md-8 col-lg-6">

            <!-- end:Widget menu -->
            <div class="menu-widget" id="2">
                <div class="widget-heading">
                    <h3 class="widget-title text-dark">
                        Món Ăn phổ biến của cửa hàng! <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                            <i class="fa fa-angle-right pull-right"></i>
                            <i class="fa fa-angle-down pull-right"></i>
                        </a>
                    </h3>
                    <div class="clearfix"></div>
                </div>
                <div class="collapse in" id="popular2">
                    <div class="food-item">
                        <div class="row">
                            <?php foreach ($args['MonAnCuaHang']['MonAnCuaCuaHang'] as $key => $value) { ?>
                                <div class="col-sm-12">
                                    <div class="col-xs-12 col-sm-12 col-lg-8">
                                        <form method="post" action="dishes.php?res_id=48&amp;action=add&amp;id=11">
                                            <div class="rest-logo pull-left">
                                                <a class="restaurant-logo pull-left" href="#"><img src="/DoAn1/public/image/Res_img/dishes/<?php echo $value['Anh1']; ?>" alt="Food logo"></a>
                                            </div>
                                            <!-- end:Logo -->
                                            <div class="rest-descr">
                                                <h6><a href="#"><?php echo $value['TenMonAn']; ?></a></h6>
                                                <p> <?php echo $value['MoTa']; ?></p>
                                            </div>
                                            <!-- end:Description -->
                                        </form>
                                    </div>
                                    <!-- end:col -->
                                    <!-- action="/DoAn1/public/them-gio-hang" -->
                                    <div>
                                        <div class="col-xs-12 col-sm-12 col-lg-4 pull-right item-cart-info">
                                            <span class="price pull-left"><?php echo $value['Gia']; ?></span>
                                            <input type="text" name="quantity_<?php echo $value['IDMonAn'];?>" style="margin-left:30px;" value="1" size="2">
                                            <input type="hidden" name="idCuaHang" style="margin-left:30px;" value="<?php echo $idCuaHang; ?>" size="2">
                                            <input type="hidden" name="IDMonAn_<?php echo $value['IDMonAn'];?>" style="margin-left:30px;" value="<?php echo $value['IDMonAn']; ?>" size="2">
                                            <button onclick="addToCart(<?php echo $value['IDMonAn'];?>)" class="btn theme-btn" style="margin-left:40px;" name="addToCart" value="">Add to cart</button>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                        </div>
                        <!-- end:row -->
                    </div>
                    <!-- end:Food item -->




                </div>
                <!-- end:Collapse -->
            </div>
            <!-- end:Widget menu -->

        </div>
        <!-- end:Bar -->
        <div class="col-xs-12 col-md-12 col-lg-3">
            <div class="sidebar-wrap">
                <div class="widget clearfix">
                    <!-- /widget heading -->
                    <div class="widget-heading">
                        <h3 class="widget-title text-dark">
                            Popular tags
                        </h3>
                        <div class="clearfix"></div>
                    </div>
                    <div class="widget-body">
                        <ul class="tags">
                            <li> <a href="#" class="tag">
                                    Coupons
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Discounts
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Deals
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Amazon
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Ebay
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Fashion
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Shoes
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Kids
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Travel
                                </a> </li>
                            <li> <a href="#" class="tag">
                                    Hosting
                                </a> </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <!-- end:Right Sidebar -->
    </div>
    <!-- end:row -->
</div>
<!-- end:Container -->