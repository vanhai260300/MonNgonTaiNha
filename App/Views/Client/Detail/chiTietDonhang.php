<div class="page-wrapper">
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