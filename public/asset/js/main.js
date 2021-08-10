$(document).ready(function () {
    console.log("OK");
    $("#closecc").click(function () {
        $("#home-main").css("paddingRight", "0px");
    });
    if ($(".statusud").val() == 5) {
        $(this).prop('disabled', 'disabled');
    }
});
// $("input[name='addToCart']").click(function(e){
//     e.preventDefault();
// })
async function addToCart(idMon) {

    await addcart(idMon);

}
// $("input[name='addToCart']").click(function (e) {

// });
async function addcart(idMon) {
    idch = $("input[name='idCuaHang']").val();
    soluong = $("input[name='quantity_" + idMon + "']").val();
    idMonAn = $("input[name='IDMonAn_" + idMon + "']").val();
    console.log("id Cua Hang " + idch);
    console.log("So Luong " + soluong);
    console.log("Id Mon an " + idMonAn);
    response = "a";
    await $.post('/DoAn1/public/checkKhacCuaHang', { idch: idch }, function (re) {
        response = JSON.parse(re);
        console.log(response);
        console.log("2");
        if (response == 0 || response == 2) {
            $.post('/DoAn1/public/them-gio-hang', { idCuaHang: idch, IDMonAn: idMonAn, quantity: soluong }, function (re) {
                window.location.reload(true);
                console.log(re);
            });

        } else {
            if (confirm('Thêm món cửa hàng khác cần xóa món hiện tại?')) {
                $.post('/DoAn1/public/them-gio-hang', { idCuaHang: idch, IDMonAn: idMonAn, quantity: soluong }, function (re) {
                    window.location.reload(true);
                    console.log(re);
                });
            } else {

            }

        }
    });

}
function DeleteItemCart(idMon, idHoaDon) {

    console.log('ID Mon ' + idMon);
    console.log('ID HoaDon ' + idHoaDon);
    if (confirm('Bạn có muốn xóa món này không?')) {
        $.post('/DoAn1/public/deleteItemCart', { idMon: idMon, idHoaDon: idHoaDon }, function (re) {

            $("#item-" + idMon + "-" + idHoaDon).remove();
        });
    }


}
function updateMonAn(id) {
    // console.log(id);

    tenmon = $('.row_' + id + ' h5 a').text();
    $('#id-ud').val(id);
    console.log(tenmon);
    $('#tenmon-ud').val(tenmon);
    maDM = $('.row_' + id + ' #IDDanhMuc').val();
    $('#danhmuc-ud').val(maDM);
    gia = $('.row_' + id + ' .price').text();
    console.log(gia);
    gia = gia.replace(/\,/g, ''); // 1125, but a string, so convert it to number
    gia = parseInt(gia, 10);

    $('#Gia-ud').val(gia);
    moTa = $('.row_' + id + ' .moTa').text();
    TrangThai = $('.row_' + id + ' #TrangThai').val();
    console.log(moTa);
    $('#mota-ud').val(moTa);
    $('#TrangThai-ud').val(TrangThai);
}

function ChangeStatus(idHoaDon) {
    console.log(idHoaDon);
    status = $("#statusud_" + idHoaDon).val();
    console.log(status);
    $.post('ud-status', { idHoaDon: idHoaDon, status: status }, function (re) {
        re = JSON.parse(re);
        console.log(re);
        // if ($("#statusud_"+idHoaDon).val() == 5)
        // {
        //     $("#statusud_"+idHoaDon).prop('disabled', 'disabled');
        // }
        $('.position-fixed').fadeIn(100);
        $('.position-fixed').delay(1000).slideUp(700);
    });

}
function huyDonhang(idDonhang, idTrangThai) {
    console.log("ID Dơn " + idDonhang);
    console.log("ID TT " + idTrangThai);
    if (idTrangThai == 2) {
        if (confirm("Bạn chắc chắn muốn hủy đơn này không?")) {
            status = 1;
            $.post('ud-status', { idHoaDon: idDonhang, status: status }, function (re) {
                re = JSON.parse(re);
                console.log(re);
                window.location.reload(true);
                
            });

        } else {
            console.log("Không Xóa");
        }
    } else
        alert("Đơn hàng này không được hủy.");
}
function CheckUsserName()
{
    // console.log($("#usernameKH").val());
    unkh = $("#usernameKH").val();
    $.post("checkUNKH",{usernameKH: unkh},function (re){
        console.log(re);
        if (re == 1)
        {
            $('.tontaiUN').addClass('text-danger');
            $('.tontaiUN').text("* Tên đăng nhập đã tồn tại.");
        } else {
            if (unkh == "") {
                $('.tontaiUN').text("");
            } else {
                $('.tontaiUN').addClass('text-success');
                $('.tontaiUN').text("* Tên đăng nhập hợp lệ.");
            }   
            
        }
    });
}
function checkRepassword() {
    pass = $("#password").val();
    repass = $("#repassword").val();
    console.log(repass);
    if (repass == pass) {
        $('.checkpass').addClass('text-success');
        $(".checkpass").text("* Mật khẩu hợp lệ");
    } else {
        $('.checkpass').addClass('text-danger');
        $(".checkpass").text("* Mật khẩu không khớp");
    }
}