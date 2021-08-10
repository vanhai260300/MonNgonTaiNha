<div class="page-wrapper">
    <div class="top-links">
        <div class="container">
            <ul class="row links">

                <li class="col-xs-12 col-sm-4 link-item"><span>1</span><a href="restaurants.php">Chọn món</a></li>
                <li class="col-xs-12 col-sm-4 link-item "><span>2</span><a href="#">Đặt hàng</a></li>
                <li class="col-xs-12 col-sm-4 link-item active"><span>3</span><a href="#">Thanh toán</a></li>
            </ul>
        </div>
    </div>
    <div class="card-cart">
        <div class="row">
            <div class="col-md-8 cart-items">
                <div class="title-cart col-sm-12">
                    <div class="row">
                        <div class="col-xs-10">
                            <h4><b>Giỏ Hàng</b></h4>
                        </div>
                        <div class="col-xs-2 align-self-center text-right text-muted"><?php echo $args['gioHang']['countMonAn']; ?> Món</div>
                    </div>
                </div>

                <div class="border-top col-sm-12">
                <?php foreach ($args['gioHang']['chitiethoadon'] as $key => $value) { 
                    
                    ?>
                    
                    <div class="main-Content align-items-center row border-bottom">
                        <div class="col-sm-2"><img class="img-fluid" src="/DoAn1/public/image/Res_img/dishes/<?php echo $value['Anh1']; ?>"></div>
                        <div class="col-sm-5">
                            <div class="row text-muted"><?php echo $value['TenMonAn']; ?></div>
                            <div class="row"><?php echo $value['TenMonAn']; ?></div>
                        </div>
                        <div class="col-sm-2"> 
                            <a>-</a>
                            <input type="text" value="<?php echo $value['SoLuong'];?>">
                            <a>+</a> 
                        </div>
                        <div class="col-sm-2"> <?php echo $value['TongTien']; ?> </div>
                        <div class="col-sm-1"><span class="close-cart text-danger btn-delt" >&#10005;</span></div>
                    </div>
                    <?php } ?>
                </div>

                <div class="back-to-shop col-sm-12"><a>&leftarrow;</a><span class="text-muted">Back to shop</span></div>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>Summary</b></h5>
                </div>
                <hr>
                <?php foreach ($args['gioHang']['ThongTinHoaDon'] as $key => $value) { ?>
                <div class="row py-1">
                    <div class="col-xs" style="padding-left:0;"><?php echo $args['gioHang']['countMonAn']; ?> Món</div>
                    <div class="col-xs text-right"><strong><?php echo $value['TongTien']; ?></strong></div>
                </div>
                <div class="row py-1">
                    <div class="col-xs" style="padding-left:0;">Phí giao hàng</div>
                    <div class="col-xs text-right"><strong><?php echo $value['PhiGiaoHang']; ?></strong></div>
                </div>
            
                <div class="row py-1" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                    <div class="col-xs">Tổng tiền</div>
                    <div class="col-xs text-right"><strong><?php echo ($value['TongTien'] + $value['PhiGiaoHang']); ?></strong></div>
                </div><a href="/DoAn1/public/thanh-toan"><button class="btn">Thanh Toán</button></a> 
                <?php } ?>
            </div>
        </div>
    </div>
</div>