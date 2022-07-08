var lastcontrol = '';
var control = '';
var windows=0;
var elecheck = false;

$(function () {   
    $(window).click(function (e) {
        var target = e.target.id.toString();
        var elementClassName = e.target.className.toString();  
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
          
        if(elecheck==false){    
                if(target!==''){
                    if(lastcontrol!==''){
                    windows++;
                       if(lastcontrol==control){
                        hidelastcontrol(control);  
                       }else{
                        hidelastcontrol(lastcontrol);  
                       }
                    }else if((lastcontrol=='')&&(windows>1)){
                    windows++;
                    hideedit(control);
                    }
                }else{
                    hideedit(control);
                }
        }else{
          if(target==''){
            if((control=='doctopic_text')||(control=='detail')){
            }else{
              if(lastcontrol==''){
                hideedit(control);
              }else{
                hidelastcontrol(lastcontrol);
              }
            }
          }
        }
    }); 
}); 


function elechecks(chk){
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
        $("#tr_link_edit_sub").hide();
        $("#tr_file_edit_sub").fadeIn();
    }
}

function selects_type(id) {
 
    if (id == '1') {
        $("#tr_type_display").hide();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",true);

    } else if (id == '2') {

        $("#tr_type_display").show();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",false);

    } else if (id == '3') {
        $("#tr_type_display").show();
        $("#tr_save").show();
        $("#txtlink").prop("readonly",false);
    }
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
    
    if (id == '1') {
         $("#tr_link_edit_root").hide();
         $("#tr_file_edit_root").hide();
 
     } else if (id == '2') {
 
         //$("#tr_sub_text").hide();
         $("#tr_link_edit_root").fadeIn();
         $("#tr_file_edit_root").hide();
 
     } else if (id == '3') {
         //$("#tr_sub_text").hide();
         $("#tr_link_edit_root").hide();
         $("#tr_file_edit_root").fadeIn();
     }
}






            function toggle() {
                $("#navbar_center").toggle();
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
                            $("#rdo_edit_sub_file").prop("checked", true);
                            $("#tr_file_edit_sub").show();
                            $("#tr_link_edit_sub").hide();
                            $("#txthdnsubfile").val(result.file);
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
                                     
                                     
                                        if(result.type=='1'){
                                            $("#rdo_edit_root_text").prop("checked", true);
                                        }else if(result.type=='2'){
                                            $("#rdo_edit_root_link").prop("checked", true);
                                            $("#tr_link_edit_root").show();
                                            $("#tr_link_edit_root").show();
                                            $("#txt_edit_root_link").val(result.file);
                                        }else if(result.type=='3'){
                                            $("#rdo_edit_root_file").prop("checked", true);
                                            $("#tr_file_edit_root").show();
                                            $("#txthdnfile").val(result.file);
                                        }     
                                     
                                    },
                                    error: function (xhr, desc, err) {
                                        alert(err);
                                    }
                                });
                            }


