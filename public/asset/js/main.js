$(document).ready(function () {
    console.log("OK");


});
// $("input[name='addToCart']").click(function(e){
//     e.preventDefault();
// })
async function addToCart(idMon){
    
    await addcart(idMon);
    
}
// $("input[name='addToCart']").click(function (e) {
    
// });
async function addcart(idMon) {
    idch = $("input[name='idCuaHang']").val();
    soluong = $("input[name='quantity_"+idMon+"']").val();
    idMonAn = $("input[name='IDMonAn_"+idMon+"']").val();
    console.log("id Cua Hang " + idch);
    console.log("So Luong " + soluong);
    console.log("Id Mon an " + idMonAn);
    response = "a";
    await $.post('/DoAn1/public/checkKhacCuaHang', { idch: idch }, function (re) {
        response = JSON.parse(re);
        console.log(response);
        console.log("2");
        if (response == 0) {
            $.post('/DoAn1/public/them-gio-hang', { idCuaHang: idch,IDMonAn: idMonAn,quantity: soluong }, function (re){
                window.location.reload(true);
                console.log(re);
            });

        } else {
            if (confirm('Thêm món cửa hàng khác cần xóa món hiện tại?'))
            {
                $.post('/DoAn1/public/them-gio-hang', { idCuaHang: idch,IDMonAn: idMonAn,quantity: soluong }, function (re){
                    window.location.reload(true);
                    console.log(re);
                });
            } else {
                
            }
            
        }
    });

}