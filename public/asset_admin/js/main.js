$(document).ready(function(){
    $('#alertBox').removeClass('hide');
    $('#alertBox').delay(1000).slideUp(500);
    $('#alertBox2').removeClass('hide');
    $('#alertBox2').delay(1000).slideUp(500);
    $('.button').on('click', function() {
        //console.log('Ok');
        let td = $(this).closest('tr').find('td');
        let result = {
          id: td.get(0).innerText,
          fullname: td.get(1).innerText,
          username: td.get(2).innerText
        };
        console.log(result);
        $('#id-ud').val(result.id);
        $('#fullname-ud').val(result.fullname);
        $('#username-ud').val(result.username);
        if ($('#fullname-ud').val() != "")
        { $('#fullnameNN').text(""); }
        if ($('#username-ud').val() != "")
        { $('#usernameNN').text(""); }
    });
    // $('#alertBox3').hide();
    // $('#alertBox4').hide();
    
    
});
// $('#bt-save-ud').click(function(){
  
// })
function saveUpdate(){
  //console.log( $('#id-ud').val());
  id = $('#id-ud').val();
  fullname = $('#fullname-ud').val();
  username = $('#username-ud').val();
  responsive = '';
  $.post('updateAdmin',{id:id , fullname:fullname, username:username}, function(re){
    responsive = JSON.parse(re);
    console.log('OKNha'+responsive);
    if (responsive == 1)
    {
      result = 1;
      let td = $('#button_'+id).closest('tr').find('td');
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
function notNull()
{
  if ($('#fullname-ud').val() == "")
  {
    $('#fullnameNN').text("* Không được để trống.");
  } else $('#fullnameNN').text("");
  if ($('#username-ud').val() == "")
  {
    $('#usernameNN').text("* Không được để trống.");
  } else $('#usernameNN').text("");
}


