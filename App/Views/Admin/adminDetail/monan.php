<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables Admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Món Ăn</li>
        </ol>
        <div class="card mb-4">
            <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                </symbol>
                <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                </symbol>
                <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                </symbol>
            </svg>
            <?php if (isset($_POST['bt-save-add'])) {
                if ($args['kq'] != true) {

            ?>
                    <div id="alertBox" class="hide">
                        <div id="alertBox" class="alert d-flex alert-primary align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                Thêm tài khoản thất bại.

                            </div>
                        </div>
                    </div>

                <?php } else { ?>
                    <div id="alertBox2" class="hide">
                        <div class="alert d-flex alert-success align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                <use xlink:href="#check-circle-fill" />
                            </svg>
                            <div>
                                Thêm tài khoản thành công.
                            </div>
                        </div>
                    </div>

            <?php }
            } ?>
            <div id="alertBox3" class="di-hide">
                <div class="alert d-flex alert-success align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    <div>
                        Cập nhật khoản thành công.
                    </div>
                </div>
            </div>
            <div id="alertBox4" class="di-hide">
                <div id="alertBox" class="alert d-flex alert-primary align-items-center" role="alert">
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                        <use xlink:href="#info-fill" />
                    </svg>
                    <div>
                        Thêm tài khoản thất bại.
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Quản lý Món Ăn
                </div>
                <div>
                    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModalAdd">Thêm Món Ăn <i class="fas fa-plus-circle"></i></a>
                </div>

            </div>
            
            <div class="card-body">
                <table id="datatablesSimple">
                    <form class="container">
                    <div class="row py-3">
                        <div class="form-check col-sm-2" style="margin:auto 0;">
                            <input class="form-check-input" type="checkbox" value="" id="checked-all">
                            <label class="form-check-label" for="checked-all">
                                Chọn tất cả
                            </label>
                        </div>
                        <div class="col-sm-3">
                            <select class="form-select" aria-label="Default select example">
                                <option selected>--Thao tác--</option>
                                <option value="1">Xóa</option>
                            </select>
                        </div>
                        <div class="col-3">
                            <button class="form-control btn btn-primary btn-check-submit disabled">Thực hiện</button>
                        </div>
                        <div class="col-3"><a href="/DoAn1/public/Admin/thung-rac"><i class="fas fa-trash-alt"></i>(<strong id='countTrash'><?php echo $args['countTrash'];?></strong>)</a></div>
                    </div>
                    
        </form>
                    
                    <thead>
                        <tr>
                            <th class="bfat">#</th>
                            <th>ID</th>
                            <th>Tên món ăn</th>
                            <th>Tên danh mục</th>
                            <th>Tên cửa hàng</th>
                            <th>Giá cả</th>
                            <th>Trạng thái</th>
                            <th class="bfat">Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th class="bfat">#</th>
                            <th>ID</th>
                            <th>Tên món ăn</th>
                            <th>Tên danh mục</th>
                            <th>Tên cửa hàng</th>
                            <th>Giá cả</th>
                            <th>Trạng thái</th>
                            <th class="bfat">Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($args['listMonAn'] as $key => $value) { ?>
                            <tr id="row_<?php echo $value['IDMonAn']; ?>">
                                <td class="bfat"><input class="form-check-input" type="checkbox" value="<?php echo $value['IDMonAn']; ?>" name="checkitems[]" id="check-item"></td>
                                <td><?php echo $value['IDMonAn']; ?></td>
                                <td><?php echo $value['TenMonAn']; ?></td>
                                <td class="hide"><?php echo $value['IDDanhMuc']; ?></td>
                                <td><?php echo $value['TenDanhMuc']; ?></td>
                                <td class="hide"><?php echo $value['IDCuaHang']; ?></td>
                                <td><?php echo $value['TenCuaHang']; ?></td>
                                <td class="hide"><?php echo $value['Anh1']; ?></td>
                                <td class="hide"><?php echo $value['Anh2']; ?></td>
                                <td class="hide"><?php echo $value['Anh3']; ?></td>
                                <td><?php echo $value['Gia']; ?></td>
                                <td><?php echo $value['TrangThai'];  ?></td>
                                <td class="hide"><?php echo $value['MoTa']; ?></td>
                                <td class="actions">
                                    <a href="" title="Sửa" data-bs-toggle="modal" class="button-ma" id="button_<?php echo $value['IDMonAn']; ?>" data-bs-target="#myModalUpdate"><i class="fas fa-edit"></i></a>
                                    <a class="bt-delete-red" onclick="deleteADmin(<?php echo $value['IDMonAn']; ?>)" title="Xóa"><i class="fas fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <!-- Modal Add -->
    <div class="modal fade" id="myModalAdd">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center">Thêm Món Ăn</h4>
                    <button title="Đóng" type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <form action="/DoAn1/public/admin/monan" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="cuahang-add" class=" form-control-label">Cửa Hàng</label></div>
                            <div class="col-12 col-md-10">
                                <select class="form-control" name="cuahang-add" id="cuahang-add">
                                    <option value="0">--Chọn tên cửa hàng--</option>
                                    <?php foreach ($args['listCuaHang'] as $key => $value) { ?>
                                        <option value="<?php echo $value['IDCuaHang']; ?>"><?php echo $value['TenCuaHang']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="danhmuc-add" class=" form-control-label">Thể Loại</label></div>
                            <div class="col-12 col-md-10">
                                <select class="form-control" name="danhmuc-add" id="danhmuc-add" value="aaa">
                                    <option value="0">--Chọn tên danh mục--</option>
                                    <?php foreach ($args['listDanhMuc'] as $key => $value) { ?>
                                        <option value="<?php echo $value['IDDanhMuc']; ?>"><?php echo $value['TenDanhMuc']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="tenmon-add" class=" form-control-label">Tên món ăn</label></div>
                            <div class="col-12 col-md-10"><input type="text" id="tenmon-add" name="tenmon-add" placeholder="Nhập tên món ăn" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="gia-add" class=" form-control-label">Giá</label></div>
                            <div class="col-12 col-md-10"><input type="number" id="gia-add" name="gia-add" placeholder="Nhập giá" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="anh1-add" class=" form-control-label">Ảnh 1</label></div>
                            <div class="col-12 col-md-10"><input type="file" id="anh1-add" name="anh1-add" placeholder="Chọn ảnh 1" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="anh2-add" class=" form-control-label">Ảnh 2</label></div>
                            <div class="col-12 col-md-10"><input type="file" id="anh2-add" name="anh2-add" placeholder="Chọn ảnh 2" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="anh3-add" class=" form-control-label">Ảnh 3</label></div>
                            <div class="col-12 col-md-10"><input type="file" id="anh3-add" name="anh3-add" placeholder="Chọn ảnh 3" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="mota-add" class=" form-control-label">Mô tả</label></div>
                            <div class="col-12 col-md-10">
                                <textarea class="form-control" name="mota-add" id="mota-add" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="trangthai-add" class=" form-control-label">Trạng thái</label></div>
                            <div class="col-12 col-md-10"><input type="text" id="trangthai-add" name="trangthai-add" placeholder="Chọn Trạng thái" class="form-control"></div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <!-- <button class="btn btn-primary" id="bt-save-ud" name="bt-save-ud" data-bs-dismiss="modal">Lưu</button> -->
                            <input type="submit" class="btn btn-primary" id="bt-save-add" name="bt-save-add" value="Lưu">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Update -->
    <div class="modal fade" id="myModalUpdate">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title text-center">Cập nhật tài khoản Admin</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <!-- action="/DoAn1/public/admin/updatetAdmin" -->
                    <form method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="id-ud" class=" form-control-label">ID</label></div>
                            <div class="col-12 col-md-10"><input type="text" id="id-ud" name="id-ud" readonly class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="cuahang-ud" class=" form-control-label">Cửa Hàng</label></div>
                            <div class="col-12 col-md-10">
                                <select class="form-control" name="cuahang-ud" id="cuahang-ud">
                                    <option value="0">--Chọn tên cửa hàng--</option>
                                    <?php foreach ($args['listCuaHang'] as $key => $value) { ?>
                                        <option value="<?php echo $value['IDCuaHang']; ?>"><?php echo $value['TenCuaHang']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="danhmuc-ud" class=" form-control-label">Thể Loại</label></div>
                            <div class="col-12 col-md-10">
                                <select class="form-control" name="danhmuc-ud" id="danhmuc-ud" value="aaa">
                                    <option value="0">--Chọn tên danh mục--</option>
                                    <?php foreach ($args['listDanhMuc'] as $key => $value) { ?>
                                        <option value="<?php echo $value['IDDanhMuc']; ?>"><?php echo $value['TenDanhMuc']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="tenmon-ud" class=" form-control-label">Tên món ăn</label></div>
                            <div class="col-12 col-md-10"><input type="text" id="tenmon-ud" name="tenmon-ud" placeholder="Nhập tên món ăn" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="gia-ud" class=" form-control-label">Giá</label></div>
                            <div class="col-12 col-md-10"><input type="number" id="gia-ud" name="gia-ud" placeholder="Nhập giá" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="anh1-ud" class=" form-control-label">Ảnh 1</label></div>
                            <div class="col-12 col-md-10"><input type="file" id="anh1-ud" name="anh1-ud" placeholder="Chọn ảnh 1" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="anh2-ud" class=" form-control-label">Ảnh 2</label></div>
                            <div class="col-12 col-md-10"><input type="file" id="anh2-ud" name="anh2-ud" placeholder="Chọn ảnh 2" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="anh3-ud" class=" form-control-label">Ảnh 3</label></div>
                            <div class="col-12 col-md-10"><input type="file" id="anh3-ud" name="anh3-ud" placeholder="Chọn ảnh 3" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="mota-ud" class=" form-control-label">Mô tả</label></div>
                            <div class="col-12 col-md-10">
                                <textarea class="form-control" name="mota-ud" id="mota-ud" rows="4"></textarea>
                            </div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-2 "><label for="trangthai-ud" class=" form-control-label">Trạng thái</label></div>
                            <div class="col-12 col-md-10"><input type="text" id="trangthai-ud" name="trangthai-ud" placeholder="Chọn Trạng thái" class="form-control"></div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <!-- <button class="btn btn-primary" id="bt-save-ud" name="bt-save-ud" data-bs-dismiss="modal">Lưu</button> -->
                            <input type="submit" class="btn btn-primary" id="bt-save-ud" name="bt-save-ud" value="Lưu">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>