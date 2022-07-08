var lastcontrol = '';
var control = '';
var windows=0;
var elecheck = false;

//$(document).ready(start(lastcontrol,control,windows,elecheck));

$(function () {   
    $(window).click(function (e) {
        var target = e.target.id.toString();
        var elementClassName = e.target.className.toString();  

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
            //alert("target :"+ target + " control:"+control+" last:"+lastcontrol);
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

//function start(lastcontrol,control,windows,elecheck){
   // alert(last);
//}

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
             
             function seteditroot(ids,title,topic,type,links){
                $("#txttitle2").text(title);
                $("#txttopic2").text(topic);

                $("#editor_topic2").html(topic);
                $("#editor_title2").html(title);

                $("#hdneditid").val(ids);


               
                $("#rdo_text").prop("checked", false);
                $("#rdo_link").prop("checked", false);
                $("#rdo_file").prop("checked", false);
                $("#tr_link_edit_root").hide();
                $("#tr_file_edit_root").hide();


                if(type=='1'){
                    $("#rdo_text").prop("checked", true);
                }else if(type=='2'){
                    $("#rdo_link").prop("checked", true);
                    $("#tr_link_edit_root").show();
                    $("#tr_link_edit_root").show();
                    $("#txteditlink").val(links);
                }else if(type=='3'){
                    $("#rdo_file").prop("checked", true);
                    $("#tr_file_edit_root").show();
                    $("#txthdnfile").val(links);
                }                 
             }


             function setsubedit(ids,title,topic,type,links){
                alert("d");
                alert(ids);
                alert(title);
                alert(topic);
                alert(type);
                alert(links);

                $("#txttopic4").text(topic);
                $("#editor_topic4").html(topic);
                $("#hdneditsubid").val(ids);

                $("#rdo_text").prop("checked", false);
                $("#rdo_link").prop("checked", false);
                $("#rdo_file").prop("checked", false);
                $("#tr_link_edit_root").hide();
                $("#tr_file_edit_root").hide();


                if(type=='1'){
                    $("#rdo_edit_sub_text").prop("checked", true);
                }else if(type=='2'){
                    $("#rdo_edit_sub_link").prop("checked", true);
                    $("#tr_link_edit_sub").show();
                    $("#tr_link_edit_sub").show();
                    $("#txteditsublink").val(links);
                }else if(type=='3'){
                    $("#rdo_edit_sub_file").prop("checked", true);
                    $("#tr_file_edit_sub").show();
                    $("#txthdnsubfile").val(links);
                }                 
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

function filetoggle(){
 
    $("#tr_file").toggle('slow');
}
