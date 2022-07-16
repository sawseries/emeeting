var editor_id='';
$(document).ready(function() {

  
});
     

function updates(fields,codes,parameter) {

    var values = parameter.value;               
            $.ajax({
                url: "./index.php?controller=Report&action=update_meeting",
                type: "POST",
                data: {field: fields, value: values, code:codes},
                success: function (data)
                {
                    if(data=='success'){
                       window.location.reload();
                    }
                },
                error: function (xhr, desc, err)
                {
                    alert(err);
                }
            });
}    


      




    




$(function () {
    $("#btneditsub").click(function () {
    alert("editsub");
    if ($('#frmeditsub').valid()) {
    }else{
        
    }
    /*if ($('#frmeditsub').valid()) {
                $('#frmeditsub').submit(function (e) {
            e.preventDefault();
            var form = $('#frminsertsub')[0];         
            var data = new FormData(form);
            $.ajax({
                url: "./index.php?controller=Admin&action=insert_sub",
                type: "POST",
                enctype: 'multipart/form-data',
                data:data,
                processData: false,
                    contentType: false,
                    cache: false,
                success: function (data) {
                 
                    if(data==true){
                    window.location.reload();
                    }else{
                        alert(data);
                    }
                },
                error: function (jXHR, textStatus, errorThrown) {
                    alert(errorThrown);
                }
            }); // AJAX Get Jquery statment
        });
            }else{
                return false;
            }*/
    
    
    }); // Click effect   
    });

$(function () {
    $("#btn_edit_subs").click(function () {
        alert("edit");
      /*  alert("edit");
        if ($('#frmeditsub').valid()) {
            $('#frmeditsub').submit(function (e) {
        e.preventDefault();
        var form = $('#frmeditsub')[0];         
        var data = new FormData(form);
        $.ajax({
            url: "./index.php?controller=Admin&action=edit_sub",
            type: "POST",
            enctype: 'multipart/form-data',
            data:data,
            processData: false,
                contentType: false,
                cache: false,
            success: function (data) {
             alert(data);
                if(data==true){
                window.location.reload();
                }else{
                    alert(data);
                }
            },
            error: function (jXHR, textStatus, errorThrown) {
                alert(errorThrown);
            }
        }); // AJAX Get Jquery statment
    });
        }else{
            return false;
        }*/
    }); // Click effect     
    });

function update_output(id) {
     var para = $('#editor_'+id).html();
     var codes = $("#hdncode").val();
    $.ajax({
                             url: "./index.php?controller=Admin&action=update_meeting",
                             type: "POST",
                             data: {field:id, value: para, code:codes},
                             async: true,
                             success: function (data)
                             {
                                 if(data=='success'){
                                     $("#display_"+id).html(para);
                                     $("#txt"+id).html(para);
                                     elechecks(false);
                                 }
                             },
                             error: function (xhr, desc, err)
                             {
                                 alert(err);
                             }
                         });
 }



 function update_text(id) {
    var para = $('#editor_'+id).html();
    $("#txt"+id).html(para);

 }