<div class="page-wrapper">

    <!-- start: Inner page hero -->
    <section class="inner-page-hero bg-image" data-image-src="/DoAn1/public/image/img/dish.jpeg" style="
    background-image: url('/DoAn1/public/image/img/dish.jpeg') #25282b center center / cover no-repeat; 
    background-blend-mode: soft-light;">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <?php foreach ($args['listMonAnCuaHang']['ThongTinCuaHang'] as $key => $value) { ?>
                        <div class="col-xs-12 col-sm-12  col-md-4 col-lg-3 col-lg-4 profile-img">
                            <div class="image-wrap">
                                <figure><img src="/DoAn1/public/image/Res_img/<?php echo $value['Anh']; ?>" alt="Restaurant logo"></figure>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 profile-desc">
                            <div class="pull-left right-text white-txt">
                                <h6><a href="#"><?php echo $value['TenCuaHang']; ?></a></h6>
                                <p> <?php echo $value['DiaChi']; ?></p>
                                <ul class="nav nav-inline">
                                    <li class="nav-item"> <a class="nav-link active" href="#"><i class="fa fa-check"></i> Min 20,000</a> </li>
                                    <li class="nav-item"> <a class="nav-link" href="#"><i class="fa fa-phone"></i>
                                            <?php echo $value['SDT']; ?></a> </li>
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
    <div class="container m-t-30">
        <div class="row">
            <div class="col-xs-12 col-sm-12">
                <!-- end:Widget menu -->
                <div class="menu-widget" id="2">
                    <div class="widget-heading container">
                        <div class="row">
                            <h3 class="widget-title text-dark col-sm-12">
                                <i class="fa fa-reorder" style="font-size:18px"></i> DANH SÁCH ĐƠN HÀNG <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>

                            </h3>

                        </div>
                    </div>
                    <div class="collapse in" id="popular2">
                        <div class="container">
                            <div class="row">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Khách Hàng</th>
                                            <th>Địa Chỉ</th>
                                            <th>Ngày Đặt</th>
                                            <th>Trạng Thái</th>
                                            <th>Tổng Tiền</th>
                                            <th>Thao Tác</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php foreach ($args['DonHangCuaCuaHang'] as $key => $value) { ?>
                                        <tr>
                                            <td><?php echo $value['TenKH']; ?></td>
                                            <td><?php echo $value['DiaChi']; ?></td>
                                            <td><?php echo $value['TGGiaoHang']; ?></td>
                                            <td>
                                                <select class="form-control" name="" id="">
                                                    <option value="<?php echo $value['IDTrangThai']; ?>"><?php echo $value['TenTrangThai']; ?></option>
                                                    <!-- <option value="1">Hủy</option> -->
                                                </select>
                                                
                                            </td>
                                            <td><?php echo number_format($value['TongTien']+$value['PhiGiaoHang']); ?></td>
                                            <td><a class="text-danger" href="#">Xóa</a> <a class="text-primary" href="#">Chi Tiết</a></td>
                                        </tr>
                                    <?php } ?>

                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <!-- end:Food item -->
                    </div>
                    <!-- end:Collapse -->
                </div>
                <!-- end:Widget menu -->
            </div>
        </div>
        <!-- end:row -->
    </div>
</div>