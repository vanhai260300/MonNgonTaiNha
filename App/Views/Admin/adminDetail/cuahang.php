<main>
    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables Cửa hàng</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Cửa hàng</li>
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
            <?php if (isset($_POST['bt-save'])) {
                if ($args['kq'] != true) {

            ?>
                    <div id="alertBox" class="hide">
                        <div id="alertBox" class="alert d-flex alert-primary align-items-center" role="alert">
                            <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Info:">
                                <use xlink:href="#info-fill" />
                            </svg>
                            <div>
                                Thêm cửa hàng thất bại.

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
                                Thêm cửa hàng thành công.
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
                        Thêm cửa hàng thất bại.
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Quản lý cửa hàng Cửa hàng
                </div>
                <div>
                    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModalAdd">Tạo cửa hàng <i class="fas fa-plus-circle"></i></a>
                </div>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên Cửa Hàng</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Tên chủ cửa hàng</th>
                            <th>SDT</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Giờ mở</th>
                            <th>Giờ đóng</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên Cửa Hàng</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Tên chủ cửa hàng</th>
                            <th>SDT</th>
                            <th>Email</th>
                            <th>Địa chỉ</th>
                            <th>Giờ mở</th>
                            <th>Giờ đóng</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($args['listCuaHang'] as $key => $value) { ?>
                            <tr id = "row_<?php echo $value['IDCuaHang']; ?>">
                                <td><?php echo $value['IDCuaHang']; ?></td>
                                <td><?php echo $value['TenCuaHang']; ?></td>
                                <td><?php echo $value['TenDangNhap']; ?></td>
                                <td><?php echo $value['TenChuCuaHang']; ?></td>
                                <td><?php echo $value['SDT']; ?></td>
                                <td><?php echo $value['Email']; ?></td>
                                <td><?php echo $value['DiaChi']; ?></td>
                                <td><?php echo $value['GioMoCua']; ?></td>
                                <td><?php echo $value['GioDongCua']; ?></td>
                                <td class="actions">
                                    <a href="" title="Sửa" onclick="updateCuaHang(<?php echo $value['IDCuaHang']; ?>);" data-bs-toggle="modal" class="button" id="button_<?php echo $value['IDCuaHang']; ?>" data-bs-target="#myModalUpdate"><i class="fas fa-edit"></i></a>
                                    <a class="bt-delete-red" onclick="deleteCuaHang(<?php echo $value['IDCuaHang']; ?>)" title="Xóa"><i class="fas fa-trash-alt"></i></a>
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
                    <h4 class="modal-title text-center">Tạo cửa hàng</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <form action="/DoAn1/public/admin/them-cua-hang" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenCuaHang-add" class=" form-control-label">Tên cửa hàng</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenCuaHang-add" name="tenCuaHang-add" placeholder="Nhập Tên cửa hàng" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenChu_add" class=" form-control-label">Tên chủ cửa hàng</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenChu_add" name="tenChu_add" placeholder="Nhập Tên chủ cửa hàng" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenDangNhap-add" class=" form-control-label">Tên đăng nhập</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenDangNhap-add" name="tenDangNhap-add" placeholder="Nhập Tên đăng nhập" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="matKhau-add" class=" form-control-label">Mật khẩu</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="matKhau-add" name="matKhau-add" placeholder="Nhập Mật khẩu" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="SDT-add" class=" form-control-label">Số điện thoại</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="SDT-add" name="SDT-add" placeholder="Nhập Số điện thoại" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="Email-add" class=" form-control-label">Họ tên</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Email-add" name="Email-add" placeholder="Nhập họ tên" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="diaChi-add" class=" form-control-label">Địa Chỉ</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="diaChi-add" name="diaChi-add" placeholder="Nhập Địa Chỉ" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="gioMo-add" class=" form-control-label">Giờ mở cửa</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="gioMo-add" name="gioMo-add" placeholder="Nhập Giờ mở cửa" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="gioDong-add" class=" form-control-label">Giờ đóng cửa</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="gioDong-add" name="gioDong-add" placeholder="Nhập Giờ đóng cửa" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="GPKD-add" class=" form-control-label">Giấy phép kinh doanh</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="GPKD-add" name="GPKD-add" placeholder="Nhập Giấy phép kinh doanh" class="form-control"></div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <input href="" type="submit" class="btn btn-primary" name="bt-save-add" value="Lưu">
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
                    <h4 class="modal-title text-center">Cập nhật cửa hàng</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <!-- action="/DoAn1/public/admin/updatetAdmin" -->
                    <form action="/DoAn1/public/admin/them-cua-hang" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenCuaHang-ud" class=" form-control-label">Tên cửa hàng</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenCuaHang-ud" name="tenCuaHang-ud" placeholder="Nhập Tên cửa hàng" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenChu_ud" class=" form-control-label">Tên chủ cửa hàng</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenChu_ud" name="tenChu_ud" placeholder="Nhập Tên chủ cửa hàng" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenDangNhap-ud" class=" form-control-label">Tên đăng nhập</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenDangNhap-ud" name="tenDangNhap-ud" placeholder="Nhập Tên đăng nhập" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="matKhau-ud" class=" form-control-label">Mật khẩu</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="matKhau-ud" name="matKhau-ud" placeholder="Nhập Mật khẩu" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="SDT-ud" class=" form-control-label">Số điện thoại</label></div>
                            <div class="col-12 col-md-9"><input type="number" id="SDT-ud" name="SDT-ud" placeholder="Nhập Số điện thoại" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="Email-ud" class=" form-control-label">Họ tên</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="Email-ud" name="Email-ud" placeholder="Nhập họ tên" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="diaChi-ud" class=" form-control-label">Địa Chỉ</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="diaChi-ud" name="diaChi-ud" placeholder="Nhập Địa Chỉ" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="gioMo-ud" class=" form-control-label">Giờ mở cửa</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="gioMo-ud" name="gioMo-ud" placeholder="Nhập Giờ mở cửa" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="gioDong-ud" class=" form-control-label">Giờ đóng cửa</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="gioDong-ud" name="gioDong-ud" placeholder="Nhập Giờ đóng cửa" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="GPKD-ud" class=" form-control-label">Giấy phép kinh doanh</label></div>
                            <div class="col-12 col-md-9"><input type="file" id="GPKD-ud" name="GPKD-ud" placeholder="Nhập Giấy phép kinh doanh" class="form-control"></div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <input href="" type="submit" class="btn btn-primary" name="bt-save-ud" value="Lưu">
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </div>
</main>