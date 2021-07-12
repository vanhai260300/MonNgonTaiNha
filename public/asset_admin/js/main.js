$(document).ready(function(){
    $('#alertBox').removeClass('hide');
    $('#alertBox').delay(1000).slideUp(500);
    $('#alertBox2').removeClass('hide');
    $('#alertBox2').delay(1000).slideUp(500);
    $('.button').on('click', function() {
        console.log('Ok');
        let td = $(this).closest('tr').find('td');
        let result = {
          id: td.get(0).innerText,
          fullname: td.get(1).innerText,
          username: td.get(2).innerText
        };
        console.log(result);
        $('#fullname-ud').val(result.fullname);
        $('#username-ud').val(result.username);
    });
    
});

// function getRowTable() {
//     console.log('Ok');
//         let td = $(this).closest('tr').find('td');
//         let result = {
//           id: td.get(0).innerText,
//           user: td.get(1).innerText,
//           username: td.get(2).innerText
//         };
//     console.log(result);
// }


