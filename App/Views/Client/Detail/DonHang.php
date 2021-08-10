<div class="page-wrapper">
    <!-- top Links -->

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
            <div class="container">

                <div class="col-xs-12 col-sm-12 col-md-12">
                    <div class="bg-gray restaurant-entry">
                        <div class="row">

                            <table class="table">
                                <thead>
                                    <tr>

                                        <th>Người nhận</th>
                                        <th>Tổng tiền</th>
                                        <th>TG Giao</th>
                                        <th>TG Nhận</th>
                                        <th>Trạng thái</th>
                                        <th>Thao Tác</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($args['HoaDonKhachHang'] as $key => $value) { ?>
                                        <tr>


                                            <td> <?php echo $value['TenKH']; ?></td>
                                            <td><?php echo number_format($value['TongTien'] + $value['PhiGiaoHang']); ?></td>
                                            <td><?php echo $value['TGGiaoHang']; ?></td>
                                            <td><?php echo $value['TGNhanHang']; ?></td>
                                            <td data-column="status">
                                                <p type="button"><span class="" aria-hidden="true"><?php echo $value['TenTrangThai']; ?></span></p>
                                            </td>
                                            <td> <?php if ($value['IDTrangThai'] == 1 || $value['IDTrangThai'] == 5) {
                                                        echo "<a></a>";
                                                    } else {
                                                    ?>
                                                    <a href="#" onclick="huyDonhang(<?php echo $value['IDHoaDon']; ?>,<?php echo $value['IDTrangThai']; ?>);">Hủy</a>
                                                <?php } ?>
                                                <a href="/DoAn1/public/chi-tiet-don-hang/<?php echo $value['IDHoaDon'];?>" class="text-primary">Chi Tiết</a>
                                            </td>

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