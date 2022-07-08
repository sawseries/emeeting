$(document).ready(function() {
  agree();
    $("#registerform").validate();
    $("#btnregister").click(function () {
    if ($('#registerform').valid()) {
     /// agree();
      $('#registerform').submit();
      return false;
    } else {
        return false;
    }
    }); // Click effect   
  });

function agree(){
document.getElementById('confirm').style.display='block';
}

function confirm(){
if($('#rdo_confirm').is(':checked')){
$('#registerform').submit();
}else{
$("#s_error_confirm").text("กรุณาเลือกยินยอม");
}
}