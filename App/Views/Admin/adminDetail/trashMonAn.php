<main>

    <div class="container-fluid px-4">
        <h1 class="mt-4">Món ăn đã xóa</h1>
        <ol class="breadcrumb mb-4">
            <li class="breadcrumb-item"><a href="index.html">Dashboard</a></li>
            <li class="breadcrumb-item active"><a href="/DoAn1/public/Admin/monan">Món Ăn</a></li>
            <li class="breadcrumb-item active">Món Ăn đã xóa</li>
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
                    Quản lý Món Ăn Đã Xóa
                </div>
                <div>

                </div>

            </div>
            <div class="card-body">
                <table id="datatablesSimple">
                    
                    <div class="container">
                        <div><a href="/DoAn1/public/Admin/monan">Danh sách món ăn</a></div>
                        <div class="row py-3">
                            <div class="form-check col-sm-2" style="margin:auto 0;">
                                <input class="form-check-input" type="checkbox" value="" id="checked-all">
                                <label class="form-check-label" for="checked-all">
                                    Chọn tất cả
                                </label>
                            </div>
                            <div class="col-sm-3">
                                <select class="form-select" id="actionOfTrash" aria-label="Default select example" required>
                                    <option value="">--Chọn thao tác--</option>
                                    <option value="1">Xóa vĩnh viễn</option>
                                    <option value="2">Khôi phục</option>
                                </select>
                                <small class="text-danger" id="requiredSelect"></small>
                            </div>
                            <div class="col-3">
                                <button class="form-control btn btn-primary btn-check-submit-back disabled" data-bs-toggle="modal" data-bs-target=".ModalDelete">Thực hiện</button>
                            </div>

                        </div>
                    </div>

                    <thead>
                        <tr>
                            <th class="bfat">#</th>
                            <th>ID</th>
                            <th>Tên món ăn</th>
                            <th>Tên danh mục</th>
                            <th>Tên cửa hàng</th>
                            <th>Giá cả</th>
                            <th>Trạng thái</th>
                            
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
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                </div>
        </div>
    </div>

<!-- Modal -->
<div>
<div class="modal checkModal  fade"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Thông báo xóa.</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Bạn chắc chắn muốn xóa không?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Đóng</button>
        <button type="button" id="exceptDelete" class="btn btn-danger" data-bs-dismiss="modal">Xác nhận</button>
      </div>
    </div>
  </div>
</div>
</div>

</main>