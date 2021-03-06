var editor_id = '';
$(document).ready(function () {

    $("#frminsertroot").validate({});

    $("#frmeditroot").validate({});

    $("#frmeditsub").validate({});

    var obj = ["doctopic_text", "detail"];

    $.each(obj, function (index, value) {
        $('#tool_' + value + ' #fontFamily').change(function () {
            var fontFamily = this.value;
            $(this).css('font-family', fontFamily);

            document.execCommand('fontName', false, fontFamily);
            update_output(value);
        });

        $('#tool_' + value + ' #parStyle').change(function () {
            document.execCommand('formatBlock', false, this.value);
            update_output(value);
        });

        $('#tool_' + value + ' #fontSize').change(function () {
            document.execCommand('fontSize', false, this.value);
            update_output(value);
        });


        $('#tool_' + value + ' #textColor').change(function () {
            var colorValue = this.value;
            var textColor = $(this).css('color');
            console.log("TextColor: ", textColor);
            if (colorValue == "CUSTOM") {
                // Prompt for Custom Color
                colorValue = prompt("Enter the HEX value or RGBA value: ", "");
            }
            // Match dropdown box style to selected color
            $(this).css('background-color', colorValue);

            // Set selected color
            document.execCommand('foreColor', false, colorValue);
            update_output(value);
        });

        $('#tool_' + value + ' a').click(function (e) {

            switch ($(this).data('role')) {
                case 'h1':
                case 'h2':
                case 'p':
                    document.execCommand('formatBlock', false, $(this).data('role'));
                    break;
                default:
                    document.execCommand($(this).data('role'), false, null);
                    break;
            }
            update_output(value);

        });




        $('#editor_' + value).bind('blur keyup paste copy cut mouseup', function (e) {
            update_output(value);
            elechecks(false);

        });

    });


    var obj2 = ["doctopic_text1", "doctopic_text2", "title1", "title2", "topic1", "topic2", "topic3", "topic4"];

    $.each(obj2, function (index, value) {
        $('#tool_' + value + ' #fontFamily').change(function () {
            var fontFamily = this.value;
            $(this).css('font-family', fontFamily);

            document.execCommand('fontName', false, fontFamily);
            update_text(value);
        });

        $('#tool_' + value + ' #parStyle').change(function () {
            document.execCommand('formatBlock', false, this.value);
            update_text(value);
        });

        $('#tool_' + value + ' #fontSize').change(function () {
            document.execCommand('fontSize', false, this.value);
            update_text(value);
        });


        $('#tool_' + value + ' #textColor').change(function () {
            var colorValue = this.value;
            var textColor = $(this).css('color');
            console.log("TextColor: ", textColor);
            if (colorValue == "CUSTOM") {
                // Prompt for Custom Color
                colorValue = prompt("Enter the HEX value or RGBA value: ", "");
            }
            // Match dropdown box style to selected color
            $(this).css('background-color', colorValue);

            // Set selected color
            document.execCommand('foreColor', false, colorValue);
            update_text(value);
        });

        $('#tool_' + value + ' a').click(function (e) {

            switch ($(this).data('role')) {
                case 'h1':
                case 'h2':
                case 'p':
                    document.execCommand('formatBlock', false, $(this).data('role'));
                    break;
                default:
                    document.execCommand($(this).data('role'), false, null);
                    break;
            }
            update_text(value);

        });

        $('#editor_' + value).bind('blur keyup paste copy cut mouseup', function (e) {
            update_text(value);
        });
    });
});


$(function () {
    $("#tblLocations").sortable({
        items: 'tr:not(tr:first-child)',
        cursor: 'pointer',
        axis: 'y',
        scroll: false,
        placeholder: "sortable-placeholder",
        dropOnEmpty: true,
        
        start: function (e, ui) {
            ui.item.addClass("selected");
            
           /* var subcnt = $("#hdnsubcnt").val();
            for (j = 0; j <= (subcnt - 1); j++) {
            if (ui.item.is("#sorsubtable_"+j)) {
                //alert(j);
                $("#tblLocations").sortable("disable");
                $(this).sortable("refresh");	// "refresh" of source sortable is required to make "disable" work!
            }
           }*/
        },
        stop: function (e, ui) {
           // var subcnt = $("#hdnsubcnt").val();
            ui.item.removeClass("selected");
           // var ids = $(this).closest('tr').find("td:eq(0) input").val();
            //alert(ids);
           // $("#tblLocations").sortable("disable");
        },


        update: function (event, ui) {
            var Newpos = ui.item.index();
            $(this).find("tr").each(function (index) {

                var NewPosition = $("tr").index(this);
                var ids = $(this).closest('tr').find("td:eq(0) input").val();

                if (ids) {
                    $.ajax({
                        url: "./index.php?controller=Agenda&action=update_row",
                        type: "POST",
                        data: { id: ids, no: NewPosition },
                        success: function (data) {

                        },
                        error: function (xhr, desc, err) {
                            alert(err);
                        }
                    });
                }
            });
        }
    });

});


/*$(function () {
    var subcnt = $("#hdnsubcnt").val();
    for (j = 0; j <= (subcnt - 1); j++) {
        $("#sorsubtable_" + j).sortable({

           // $("#sorsubtable").sortable({
            items: 'tr:not(tr:first-child)',
            cursor: 'pointer',
            axis: 'y',
            dropOnEmpty: false,  
            connectWith: 'ul',
       
            start: function (e, ui) {
                ui.item.addClass("selected");
            },
            stop: function (e, ui) {
                ui.item.removeClass("selected");
            },
            update: function (event, ui) {
                var Newpos = ui.item.index();
                $(this).find("tr").each(function (index) {
 
                    var NewPosition = $("tr").index(this);
                    var ids = $(this).closest('tr').find("td:eq(0) input").val();
          
                    if (ids) {
                        $.ajax({
                            url: "./index.php?controller=Agenda&action=update_row",
                            type: "POST",
                            data: { id: ids, no: NewPosition },
                            success: function (data) {
                            },
                            error: function (xhr, desc, err) {
                                alert("Err : "+err);
                            }
                        });
                    }
                });
            }
        });


        $('td, th', "#sorsubtable_"+j).each(function () {
       // $('td, th', "#sorsubtable").each(function () {
            var cell = $(this);
            cell.width(cell.width());
        });
        
       // $("#sorsubtable_"+j+" tbody").sortable().disableSelection();

    }
});*/

$(function () {
    var subcnt = $("#hdnsubcnt").val();
    for (j = 0; j <= (subcnt - 1); j++) {
        $("#sortable_" + j).sortable({
            update: function (event, ui) {
                $(this).children().each(function (i) {
                    var NewPosition = i;
                    var ids = $(this).closest('ul').find("li:eq(" + i + ") input:eq(0)").val();
                    var roots = $(this).closest('ul').find("li:eq(" + i + ") input:eq(1)").val();
                    //alert(i+" "+ids+" "+roots);
                    if (ids) {
                        $.ajax({
                            url: "./index.php?controller=Agenda&action=update_row",
                            type: "POST",
                            data: { id: ids, no: NewPosition },
                            success: function (data) {

                            },
                            error: function (xhr, desc, err) {
                                alert(err);
                            }
                        });
                    }
                });
            }
        });
    }
});

function deleteterm(codes) {
    $.ajax({
        type: "POST",
        url: "./index.php?controller=Agenda&action=delete_term",
        data: { code: codes },
        success: function () {
            window.location.reload();
        }
    });
}

function updates_active(fields, codes, parameter) {

    var values = parameter.value;

    $.ajax({
        url: "./index.php?controller=Agenda&action=updates_active",
        type: "POST",
        data: { field: fields, value: values, code: codes },
        success: function (data) {

            if (data == true) {
                window.location.reload();
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}

function updates(fields, codes, parameter) {

    var values = parameter.value;
    $.ajax({
        url: "./index.php?controller=Agenda&action=update_meeting",
        type: "POST",
        data: { field: fields, value: values, code: codes },
        success: function (data) {

            if (data == 'success') {
                window.location.reload();
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}


function update_meeting_type() {

    var types = $('input[name="rdo_type"]:checked').val();
    var paras = $('#txtlink').val();
    var codes = $('#hdncode').val();
    var errors = false;

    if ((types == '2') || (types == '3')) {

        if (paras == "") {
            errors = true;
            $("#slinkerror").text("??????????????????????????? Link");
        }

    }

    if (errors == false) {
        $.ajax({
            url: "./index.php?controller=Agenda&action=update_meeting_type",
            type: "POST",
            data: { type: types, link: paras, code: codes },
            success: function (data) {
                if (data == true) {
                    window.location.reload();
                }
            },
            error: function (xhr, desc, err) {
                alert(err);
            }
        });
    }

}

$(function () {
    $("#btninsertroot").click(function () {
        if ($('#frminsertroot').valid()) {
            $('#frminsertroot').submit(function (e) {
                e.preventDefault();
                var form = $('#frminsertroot')[0];
                var data = new FormData(form);

                $.ajax({
                    url: "./index.php?controller=Agenda&action=insert_root",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {

                        if (data == true) {
                            window.location.reload();
                        } else {
                            alert(data);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
            });
        }
    }); // Click effect     
});

$(function () {
    $("#btneditroots").click(function () {
      
        if ($('#frmeditroot').valid()) {
            $('#frmeditroot').submit(function (e) {
                e.preventDefault();
                var form = $('#frmeditroot')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "./index.php?controller=Agenda&action=edit_root",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {

                        if (data == true) {
                            window.location.reload();
                        } else {
                            $("#s_edit_root_error").text(data);
                         
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
            });
        } else {
            return false;
        }
    }); // Click effect     
});


$(function () {
    $("#btninsertsub").click(function () {

        if ($('#frminsertsub').valid()) {
            $('#frminsertsub').submit(function (e) {
                e.preventDefault();
                var form = $('#frminsertsub')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "./index.php?controller=Agenda&action=insert_sub",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {

                        if (data == true) {
                            window.location.reload();
                        } else {
                            alert(data);
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
            });
        } else {
            return false;
        }


    }); // Click effect   
    /*----------------------------------------*/
});



$(function () {
    $("#btneditsub").click(function () {
        if ($('#frmeditsub').valid()) {
            $('#frmeditsub').submit(function (e) {
                e.preventDefault();
                var form = $('#frmeditsub')[0];
                var data = new FormData(form);
                $.ajax({
                    url: "./index.php?controller=Agenda&action=edit_sub",
                    type: "POST",
                    enctype: 'multipart/form-data',
                    data: data,
                    processData: false,
                    contentType: false,
                    cache: false,
                    success: function (data) {

                        if (data == true) {
                            window.location.reload();
                        } else {
                            $("#s_edit_sub_error").text(data);
                       
                        }
                    },
                    error: function (jXHR, textStatus, errorThrown) {
                        alert(errorThrown);
                    }
                }); // AJAX Get Jquery statment
            });
        } else {
            return false;
        }
    }); // Click effect   
});


function update_output(id) {
    var para = $('#editor_' + id).html();
    var codes = $("#hdncode").val();
    $.ajax({
        url: "./index.php?controller=Agenda&action=update_meeting",
        type: "POST",
        data: { field: id, value: para, code: codes },
        async: true,
        success: function (data) {
            if (data == 'success') {
                $("#display_" + id).html(para);
                $("#txt" + id).html(para);
                elechecks(false);
            }
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
}



function update_text(id) {
    var para = $('#editor_' + id).html();
    $("#txt" + id).html(para);

}



function setedit_sub(ids){
  
    $.ajax({
        url: "./index.php?controller=Agenda&action=getroot_edit",
        type: "POST",
        data: { id: ids },
        success: function (data) {
           
            var result = jQuery.parseJSON(data);
            $("#txttopic4").text(result.topic);
            $("#editor_topic4").html(result.topic);
            $("#hdneditsubid").val(result.id);
            
            $("#rdo_text").prop("checked", false);
            $("#rdo_link").prop("checked", false);
            $("#rdo_file").prop("checked", false);
            $("#tr_link_edit_root").hide();
            $("#tr_file_edit_root").hide();
            $("#s_edit_sub_error").text(""); 
            $("#txt_hdn_edit_sub_file").val("");
            if(result.type=='1'){
                $("#rdo_edit_sub_text").prop("checked", true);
                $("#tr_link_edit_sub").hide();
                $("#tr_file_edit_sub").hide();
            }else if(result.type=='2'){
                $("#rdo_edit_sub_link").prop("checked", true);
                $("#tr_link_edit_sub").show();
                $("#tr_file_edit_sub").hide();
                $("#txteditsublink").val(result.file);
            }else if(result.type=='3'){
               // $("#rdo_edit_sub_file").prop("checked", true);
               // $("#tr_file_edit_sub").show();
               // $("#tr_link_edit_sub").hide();
               // $("#txthdnsubfile").val(result.file);

               $("#control_edit_file_sub").show();
               $("#ele_edit_file_sub").hide();
               $("#s_file_sub_nm").html("");
               $("#rdo_edit_sub_file").prop("checked", true);
               $("#tr_file_edit_sub").show();
               $("#s_file_sub_nm").append("<a href='./storage/agenda/"+result.file+"' target='_blank'>"+result.file+"</a>");
               //$("#txt_hdn_sub_file").val(result.file);
               $("#txt_hdn_edit_sub_file").val(result.file);

            }
         
        },
        error: function (xhr, desc, err) {
            alert(err);
        }
    });
    
                            
                 }
    

                 function seteditroot(ids){
                  
                    $.ajax({
                        url: "./index.php?controller=Agenda&action=getroot_edit",
                        type: "POST",
                        data: { id: ids },
                        success: function (data) {
                            //alert(data);
                            var result = jQuery.parseJSON(data);
                            //alert(result.id);
                            $("#txttitle2").text(result.title);
                            $("#txttopic2").text(result.topic);
                         
                            $("#editor_topic2").html(result.topic);
                            $("#editor_title2").html(result.title);
                         
                            $("#hdn_edit_root_id").val(result.id);
                         
                         
                           
                            $("#rdo_edit_root_text").prop("checked", false);
                            $("#rdo_edit_root_link").prop("checked", false);
                            $("#rdo_edit_root_file").prop("checked", false);
                            $("#tr_link_edit_root").hide();
                            $("#tr_file_edit_root").hide();
                            $("#s_edit_root_error").text("");
                            $("#txt_hdn_edit_root_file").val("");
                            $("#s_file_root_nm").html("");

                            if(result.type=='1'){
                                $("#rdo_edit_root_text").prop("checked", true);
                                $("#txt_hdn_edit_root_file").val("");
                                
                            }else if(result.type=='2'){
                                $("#rdo_edit_root_link").prop("checked", true);
                                $("#tr_link_edit_root").show();
                                $("#tr_link_edit_root").show();
                                $("#txt_edit_root_link").val(result.file);
                                $("#txt_hdn_edit_root_file").val("");
                              
                            }else if(result.type=='3'){
                                $("#control_edit_file_root").show();
                                $("#ele_edit_file_root").hide();
                                
                                $("#rdo_edit_root_file").prop("checked", true);
                                $("#tr_file_edit_root").show();
                                $("#s_file_root_nm").append("<a href='./storage/agenda/"+result.file+"' target='_blank'>"+result.file+"</a>");
                                //$("#txt_hdn_edit_root_file").val(result.file);
                                $("#txt_hdn_edit_root_file").val(result.file);

                              
                            }     
                         
                        },
                        error: function (xhr, desc, err) {
                            alert(err);
                        }
                    });
                }