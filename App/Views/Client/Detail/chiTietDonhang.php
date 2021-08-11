<div class="page-wrapper">
<section class="inner-page-hero bg-image" data-image-src="/DoAn1/public/image/img/dish.jpeg" style="
    background-image: url('/DoAn1/public/image/img/dish.jpeg') #25282b center center / cover no-repeat; 
    background-blend-mode: soft-light;">
        <div class="profile">
            <div class="container">
                <div class="row">
                    <?php if (isset($_SESSION['id-chuCuaHang'])) { foreach ($args['listMonAnCuaHang']['ThongTinCuaHang'] as $key => $value) { ?>
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
                    <?php }} ?>

                </div>
            </div>
        </div>
    </section>
    <div class="container">
        <div class="container">
            <div>
                <div class="_1G9Cv7 mx-3"></div>
                <div class="px-3">
                    <p class=" py-1 location"><i class="fa fa-map-marker px-1" aria-hidden="true"></i> Địa chỉ nhận hàng</p>
                    <?php foreach ($args['chiTietHoaDon']['ThongTinHoaDon'] as $key => $value) { ?>
                        <p><strong><?php echo $value['TenKH']; ?></strong>; <strong> <?php echo $value['SDT']; ?>; </strong> Email: <strong><?php echo $value['Email']; ?></strong></p>
                        <p>Địa chỉ: <strong><?php echo $value['DiaChi']; ?></strong></p>
                        <div style="display: flex;">
                            <p class="p-1">Phí Giao Hàng: <strong><?php echo number_format($value['PhiGiaoHang']); ?></strong></p>
                            <p class="p-1">Tiền Hàng: <strong><?php echo number_format($value['TongTien']); ?></strong></p>
                            <p class="p-1">Tổng Tiền: <strong><?php echo number_format($value['TongTien'] + $value['PhiGiaoHang']); ?></strong></p>
                        </div>

                        <h5>Trang thái đơn hàng: <?php echo $value['TenTrangThai']; ?></h5>
                    <?php } ?>
                    
                </div>
            </div>

        </div>
        <section class="restaurants-page py-2">
            <div class="container">
                <div class="container">
                    <h4 class="px-1">Các Món Đã Đặt</h4>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="bg-gray restaurant-entry">

                            <div class="row">

                                <table class="table">
                                    <thead>
                                        <tr>

                                            <th>Tên Món ăn</th>
                                            <th>Số Lượng</th>
                                            <th>Tổng Tiền</th>


                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($args['chiTietHoaDon']['chitiethoadon'] as $key => $value) { ?>
                                            <tr>


                                                <td> <?php echo $value['TenMonAn']; ?></td>
                                                <td><?php echo $value['SoLuong']; ?></td>
                                                <td><?php echo $value['TongTien']; ?></td>



                                            </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                            <!--end:row -->
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
</div>