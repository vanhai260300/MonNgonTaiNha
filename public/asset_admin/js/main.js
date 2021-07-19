$(document).ready(function () {
  $('#alertBox').removeClass('hide');
  $('#alertBox').delay(1000).slideUp(500);
  $('#alertBox2').removeClass('hide');
  $('#alertBox2').delay(1000).slideUp(500);
  //Check All 
  var checkAll = $("#checked-all");
  var checkItem = $('input[name="checkitems[]"]');
  var btnCheckSubmit = $('.btn-check-submit');
  var btnCheckSubmitBack = $('.btn-check-submit-back');
  var selectAction = $('#actionOfTrash');

  checkAll.change(function () {
    var isCheckAll = $(this).prop('checked');
    console.log(isCheckAll);
    checkItem.prop('checked', isCheckAll);
    renderCheckBT();
    //var checkedItem = $('input[name="checkitems[]"]:checked');
  })
  console.log(checkItem.length);
  checkItem.change(function () {
    var isCheckAll = checkItem.length === $('input[name="checkitems[]"]:checked').length;
    checkAll.prop('checked', isCheckAll);
    console.log(isCheckAll);
    renderCheckBT();
  })
  function renderCheckBT() {
    count = $('input[name="checkitems[]"]:checked').length;
    if (count > 0) {
      btnCheckSubmit.removeClass("disabled");
      btnCheckSubmitBack.removeClass("disabled");
    } else {
      btnCheckSubmit.addClass("disabled");
      btnCheckSubmitBack.addClass("disabled");
    }
  }
  btnCheckSubmit.click(function () {
    var checkedItem = $('input[name="checkitems[]"]:checked');
    for (var checked of checkedItem) {
      $.post('deleteMonAn', { allID: checked.value }, function (e) {
        res = JSON.parse(e);
        console.log(res);
        $("#countTrash").text(res);
      });
      $('#row_' + checked.value + '').remove();
    }


  });
  selectAction.change(function () {

    if (selectAction.val() == 1) {
      console.log(1);
      $(".checkModal").addClass("ModalDelete");
    } else {
      console.log(2);
      $(".checkModal").removeClass("ModalDelete");
    }
  });
  btnCheckSubmitBack.click(function () {
    var checkedItem = $('input[name="checkitems[]"]:checked');

    var selectActionV = $('#actionOfTrash').val();
    console.log(selectActionV);
    if (selectActionV == "") {

      $("#requiredSelect").text("* Please select.");
    } else if (selectActionV == 1) {
      $("#exceptDelete").click(function () {
        for (var checked of checkedItem) {
          console.log(1);

          $.post('permanentlyDelete', { allID: checked.value, selectActionV: selectActionV }, function (e) {
            //res = JSON.parse(e);
            console.log(e);
            // $("#countTrash").text(res);
            $("#requiredSelect").text("");
          });
          $('#row_' + checked.value + '').remove();
        }
      })

    } else {
      for (var checked of checkedItem) {
        console.log(2);
        $.post('RestoreMonAn', { allID: checked.value, selectActionV: selectActionV }, function (e) {
          //res = JSON.parse(e);
          console.log(e);
          // $("#countTrash").text(res);
          $("#requiredSelect").text("");
        });
        $('#row_' + checked.value + '').remove();
      }
    }



  });
  // Tài Khaonr admin
  $('.button').on('click', function () {
    //console.log('Ok');
    let td = $(this).closest('tr').find('td');
    let result = {
      id: td.get(0).innerText,
      fullname: td.get(1).innerText,
      username: td.get(2).innerText
    };
    console.log(result);
    sessionStorage.setItem("usernametam", result.username);
    $('#id-ud').val(result.id);
    $('#fullname-ud').val(result.fullname);
    $('#username-ud').val(result.username);
    if ($('#fullname-ud').val() != "") { $('#fullnameNN').text(""); }
    if ($('#username-ud').val() != "") { $('#usernameNN').text(""); }
  });
  //Món Ăn
  $('.button-ma').on('click', function () {
    //console.log('Ok');
    let td = $(this).closest('tr').find('td');
    let result = {
      id: td.get(0).innerText,
      tenmon: td.get(1).innerText,
      maDM: td.get(2).innerText,
      maCH: td.get(4).innerText,
      anh1: td.get(6).innerText,
      anh2: td.get(7).innerText,
      anh3: td.get(8).innerText,
      gia: td.get(9).innerText,
      trangThai: td.get(10).innerText,
      moTa: td.get(11).innerText,
    };
    console.log(result);
    sessionStorage.setItem("usernametam", result.username);
    $('#id-ud').val(result.id);
    $('#tenmon-ud').val(result.tenmon);
    $('#danhmuc-ud').val(result.maDM);
    $('#cuahang-ud').val(result.maCH);
    $('#gia-ud').val(result.gia);
    $('#anh1-ud').val(result.anh1);
    $('#anh2-ud').val(result.anh2);
    $('#anh3-ud').val(result.anh3);
    $('#mota-ud').val(result.moTa);
    $('#trangthai-ud').val(result.trangThai);
  });


});
// $('#bt-save-ud').click(function(){
// ----------------- Xử lý tài khoản Admin ------------------------------
// })
function saveUpdate() {
  //console.log( $('#id-ud').val());
  id = $('#id-ud').val();
  fullname = $('#fullname-ud').val();
  username = $('#username-ud').val();
  responsive = '';
  $.post('updateAdmin', { id: id, fullname: fullname, username: username }, function (re) {
    responsive = JSON.parse(re);
    console.log('OKNha ' + responsive);
    if (responsive == 1) {
      result = 1;
      let td = $('#button_' + id).closest('tr').find('td');
      td.get(1).innerText = fullname;
      td.get(2).innerText = username;
      $('#alertBox3').fadeIn(100);
      $('#alertBox3').delay(1000).slideUp(700);
    } else {
      $('#alertBox4').fadeIn(100);
      $('#alertBox4').delay(1000).slideUp(700);
    }
  });

};
function notNull() {
  if ($('#fullname-ud').val() == "") {
    $('#fullnameNN').text("* Không được để trống.");
  } else $('#fullnameNN').text("");

}
function checkUserName() {
  if ($('#username-ud').val() == "") {
    $('#usernameNN').text("* Không được để trống.");
  } else {
    //console.log(result.username);
    var user = sessionStorage.getItem("usernametam");
    username = $('#username-ud').val();
    console.log("UN cũ " + user);
    console.log("UN mới " + username);
    if (username == user) {
      $('#usernameNN').text("");
    } else {
      $.post('checkUsername', { username: username }, function (e) {
        responsive = JSON.parse(e);
        console.log(responsive);
        if (responsive == 1) {
          $('#usernameNN').text("Tên đăng nhập đã tồn tại.");
        } else { $('#usernameNN').html("<p class = 'text-success' >Tên đăng nhập hợp lệ.</p>"); }
      });
    }


  }
  if ($('#username-add').val() == "") {
    $('#usernameNN-add').text("* Không được để trống.");
  } else {
    username = $('#username-add').val();
    $.post('checkUsername', { username: username }, function (e) {
      responsive = JSON.parse(e);
      console.log(responsive);
      if (responsive == 1) {
        $('#usernameNN-add').text("Tên đăng nhập đã tồn tại.");
      } else { $('#usernameNN-add').html("<p class = 'text-success mb-0' >Tên đăng nhập hợp lệ.</p>"); }
    });

  }
}
function deleteADmin(id) {
  if (confirm('bạn có muốn xóa tài khoản:' + id + '?')) {
    $.post("deleteAdmin", { id: id }, function (e) {
      $('#row_' + id + '').remove();
    });
    console.log("Xóa thành công.");
  } else { console.log("Không xóa."); }
}
function checkRepassword() {
  password = $('#password').val();
  console.log(password)
  if ($('#repassword').val() == password) {
    console.log("ok");
    $('#passwordNN').html("<p class = 'text-success mb-0' >Mật khẩu hợp lệ.</p>");
  } else { $('#passwordNN').text("Mật khẩu không khớp."); console.log("NOok"); }
}

// ----------------- Xử lý Món ăn ------------------------------