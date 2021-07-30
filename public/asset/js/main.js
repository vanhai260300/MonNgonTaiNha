$(document).ready(function () {
    console.log("OK");

    $(".formEvent").submit(function () {
        idch = $("input[name='idCuaHang']").val();
        console.log(idch);
        response = 0;
        $.post('/DoAn1/public/checkKhacCuaHang', {idch:idch}, function(re){
            console.log(re);
            response = re;
            if (response == 0)
            {
                return false;   
            } else {
                if (confirm('Thêm món của hàng khác sẽ xóa món trong giỏ hàng.')) {
                    console.log('Xóa.');
                    return false;
                    
                } else {
                    console.log('Không xóa.');
                    return false;
                    
                }
            }
            
            
        });
        console.log(response);
        
    })
});