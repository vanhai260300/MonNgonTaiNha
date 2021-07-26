<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Quản lý Danh Mục</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="/DoAn1/public/Admin/">Dashboard</a></li>
            <li class="breadcrumb-item active">Danh Mục</li>
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
                                Thêm Danh Mục thất bại.

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
                                Thêm Danh Mục thành công.
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
                        Thêm Danh Mục thất bại.
                    </div>
                </div>
            </div>
        </div>
        <div class="card mb-4">
            <div class="card-header">
                <div>
                    <i class="fas fa-table me-1"></i>
                    Quản lý Danh Mục
                </div>
                <div>
                    <a class="btn btn-info" data-bs-toggle="modal" data-bs-target="#myModalAdd">Tạo Danh Mục <i class="fas fa-plus-circle"></i></a>
                </div>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Tên danh mục</th>
                            <th>Mô tả</th>
                            <th>Thao tác</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <?php foreach ($args['listDanhMuc'] as $key => $value) { ?>
                            <tr id="row_<?php echo $value['IDDanhMuc']; ?>">
                                <td><?php echo $value['IDDanhMuc']; ?></td>
                                <td><?php echo $value['TenDanhMuc']; ?></td>
                                <td><?php echo $value['MoTa']; ?></td>
                                <td class="actions">
                                    <a href="" title="Sửa" onclick="updateDanhMuc(<?php echo $value['IDDanhMuc']; ?>);" data-bs-toggle="modal" class="button" id="button_<?php echo $value['IDDanhMuc']; ?>" data-bs-target="#myModalUpdate"><i class="fas fa-edit"></i></a>
                                    <a class="bt-delete-red" onclick="deleteDanhMuc(<?php echo $value['IDDanhMuc']; ?>)" title="Xóa"><i class="fas fa-trash-alt"></i></a>
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
                    <h4 class="modal-title text-center">Tạo Danh Mục món ăn</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <form action="/DoAn1/public/admin/accAdmin" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenDanhMuc" class=" form-control-label">Tên Danh Mục</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenDanhMuc" name="tenDanhMuc" placeholder="Nhập Tên Danh Mục" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3"><label for="moTa-add" class=" form-control-label">Mô tả</label></div>
                            <div class="col-12 col-md-9"><input  type="text" id="moTa-add" name="moTa-add" placeholder="Nhập Mô tả" class="form-control"></div>
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
                    <h4 class="modal-title text-center">Cập nhật Danh Mục Món ăn</h4>
                    <button type="button" class="close" data-bs-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body ">
                    <!-- action="/DoAn1/public/admin/updatetAdmin" -->
                    <form action="/DoAn1/public/admin/accAdmin" method="post" enctype="multipart/form-data" class="form-horizontal">
                        <div class="row form-group my-1">
                            <div class="col  col-md-3 "><label for="tenDanhMuc" class=" form-control-label">Tên Danh Mục</label></div>
                            <div class="col-12 col-md-9"><input type="text" id="tenDanhMuc" name="tenDanhMuc" placeholder="Nhập Tên Danh Mục" class="form-control"></div>
                        </div>
                        <div class="row form-group my-1">
                            <div class="col  col-md-3"><label for="moTa-add" class=" form-control-label">Mô tả</label></div>
                            <div class="col-12 col-md-9"><input  type="text" id="moTa-add" name="moTa-add" placeholder="Nhập Mô tả" class="form-control"></div>
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
</main>