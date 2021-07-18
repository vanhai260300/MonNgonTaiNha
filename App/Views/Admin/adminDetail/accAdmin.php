<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Tables Admin</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active">Admin</li>
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
                    Quản lý tài khoản Admin
                </div>
                <div>
                    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModalAdd">Tạo tài khoản <i class="fas fa-plus-circle"></i></a>
                </div>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Mật khẩu</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Họ Tên</th>
                            <th>Tên Đăng Nhập</th>
                            <th>Mật khẩu</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($args['getAllAd'] as $key => $value) { ?>
                            <tr id = "row_<?php echo $value['IDAdmin']; ?>">
                                <td><?php echo $value['IDAdmin']; ?></td>
                                <td><?php echo $value['TenAdmin']; ?></td>
                                <td><?php echo $value['TenDangNhap']; ?></td>
                                <td><?php echo $value['MatKhau']; ?></td>
                                <td class="actions">
                                    <a href="" title="Sửa" data-bs-toggle="modal" class="button" id="button_<?php echo $value['IDAdmin']; ?>" data-bs-target="#myModalUpdate"><i class="fas fa-edit"></i></a>
                                    <a class="bt-delete-red" onclick="deleteADmin(<?php echo $value['IDAdmin']; ?>)" title="Xóa"><i class="fas fa-trash-alt"></i></a>
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
                    <h4 class="modal-title text-center">Tạo tài khoản Admin</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <form action="/DoAn1/public/admin/accAdmin" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="fullname" class=" form-control-label">Họ tên</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="fullname" name="fullname" placeholder="Nhập họ tên" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3"><label for="username" class=" form-control-label">Tên đăng nhập</label></div>
                            <div class="col-12 col-md-9"><input onkeyup="checkUserName();" type="text" id="username-add" name="username" placeholder="Nhập tên đăng nhập" class="form-control"><small class="text-danger" id="usernameNN-add"></small></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3"><label for="password" class=" form-control-label">Mật khẩu</label></div>
                            <div class="col-12 col-md-9"><input type="password" id="password" name="password" placeholder="Nhập mật khẩu" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3"><label for="repassword" class=" form-control-label">Nhập lại mật khẩu</label></div>
                            <div class="col-12 col-md-9"><input onkeyup="checkRepassword();" type="password" id="repassword" name="repassword" placeholder="Nhập lại mât khẩu" class="form-control"><small class="text-danger" id="passwordNN"></small></div>
                        </div>
                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <input href="" type="submit" class="btn btn-primary" name="bt-save" value="Lưu">
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
                            <div class="col  col-md-3 "><label for="id-ud" class=" form-control-label">ID</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="id-ud" name="id-ud" readonly class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="fullname-ud" class=" form-control-label">Họ tên</label></div>
                            <div class="col-12 col-md-9"><input onkeyup="notNull();" type="text" id="fullname-ud" name="fullname-ud" placeholder="Nhập họ tên" class="form-control"><small class="text-danger" id="fullnameNN"></small></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3"><label for="username-ud" class=" form-control-label">Tên đăng nhập</label></div>
                            <div class="col-12 col-md-9"><input onkeyup="checkUserName();" type="text" id="username-ud" name="username-ud" placeholder="Nhập tên đăng nhập" class="form-control"><small class="text-danger" id="usernameNN"></small></div>
                        </div>

                        <!-- Modal footer -->
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
                            <button onclick="saveUpdate()" class="btn btn-primary" id="bt-save-ud" name="bt-save-ud" data-bs-dismiss="modal">Lưu</button>
                            <!-- <input href="" type="submit" class="btn btn-primary" id="bt-save-ud" name="bt-save-ud" value="Lưu"> -->
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</main>