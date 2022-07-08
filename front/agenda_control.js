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
        dropOnEmpty: false,
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
                            alert(err);
                        }
                    });
                }
            });
        }
    });
});

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
            $("#slinkerror").text("กรุณาระบุ Link");
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