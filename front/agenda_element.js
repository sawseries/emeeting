var lastcontrol = '';
var control = '';
var windows=0;
var elecheck = false;

$(function () {   
    $(window).click(function (e) {

         $("#editor_doctopic_text").click(function (e) {    
            elechecks(true);
          });
          $("#tool_doctopic_text").click(function (e) {  
          //  alert("tool_doctopic_text");
            elechecks(true);
          });
          $("#editor_detail").click(function (e) {    
            elechecks(true);
          });
          $("#tool_detail").click(function (e) {    
            elechecks(true);
          });
          $(".form-control").click(function (e) {  
              elechecks(true);
            });
    }); 
}); 


function elechecks(chk){ //กำหนดเพื่อให้ไม่ update เมื่อ click
    elecheck = chk;
}

function showedit(ele) {
    if(control != ''){lastcontrol = control;}

    if(lastcontrol != ''){hidelastcontrol(lastcontrol);}
        
    $("#display_" + ele).hide();
    $("#control_" + ele).show();
    windows++;
    control = ele;
}

function showedittextarea(ele){
  target = 'display_doctopic_text';
 // alert("textarea");
  if(control != ''){lastcontrol = control;}
  $("#display_" + ele).hide();
  $("#control_" + ele).show();
  windows++;
  control = ele;
}

function subtermsort(id){
    alert(id);
}

function hideedit(control) {
    $("#display_" + control).show();
    $("#control_" + control).hide();
    windows++;
    lastcontrol = control;
    control = '';
}


function hidelastcontrol(control) {
    $("#display_" + control).show();
    $("#control_" + control).hide();
    lastcontrol = '';
    control = '';
    windows++;
}
        

function settop(code){
    $("#hdntop").val(code);
}
             
             
function setsubtop(code){
    $("#hdnsubtop").val(code);
}
             
      
function selecteditsub(id) {

    $("#s_edit_sub_error").text("");
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_link_edit_sub").hide();
        $("#tr_file_edit_sub").hide();

    } else if (id == '2') {

        //$("#tr_text_insert_root").hide();
        $("#tr_link_edit_sub").fadeIn();
        $("#tr_file_edit_sub").hide();

    } else if (id == '3') {
        //$("#tr_text_insert_root").hide();
        //$("#tr_link_edit_sub").hide();
        //$("#tr_file_edit_sub").fadeIn();

        var hdnfile = $("#txt_hdn_edit_sub_file").val();
     
        if(hdnfile==""){

           $("#tr_link_edit_sub").hide();
           $("#tr_file_edit_sub").fadeIn();
           $("#txt_subfile").toggle();
           $("#control_edit_file_sub").hide();
           $("#ele_edit_file_sub").show();
           $("#txt_subfile").show();

       }else{

           $("#tr_link_edit_sub").hide();
           $("#tr_file_edit_sub").fadeIn();
           $("#txt_subfile").toggle();
           $("#control_edit_file_sub").show();
           $("#ele_edit_file_sub").hide();

       }

    }
}

function selects_type(id) {
 
    if (id == '1') {
        $("#tr_type_display").hide();
        $("#tr_type_ele").hide();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",true);

    } else if (id == '2') {

        $("#tr_type_display").show();
        $("#tr_type_ele").hide();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",false);

    } else if (id == '3') {
        $("#tr_type_display").show();
        $("#tr_type_ele").hide();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",false);
    }
}

function cancel_meeting_type(){
    window.location.reload();
}


function selects(id) {
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_link").hide();
        $("#tr_file").hide();

    } else if (id == '2') {

        $("#tr_text").hide();
        $("#tr_link").fadeIn();
        $("#tr_file").hide();

    } else if (id == '3') {
        $("#tr_text").hide();
        $("#tr_link").hide();
        $("#tr_file").fadeIn();
    }
}

function save_file() {
    var para = $("#para").val();
}


function selects_insert_root(id) {
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_link_insert_root").hide();
        $("#tr_file_insert_root").hide();

    } else if (id == '2') {

        $("#tr_text_insert_root").hide();
        $("#tr_link_insert_root").fadeIn();
        $("#tr_file_insert_root").hide();

    } else if (id == '3') {
        $("#tr_text_insert_root").hide();
        $("#tr_link_insert_root").hide();
        $("#tr_file_insert_root").fadeIn();
    }
}


function selectsub(id) {
    if (id == '1') {
       // $("#tr_text").fadeIn();
        $("#tr_sub_link").hide();
        $("#tr_sub_file").hide();
    } else if (id == '2') {
        $("#tr_sub_text").hide();
        $("#tr_sub_link").fadeIn();
        $("#tr_sub_file").hide();
    } else if (id == '3') {
        $("#tr_sub_text").hide();
        $("#tr_sub_link").hide();
        $("#tr_sub_file").fadeIn();
    }
}



function selects_edit_root(id) { 
 
    $("#s_edit_root_error").html("");
    if (id == '1') {
         $("#tr_link_edit_root").hide();
         $("#tr_file_edit_root").hide();
 
     } else if (id == '2') {
 
         //$("#tr_sub_text").hide();
         $("#tr_link_edit_root").fadeIn();
         $("#tr_file_edit_root").hide();
 
     } else if (id == '3') {
         var hdnfile = $("#txt_hdn_edit_root_file").val();
    
         if(hdnfile==""){

            $("#tr_link_edit_root").hide();
            $("#tr_file_edit_root").fadeIn();
            $("#txt_rootfile").toggle();
            $("#control_edit_file_root").hide();
            $("#ele_edit_file_root").show();
            $("#txt_rootfile").show();

        }else{

            $("#tr_link_edit_root").hide();
            $("#tr_file_edit_root").fadeIn();
            $("#txt_rootfile").toggle();
            $("#control_edit_file_root").show();
            $("#ele_edit_file_root").hide();

        }

     }
}

function rootfile_toggle(){
    $("#ele_edit_file_root").toggle();
    $("#txt_edit_root_file").show();
}


function subfile_toggle(){
    $("#ele_edit_file_sub").toggle();
    $("#txt_edit_sub_file").show();
}

function toggle() {
    $("#navbar_center").toggle();
}





