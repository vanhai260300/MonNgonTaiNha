<div class="page-wrapper">
    <!-- top Links -->
    <div class="top-links">
        <div class="container">
            <ul class="row links">

                <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Chọn Món</a></li>
                <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Đặt Hàng</a></li>
                <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Thanh Toán</a></li>
            </ul>
        </div>
    </div>
    <!-- end:Top links -->
    <!-- start: Inner page hero -->
    <div class="inner-page-hero bg-image" data-image-src="/DoAn1/public/image/img/res.jpeg" style="background: url(&quot;/DoAn1/public/image/img/res.jpeg&quot;) center center / cover no-repeat;">
        <div class="container"> </div>
        <!-- end:Container -->
    </div>
    <div class="result-show">
        <div class="container">
            <div class="row">


            </div>
        </div>
    </div>
    <!-- //results show -->
    <section class="restaurants-page">
        <div class="container">
            <div class="row">
                <div class="col-xs-12 col-sm-5 col-md-5 col-lg-3">


                    <div class="widget clearfix">
                        <!-- /widget heading -->
                        <div class="widget-heading">
                            <h3 class="widget-title text-dark">
                                Danh Mục Món Ăn
                            </h3>
                            <div class="clearfix"></div>
                        </div>
                        <div class="widget-body">
                            <ul class="tags">
                                <?php foreach ($args['DanhMuc'] as $key => $value) { ?>
                                <li> 
                                    <a href="/DoAn1/public/mon-an-loai/<?php echo $value['IDDanhMuc'];?>" class="tag"><?php echo $value['TenDanhMuc'];?></a> 
                                </li>
                                <?php }?>
                            </ul>
                        </div>
                    </div>
                    <!-- end:Widget -->
                </div>
                <div class="col-xs-12 col-sm-7 col-md-7 col-lg-9">
                    <div class="bg-gray restaurant-entry">
                        <div class="row">
                            <?php foreach ($args['MonAnInPage']['MonAn'] as $key => $value){?>
                            <div class="col-xs-12 col-sm-6 col-md-4 food-item">
                                <div class="food-item-wrap"> 
                                    <a href="/DoAn1/public/cua-hang/<?php echo $value['IDMonAn'];?>">
                                        <div class="figure-wrap bg-image" data-image-src="/DoAn1/public/image/Res_img/dishes/<?php echo $value['Anh1'];?>" style="background: url(&quot;/DoAn1/public/image/Res_img/dishes/5ad7582e2ec9c.jpg&quot;) center center / cover no-repeat;">
                                            <div class="distance"><i class="fa fa-pin"></i>1240m</div>
                                            <div class="rating pull-left"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                            <div class="review pull-right"><a href="#">198 reviews</a> </div>
                                        </div>
                                        <div class="content">
                                            <h5><a href="/DoAn1/public/cua-hang/<?php echo $value['IDMonAn'];?>"><?php echo $value['TenMonAn'];?></a></h5>
                                            <div class="product-name"><?php echo $value['DiaChi'];?></div>
                                            <div class="price-btn-block"> <span class="price"><?php echo number_format($value['Gia']) ;?> VND</span> <a href="/DoAn1/public/cua-hang/<?php echo $value['IDMonAn'];?>" class="btn theme-btn-dash pull-right">Order Now</a> </div>
                                        </div>
                                    </a>
                                    

                                </div>
                            </div>
                            <?php }?>
                        </div>
                        <!--end:row -->
                        <div class="row">
                            <div class="col-md-12">
                                <div class="product-pagination text-center">
                                    <nav>
                                        <ul class="pagination">
                                            <?php
                                            if (isset($args['MaDanhMuc'])) {
                                                if ($args['MonAnInPage']['current_page'] > 1 && $args['MonAnInPage']['totalPages'] > 1) {
                                                    echo '<li><a aria-label="Previous" href="/DoAn1/public/mon-an-loai/'.$args["MaDanhMuc"].'/' . ($args['MonAnInPage']['current_page'] - 1) . '" ><span aria-hidden="true">«</span></a></li>  ';
                                                }
                                                for ($i = 1; $i <= $args['MonAnInPage']['totalPages']; $i++) {
                                                    echo '<li><a href="/DoAn1/public/mon-an-loai/'.$args["MaDanhMuc"].'/' . $i . '">' . $i . '</a></li>';
                                                }
                                                if ($args['MonAnInPage']['current_page'] < $args['MonAnInPage']['totalPages'] && $args['MonAnInPage']['totalPages'] > 1) {
                                                    echo '<li><a aria-label="Previous" href="/DoAn1/public/mon-an-loai/'.$args["MaDanhMuc"].'/' . ($args['MonAnInPage']['current_page'] + 1) . '" ><span aria-hidden="true">»</span></a></li>  ';
                                                }
                                            } else {
                                                if ($args['MonAnInPage']['current_page'] > 1 && $args['MonAnInPage']['totalPages'] > 1) {
                                                    echo '<li><a aria-label="Previous" href="/DoAn1/public/mon-an/' . ($args['MonAnInPage']['current_page'] - 1) . '" ><span aria-hidden="true">«</span></a></li>  ';
                                                }
                                                for ($i = 1; $i <= $args['MonAnInPage']['totalPages']; $i++) {
                                                    echo '<li><a href="/DoAn1/public/mon-an/' . $i . '">' . $i . '</a></li>';
                                                }
                                                if ($args['MonAnInPage']['current_page'] < $args['MonAnInPage']['totalPages'] && $args['MonAnInPage']['totalPages'] > 1) {
                                                    echo '<li><a aria-label="Previous" href="/DoAn1/public/mon-an/' . ($args['MonAnInPage']['current_page'] + 1) . '" ><span aria-hidden="true">»</span></a></li>  ';
                                                }
                                            }
                                            
                                            ?>


                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>



                </div>



            </div>
        </div>
    </section>
</div>