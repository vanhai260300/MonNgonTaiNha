<?php

/**
 * Front controller
 *
 * PHP version 7.0
 */

/**
 * Composer
 */
require dirname(__DIR__) . '/vendor/autoload.php';

session_start();
/**
 * Error and Exception handling
 */
error_reporting(E_ALL);
set_error_handler('Core\Error::errorHandler');
set_exception_handler('Core\Error::exceptionHandler');


/**
 * Routing
 */
$router = new Core\Router();

// Add the routes CLIENT
$router->add('/DoAn1/public/', ['controller' => 'Home', 'action' => 'index']);
$router->add('/DoAn1/public/Home', ['controller' => 'Home', 'action' => 'home']);
$router->add('/DoAn1/public/ds-cua-hang', ['controller' => 'CuahangController', 'action' => 'index']);
$router->add('/DoAn1/public/cua-hang/{idmon:\d+}', ['controller' => 'CuahangController', 'action' => 'monAnOfCuaHang']);
$router->add('/DoAn1/public/cua-hang/by/{idcuahang:\d+}', ['controller' => 'CuahangController', 'action' => 'MonAnByIdCuaHang']);
$router->add('/DoAn1/public/mon-an', ['controller' => 'MonAnController', 'action' => 'index']);
$router->add('/DoAn1/public/mon-an/{id:\d+}', ['controller' => 'MonAnController', 'action' => 'index']);
$router->add('/DoAn1/public/mon-an-loai', ['controller' => 'MonAnController', 'action' => 'LoaiMon']);
$router->add('/DoAn1/public/mon-an-loai/{idcate:\d+}', ['controller' => 'MonAnController', 'action' => 'LoaiMon']);
$router->add('/DoAn1/public/mon-an-loai/{idcate:\d+}/{id:\d+}', ['controller' => 'MonAnController', 'action' => 'LoaiMon']);
$router->add('/DoAn1/public/dang-nhap', ['controller' => 'LoginController', 'action' => 'index']);
$router->add('/DoAn1/public/dang-xuat', ['controller' => 'LoginController', 'action' => 'logout']);
$router->add('/DoAn1/public/dang-ky', ['controller' => 'RegisterController', 'action' => 'index']);
//$router->add('/DoAn1/public/dat-hang', ['controller' => 'DatHangController', 'action' => 'index']);
$router->add('/DoAn1/public/them-gio-hang', ['controller' => 'DatHangController', 'action' => 'index']);
$router->add('/DoAn1/public/gio-hang', ['controller' => 'DatHangController', 'action' => 'GioHang']);
$router->add('/DoAn1/public/deleteItemCart', ['controller' => 'DatHangController', 'action' => 'DeleteItemCart']);
$router->add('/DoAn1/public/checkKhacCuaHang', ['controller' => 'DatHangController', 'action' => 'checkKhacCuaHang']);


$router->add('/DoAn1/public/thanh-toan', ['controller' => 'CheckoutController', 'action' => 'index']);
$router->add('/DoAn1/public/hoa-don', ['controller' => 'DatHangController', 'action' => 'DonHang']);
$router->add('/DoAn1/public/hoa-don/{idhd:\d+}', ['controller' => 'DatHangController', 'action' => 'capNhatHoaDon']);
//Routers Chu Cua hang
$router->add('/DoAn1/public/dang-nhap-cch', ['controller' => 'CCHLoginController', 'action' => 'index']);
$router->add('/DoAn1/public/ql-mon-an', ['controller' => 'CCHQuanLyMonAnController', 'action' => 'index']);
$router->add('/DoAn1/public/dang-xuat-cch', ['controller' => 'CCHLoginController', 'action' => 'logout']);
//Routes ADMIN
$router->add('/DoAn1/public/Admin', ['controller' => 'AdminController', 'action' => 'index']);
$router->add('/DoAn1/public/Admin/accAdmin', ['controller' => 'AdminController', 'action' => 'accAdmin']);
$router->add('/DoAn1/public/Admin/insertAdmin', ['controller' => 'AdminController', 'action' => 'insertAdmin']);
$router->add('/DoAn1/public/Admin/updateAdmin', ['controller' => 'AdminController', 'action' => 'updateAdmin']);
$router->add('/DoAn1/public/Admin/checkUsername', ['controller' => 'AdminController', 'action' => 'checkUsername']);
$router->add('/DoAn1/public/Admin/deleteAdmin', ['controller' => 'AdminController', 'action' => 'deleteAdmin']);
//Admin / Mon An
$router->add('/DoAn1/public/Admin/monan', ['controller' => 'AdMonAnController', 'action' => 'index']);
$router->add('/DoAn1/public/admin/them-MonAn', ['controller' => 'AdMonAnController', 'action' => 'insertMonAn']);
$router->add('/DoAn1/public/admin/thung-rac', ['controller' => 'AdMonAnController', 'action' => 'trashMonAn']);
$router->add('/DoAn1/public/admin/deleteMonAn', ['controller' => 'AdMonAnController', 'action' => 'deleteMonAn']);
$router->add('/DoAn1/public/admin/RestoreMonAn', ['controller' => 'AdMonAnController', 'action' => 'RestoreMonAn']);
$router->add('/DoAn1/public/admin/permanentlyDelete', ['controller' => 'AdMonAnController', 'action' => 'permanentlyDelete']);
//Admin / Danh muc
$router->add('/DoAn1/public/Admin/danh-muc', ['controller' => 'AdDanhMucController', 'action' => 'index']);
//Admin / Trang thai don hang
$router->add('/DoAn1/public/Admin/trang-thai', ['controller' => 'AdTrangThaiController', 'action' => 'index']);
//Admin / tai khaon khach hang
$router->add('/DoAn1/public/Admin/taikhoan-khachhang', ['controller' => 'AdKhachHangController', 'action' => 'index']);
//Admin / tai khoan cua hang
$router->add('/DoAn1/public/Admin/taikhoan-cuahang', ['controller' => 'AdChuCuaHangController', 'action' => 'index']);
//Admin / Nhan vien giao hang
$router->add('/DoAn1/public/Admin/nhan-vien-gh', ['controller' => 'AdNVGiaoHangController', 'action' => 'index']);
//Admin / Hoa don
$router->add('/DoAn1/public/Admin/hoa-don', ['controller' => 'AdHoaDonController', 'action' => 'index']);
//Admin / Chi tiet hoa don
$router->add('/DoAn1/public/Admin/chitiet-hoadon', ['controller' => 'AdTrangThaiController', 'action' => 'index']);
//Admin login
$router->add('/DoAn1/public/Admin/login', ['controller' => 'AdLoginController', 'action' => 'index']);
$router->add('/DoAn1/public/Admin/logout', ['controller' => 'AdLoginController', 'action' => 'logout']);


$router->dispatch($_SERVER['REQUEST_URI']);
