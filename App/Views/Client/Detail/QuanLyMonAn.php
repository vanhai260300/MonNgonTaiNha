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
                            <h3 class="widget-title text-dark col-sm-10">
                                <i class="fa fa-reorder" style="font-size:18px"></i> DANH SÁCH MÓN ĂN <a class="btn btn-link pull-right" data-toggle="collapse" href="#popular2" aria-expanded="true">
                                    <i class="fa fa-angle-right pull-right"></i>
                                    <i class="fa fa-angle-down pull-right"></i>
                                </a>

                            </h3>
                            <div class="col-sm-2">
                                <!-- Button trigger modal -->
                                <!-- Button trigger modal -->
                                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#ModalAdd">
                                    Thêm Món
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="collapse in" id="popular2">
                        <form action="/DoAn1/public/ql-mon-an" method="post" enctype="multipart/form-data"class="container">
                            <div class="input-group row">
                                <div class="col-md-4">
                                    <input type="search" class="form-control rounded" name = "searchTenMon" placeholder="Nhập Tên Món" aria-label="Search" value="<?php if (isset($args['TuTimKiem'])) echo $args['TuTimKiem'];?>" aria-describedby="search-addon" />
                                </div>
                                <div class="col-md-2">
                                    <input type="submit" name="searchString" value="Tìm Kiếm" class="btn btn-outline-primary">
                                </div>
                            </div>
                        </form>
                        <div class="container">


                            <div class="row">
                                <?php foreach ($args['listMonAnCuaHang']['MonAnCuaCuaHang'] as $key => $value) { ?>
                                    <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3 food-item">
                                        <div class="food-item-wrap row_<?php echo $value['IDMonAn']; ?>">
                                            <div class="figure-wrap bg-image" data-image-src="/DoAn1/public/image/Res_img/dishes/<?php echo $value['Anh1']; ?>" style="background: url(&quot;Res_img/dishes/5ad7582e2ec9c.jpg&quot;) center center / cover no-repeat;">

                                            </div>
                                            <div class="content">
                                                <h5><a><?php echo $value['TenMonAn']; ?></a></h5>
                                                <div class="product-name product-name2"><?php echo $value['TenDanhMuc']; ?></div>
                                                <input type="hidden" id="IDDanhMuc" value="<?php echo $value['IDDanhMuc']; ?>">
                                                <input type="hidden" id="TrangThai" value="<?php echo $value['TrangThai']; ?>">
                                                <div class="product-name product-name2 moTa"><?php echo $value['MoTa']; ?></div>
                                                <div class="price-btn-block"> <span class="price"><?php echo number_format($value['Gia']); ?></span></div>
                                                <div>
                                                    <a onclick="updateMonAn(<?php echo $value['IDMonAn']; ?>);" type="button" class="btn pull-right" data-toggle="modal" data-target="#ModalEdit">
                                                        Sửa
                                                    </a>

                                                    <a href="/DoAn1/public/delete-mon-an/<?php echo $value['IDMonAn']; ?>" onclick="return confirm('Bạn chắc chắn muốn xóa?');" class="btn pull-right">Xóa</a>
                                                </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } ?>
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

<!-- Modal Add -->
<div class="modal fade" id="ModalAdd" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form role="form" action="/DoAn1/public/ql-mon-an" method="POST" enctype="multipart/form-data" class="modal-content form-control">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">THÊM MÓN ĂN</h5>
                <button type="button" class="close" id="closecc" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="danhmuc-add" class=" form-control-label">Thể Loại</label></div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" name="danhmuc-add" id="danhmuc-add" value="aaa">

                            <option value="0">--Chọn tên danh mục--</option>
                            <?php foreach ($args['listDanhMuc'] as $key => $value) { ?>
                                <option value="<?php echo $value['IDDanhMuc']; ?>"><?php echo $value['TenDanhMuc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="tenmon-add" class=" form-control-label">Tên món ăn</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="tenmon-add" name="tenmon-add" placeholder="Nhập tên món ăn" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="Gia-add" class=" form-control-label">Giá</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="Gia-add" name="Gia-add" placeholder="Nhập Giá" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="anh1-add" class=" form-control-label">Ảnh 1</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="anh1-add" name="anh1-add" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="anh2-add" class=" form-control-label">Ảnh 2</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="anh2-add" name="anh2-add" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="anh3-add" class=" form-control-label">Ảnh 3</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="anh3-add" name="anh3-add" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="mota-add" class=" form-control-label">Mô tả</label></div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" name="mota-add" id="mota-add" rows="4"></textarea>
                    </div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="TrangThai-add" class=" form-control-label">Chọn Trạng Thái</label></div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" name="TrangThai-add" id="TrangThai-add" value="aaa">
                            <option value="0">--Chọn Trạng Thái--</option>

                            <option value="CO">Có</option>
                            <option value="KO">Không</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closecc" data-dismiss="modal">Đóng</button>
                <button type="submit" class="btn btn-primary" name="bt-save-add">Lưu</button>
            </div>
        </form>
    </div>
</div>
<!-- Modal Edit -->
<div class="modal fade" id="ModalEdit" tabindex="1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form role="form" action="/DoAn1/public/ql-mon-an" method="POST" enctype="multipart/form-data" class="modal-content form-control">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">SỬA MÓN ĂN</h5>
                <button type="button" class="close" id="closecc" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">

                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="danhmuc-ud" class=" form-control-label">Thể Loại</label></div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" name="danhmuc-ud" id="danhmuc-ud" value="aaa">

                            <option value="0">--Chọn tên danh mục--</option>
                            <?php foreach ($args['listDanhMuc'] as $key => $value) { ?>
                                <option value="<?php echo $value['IDDanhMuc']; ?>"><?php echo $value['TenDanhMuc']; ?></option>
                            <?php } ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group my-1">
                    <input type="hidden" name="id-ud" id="id-ud">
                    <div class="col  col-md-3 "><label class="label-color" for="tenmon-ud" class=" form-control-label">Tên món ăn</label></div>
                    <div class="col-12 col-md-9"><input type="text" id="tenmon-ud" name="tenmon-ud" placeholder="Nhập tên món ăn" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="Gia-ud" class=" form-control-label">Giá</label></div>
                    <div class="col-12 col-md-9"><input type="number" id="Gia-ud" name="Gia-ud" placeholder="Nhập Giá" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="anh1-ud" class=" form-control-label">Ảnh 1</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="anh1-ud" name="anh1-ud" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="anh2-ud" class=" form-control-label">Ảnh 2</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="anh2-ud" name="anh2-ud" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="anh3-ud" class=" form-control-label">Ảnh 3</label></div>
                    <div class="col-12 col-md-9"><input type="file" id="anh3-ud" name="anh3-ud" class="form-control"></div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="mota-ud" class=" form-control-label">Mô tả</label></div>
                    <div class="col-12 col-md-9">
                        <textarea class="form-control" name="mota-ud" id="mota-ud" rows="4"></textarea>
                    </div>
                </div>
                <div class="row form-group my-1">
                    <div class="col  col-md-3 "><label class="label-color" for="TrangThai-ud" class=" form-control-label">Chọn Trạng Thái</label></div>
                    <div class="col-12 col-md-9">
                        <select class="form-control" name="TrangThai-ud" id="TrangThai-ud" value="aaa">
                            <option value="0">--Chọn Trạng Thái--</option>

                            <option value="CO">Có</option>
                            <option value="KO">Không</option>

                        </select>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="closecc" data-dismiss="modal">Đóng</button>
                <button type="submit" onclick="return window.location.reload(true);" class="btn btn-primary" name="bt-save-ud">Lưu</button>
            </div>
        </form>
    </div>
</div>