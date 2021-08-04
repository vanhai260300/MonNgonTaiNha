<div class="page-wrapper">
    <div class="container">
        <div class="top-links">
            <div class="container">
                <ul class="row links">

                    <li class="col-xs-12 col-sm-4 link-item "><span>1</span><a href="restaurants.php">Chọn món</a></li>
                    <li class="col-xs-12 col-sm-4 link-item"><span>2</span><a href="#">Đặt hàng</a></li>
                    <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="#">Thanh toán</a></li>
                </ul>
            </div>
        </div>
        <div>
            <div>
                <div class="_1G9Cv7 mx-3"></div>
                <div class="px-3">
                    <p class=" py-1 location"><i class="fa fa-map-marker px-1" aria-hidden="true"></i> Địa chỉ nhận hàng</p>
                    <?php foreach ($args['thongTinKhachHang'] as $key => $value) { ?>
                        <p><strong><?php echo $value['TenKH']; ?></strong>; <strong> <?php echo $value['SDT']; ?>; </strong> Email: <strong><?php echo $value['Email']; ?></strong></p>
                        <p>Địa chỉ: <strong><?php echo $value['DiaChi']; ?></strong></p>
                    <?php } ?>
                    <a class="text-primary text-reset"href="#">Thay đổi địa chỉ</a>
                </div>

            </div>

        </div>
        <div class="container m-t-30">
            <form action="" method="post">
                <div class="widget clearfix">

                    <div class="widget-body">

                        <div class="row">

                            <div class="col-sm-12">
                                <div class="cart-totals margin-b-20">
                                    <div class="cart-totals-title">
                                        <h4>Giỏ hàng gồm</h4>
                                    </div>
                                    <div class="cart-totals-fields">

                                        <table class="table">
                                            <tbody>

                                                <?php foreach ($args['gioHang']['ThongTinHoaDon'] as $key => $value) { 
                                                    $idHoaDon = $value['IDHoaDon'];
                                                    ?>

                                                    <tr>
                                                        <td>Tổng tiền hàng</td>
                                                        <td><strong><?php echo number_format($value['TongTien']); ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td>Phí giao hàng</td>
                                                        <td><strong><?php echo number_format($value['PhiGiaoHang']); ?></strong></td>
                                                    </tr>
                                                    <tr>
                                                        <td class="text-color"><strong>Tổng tiền</strong></td>
                                                        <td class="text-color"><strong><strong><?php echo number_format($value['TongTien'] + $value['PhiGiaoHang']); ?></strong></strong></td>
                                                    </tr>
                                            </tbody>
                                        <?php } ?>



                                        </table>
                                    </div>
                                </div>
                                <!--cart summary-->
                                <div class="payment-option">
                                    <ul class=" list-unstyled">
                                        <li>
                                            <label class="custom-control custom-radio  m-b-20">
                                                <input name="mod" id="radioStacked1" checked="true" value="COD" type="radio" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Thanh toán khi nhận hàng</span>

                                            </label>
                                        </li>
                                        <li>
                                            <label class="custom-control custom-radio  m-b-10">
                                                <input name="mod" type="radio" value="paypal" disabled="" class="custom-control-input"> <span class="custom-control-indicator"></span> <span class="custom-control-description">Thẻ ngân hàng<img src="images/paypal.jpg" alt="" width="90"></span> </label>
                                        </li>
                                    </ul>
                                    <p class="text-xs-center"><a href="/DoAn1/public/hoa-don/<?php echo $idHoaDon;?>"><input type="text" name="submit" class="btn btn-outline-success btn-block" value="Đặt hàng"></a>  </p>
                                </div>

                            </div>
                        </div>

                    </div>
                </div>
            </form>

        </div>
    </div>

</div>
<!-- end:page wrapper -->