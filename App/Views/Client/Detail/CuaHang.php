<div class="page-wrapper">
        <!-- top Links -->
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item active"><span>1</span><a href="restaurants.php">Choose
                            Restaurant</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Pick Your favorite food</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>3</span><a href="#">Order and Pay online</a></li>
                </ul>
            </div>
        </div>
        <!-- end:Top links -->
        <!-- start: Inner page hero -->
        <div class="inner-page-hero bg-image" data-image-src="/DoAn1/public/image/img/res.jpeg"
            style="background: url(&quot;/DoAn1/public/image/img/res.jpeg&quot;) center center / cover no-repeat;">
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
                                    Popular tags
                                </h3>
                                <div class="clearfix"></div>
                            </div>
                            <div class="widget-body">
                                <ul class="tags">
                                <?php foreach ($args['DanhMuc'] as $key => $value) { ?>
                                <li> 
                                    <a href="#" class="tag"><?php echo $value['TenDanhMuc'];?></a> 
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
                                <?php foreach ($args['listCuaHang'] as $key => $value){ ?>
                                <div class="col-sm-12 col-md-12 col-lg-8 text-xs-center text-sm-left">
                                    <div class="entry-logo">
                                        <a class="img-fluid" href="/DoAn1/public/cua-hang/by/<?php echo $value['IDCuaHang'];?>"> <img
                                                src="/DoAn1/public/image/Res_img/<?php echo $value['Anh'];?>" alt="Food logo"></a>
                                    </div>
                                    <!-- end:Logo -->
                                    <div class="entry-dscr">
                                        <h5><a href="/DoAn1/public/cua-hang/by/<?php echo $value['IDCuaHang'];?>"><?php echo $value['TenCuaHang'];?></a></h5> <span> <?php echo $value['DiaChi'];?> <a href="#"></a></span>
                                        <ul class="list-inline">
                                            <li class="list-inline-item"><i class="fa fa-check"></i> <?php echo $value['SDT'];?></li>
                                            <li class="list-inline-item"><i class="fa fa-motorcycle"></i> 30 min</li>
                                        </ul>
                                    </div>
                                    <!-- end:Entry description -->
                                </div>

                                <div class="col-sm-12 col-md-12 col-lg-4 text-xs-center">
                                    <div class="right-content bg-white">
                                        <div class="right-review">
                                            <div class="rating-block"> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                    class="fa fa-star"></i> <i class="fa fa-star-o"></i> </div>
                                            <p> 245 Reviews</p> <a href="<?php echo $value['IDCuaHang'];?>"
                                                class="btn theme-btn-dash">View Menu</a>
                                        </div>
                                    </div>
                                    <!-- end:right info -->
                                </div>
                                <?php }?>

                                
                            </div>
                            <!--end:row -->
                        </div>



                    </div>



                </div>
            </div>
        </section>
    </div>