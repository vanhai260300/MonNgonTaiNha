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
                                            <button type="button" class="btn btn-success"><span class="fa fa-check-circle" aria-hidden="true"><?php echo $value['TenTrangThai']; ?></span></button>
                                        </td>
                                        <td> <a href="#" class="btn btn-danger btn-flat btn-addon btn-xs m-b-10"><i class="fa fa-trash-o" style="font-size:16px"></i></a>
                                        </td>
                                        
                                    </tr>
                                    <?php }?>
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