<?php
require_once './layouts/header_admin.php';
?>

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link href="./assets/css/editor.css?key=<?php echo time(); ?>" rel="stylesheet" />
<script type="text/javascript" src="./front/agenda_element.js?key=<?php echo time(); ?>"></script>
<script type="text/javascript" src="./front/agenda_control.js?key=<?php echo time(); ?>"></script>

<title>ระเบียบวาระการประชุม</title>
<style type="text/css">
 .table_border
  {
      border: 1px solid #ccc;
      border-collapse: collapse;
  }  
  .table_border th
  {
      background-color: #F7F7F7;
      color: #333;
      font-weight: bold;
  }
  .table_border th,td
  {
      width: 100px;
      padding: 5px;
      border: 1px solid #ccc;
  }        
    </style>

<script>
</script>
</head>
<body>
<!-- Page content-->
<div class="container">
<div class="row">
 <a href="../../layouts/header.php"></a>
    <div class="white_background">
    <div class="header_topic"><h4><i class="fa fa-plus-circle"></i> ระเบียบวาระการประชุม</h4></div>
    <br>
        <?php if ((isset($_SESSION["Auth"]) == true)) { ?>        
            <div style="width:100%;padding:0;text-align:right;" >
            <a href="./index.php?controller=Admin&action=admin_index" class="btn btn-primary" style="width:100px;height:40px;"> 
                    <i class="fa fa-reply-all" style="font-size:14px;"></i> ย้อนกลับ
                    </a>
                    <a target="_blank" href="./index.php?controller=Agenda&action=detail&code=<?=$meeting["code"];?>" class="btn btn-primary" style="width:100px;height:40px;"> 
                    <i class="fa fa-search" style="font-size:14px;"></i> preview
                </a>
            </div>
        <?php } ?>            
        <br>
        <input type="hidden" id="hdncode" name="hdncode" value="<?= $meeting["code"]; ?>">
        <table class="tbl_term table_border" style="width:100%;">
            <tr>
                <td style="width:20%;"> หัวข้อการประชุม </td>
                <td>
                    <div id="display_topic" onclick="showedit('topic');" ondblclick="showedit('topic');">
                        <?php echo (!empty($meeting["topic"]) ? $meeting["topic"] : "."); ?>
                    </div>
                    <div id="control_topic" class="displaynone" style="width:100%;">
                    <input id="txt_edit_topic" name="txt_edit_topic"   onchange="updates('topic','<?= $meeting["code"]; ?>',this);" class="form-control" value="<?= $meeting["topic"]; ?>">
                    </div>
                </td>
            </tr>
            <tr>
                <td> ประเภทการประชุม </td>
                <td>
                    <div id="display_doc_type"><b><?=report($meeting["doc_type"]); ?></b></div>
                    
                </td>
            </tr>
            <tr>
                <td> ห้องประชุม </td>
                <td>
                    <div id="display_room" onclick="showedit('room');" ondblclick="showedit('room');">
                    <?php echo (!empty($meeting["room"]) ? $meeting["room"] : "."); ?>
                    </div>
                    <div id="control_room" class="displaynone">
                        <input type="text" id="txt_edit_room" name="txt_edit_room" class="form-control" value="<?= $meeting["room"]; ?>" onchange="updates('room','<?= $meeting["code"]; ?>',this);">
                    </div>


                </td>
            </tr>
            <tr>
                <td> วันที่เริ่มต้น </td>
                <td>
                    <div id="display_start_date" onclick="showedit('start_date');" ondblclick="showedit('start_date');"><?php echo (!empty($meeting["start_date"]) ? $meeting["start_date"] : "."); ?></div>
                    <div id="control_start_date" class="displaynone">
                        <input type="date" id="txt_edit_start_date" name="txt_edit_start_date" style="width:30%;" class="form-control" value="<?= $meeting["start_date"]; ?>"  onchange="updates('start_date','<?= $meeting["code"]; ?>',this);" />
                    </div>
                    
                </td>
            </tr>
            
            <tr>
                <td> วันที่สิ้นสุด </td>
                <td>
                    <div id="display_end_date" onclick="showedit('end_date');" ondblclick="showedit('end_date');"><?php echo (!empty($meeting["end_date"]) ? $meeting["end_date"] : "."); ?></div>
                    <div id="control_end_date" class="displaynone">
                        <input type="date" id="txt_edit_end_date" name="txt_edit_end_date" style="width:30%;" class="form-control" value="<?= $meeting["end_date"]; ?>" onchange="updates('end_date','<?= $meeting["code"]; ?>',this);" >
                    </div>
                </td>
            </tr>
            <tr>
                <td>เวลาเริ่มต้น</td>
                <td>
                      <div id="display_time_start" onclick="showedit('time_start');" ondblclick="showedit('time_start');"><?php echo (!empty($meeting["time_start"]) ? $meeting["time_start"] : "."); ?></div>
                    <div id="control_time_start" class="displaynone">
                        <input type="time" id="txt_edit_time_start" name="txt_edit_time_start" class="form-control" style="width:30%;" value="<?= $meeting["time_start"]; ?>" onchange="updates('time_start','<?= $meeting["code"]; ?>',this);" >
                    </div>
                   
                </td>
            </tr>
               <tr>
                <td>เวลาสิ้นสุด</td>
                <td>
                      <div id="display_time_end" onclick="showedit('time_end');" ondblclick="showedit('time_end');"><?php echo (!empty($meeting["time_end"]) ? $meeting["time_end"] : "."); ?></div>
                    <div id="control_time_end" class="displaynone">
                        <input type="time" id="txt_edit_time_end" name="txt_edit_time_end" class="form-control" style="width:30%;" value="<?=$meeting["time_end"];?>" onchange="updates('time_end','<?= $meeting["code"]; ?>',this);" >
                    </div>
                   
                </td>
               </tr>
               <tr>
                <td>ค่าเริ่มต้น</td>
                <td>
                      <div id="display_active" onclick="showedit('active');" ondblclick="showedit('active');">
                      <?php                   
                          if($meeting["active"]=='1'){
                            echo "<span style='color:green;'><b>open</b></span>";
                          }else{
                            echo "<span style='color:red;'><b>close</b></span>";
                          } ?>
                    </div>
                    <div id="control_active" class="displaynone">
                    <select id="txt_edit_active" name="txt_edit_active" style="width:30%;" class="form-control" onchange="updates_active('active','<?= $meeting["code"]; ?>',this);">
                           <?php if($meeting["active"]=='0'){ ?>
                            <option value="0" selected><span style='color:red;'><b>close</b></span></option>
                            <option value="1"><span style='color:green;'><b>open</b></span></option>
                           <?php }else if($meeting["active"]=='1'){ ?>
                            <option value="0"><span style='color:red;font-size:bold;'><b>close</b></span></option>
                            <option value="1" selected><span style='color:green;font-size:bold;'><b>open</b></span></option>
                           <?php } ?>
                        </select>
                    </div>
                   
                </td>
               </tr>
               <tr>
                    <td>link / zoom </td>
                    <td>
                        <table style="width:40%;">
                            <tr>
                                <td>
                                    <?php if($meeting["type"]=='1'){ ?>
                                    <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('1');" value="1"  required checked>
                                    <?php }else{ ?>
                                    <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('1');" value="1"  required>
                                    <?php } ?>     
                                </td>
                                <td>text</td>
                                <td>
                                <?php if($meeting["type"]=='2'){ ?>
                                    <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('2');" value="2"  required checked>
                                    <?php }else{ ?>
                                    <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('2');" value="2"  required>
                                    <?php } ?>  
                                </td>
                                <td>link</td> 
                                <td>
                                <?php if($meeting["type"]=='3'){ ?>
                                    <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('3');" value="3"  required checked>
                                    <?php }else{ ?>
                                    <input type="radio" id="rdo_type" name="rdo_type" onclick="selects_type('3');" value="3"  required>
                                    <?php } ?>  
                                </td>
                                <td>conference</td>
                            </tr>
                        </table>
                    </td>
                </tr>    
                <tr id="tr_type_display">
                    <td style="verticel-align:top;">
                    <span id='stopic'>
                    <b>ระบุ Link:</b>
                    </span>       
                    </td>
                    
                    <td><input type="text" class="form-control" id="txtlink" name="txtlink" onclick="selects_type('3');" value="<?= $meeting["link"]; ?>" readonly></td>
                   
                   
                </tr>
                 

              
                <tr id="tr_save" class="displaynone">
                    <td></td>
                    <td><a onclick="update_meeting_type();" class="btn btn-info">save</a></td>
                </tr>
        </table>
        <hr>
        <h4>หัวเอกสาร</h4>
                    <div id="display_doctopic_text" class="panel_blue" onclick="showedit('doctopic_text');" ondblclick="showedit('doctopic_text');"><?php echo $meeting["doctopic_text"];?></div>
                    <div id="control_doctopic_text" class="displaynone panel_blue">
                    <div id='tool_doctopic_text' class="editor-controls">
                    <?php require('./app/editor.php');?>     
                    </div>
                    <div id='editor_doctopic_text' class='form-control' style='height:250px;overflow:auto;' contenteditable>
                    <?=$meeting["doctopic_text"];?>                      
                    </div>  
                         <textarea style="height:200px;" class="form-control displaynone" id="txt_edit_doctopic_text" name="txt_edit_doctopic_text"><?=$meeting["doctopic_text"];?></textarea>
                    </div>
        <hr>
        <h4>รายละเอียดการประชุม</h4>
      
                 <div id="display_detail" class="panel_blue" onclick="showedit('detail');" ondblclick="showedit('detail');"><?php echo $meeting["detail"];?></div>
                    <div id="control_detail" class="displaynone panel_blue">
                    <div id='tool_detail' class="editor-controls">
                    <?php require('./app/editor.php');?>
                    </div>
                    <div id='editor_detail' class='form-control' style='height:250px;overflow:auto;' contenteditable>
                    <?=$meeting["detail"];?>                      
                    </div>  
                    
                    <textarea style="height:200px;" class="form-control displaynone" id="txt_edit_detail" name="txt_edit_detail"><?=$meeting["detail"];?></textarea>
                    </div>
        <hr>
    </div>

    <div class="white_background">

        <p><a href="#root_modal" class="btn btn-primary" onclick="settop("<?= $meeting["code"];?>");" rel="modal:open">เพิ่มหัวข้อ</a></p>
        <br>
        <input type="hidden" id='hdnsubcnt' name='hdnsubcnt' value='<?=$subcnt;?>'>
        <table class="tbl_term table_border" id="tblLocations" cellpadding="0" cellspacing="0" border="1">
            <tr style='background-color:#A0CFEC;'>
                <td colspan="4" ></td><td></td>
            </tr>
            <?php
            echo $terms;
            ?>                            
        </table>                    
    </div>
</div>
</div>

<!--modal-->
<div class="modal"  id="root_modal" tabindex="-1" role="dialog"    tabindex="-1">
                    <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="label">เพิ่มหัวข้อ</h5>
                    
                    </div>
                    <form id="frminsertroot" name="frminsertroot" action="./index.php?controller=Agenda&action=insert_term" method="post" enctype="multipart/form-data">
                    <input type="hidden" id="hdndoc_code" name="hdndoc_code" value="<?= $meeting["code"]; ?>" class="form-control">    
                    <table class="tbl_term table_border" style="width:100%;" >
                            <tr>
                                <td>top: </td>
                                <td>
                                    <select id="hdntop" name="hdntop" class="form-control">
                                    <?php 
                                    if($topic->num_rows>0){
                                        foreach($topic as $topics){ ?>
                                        <option value="<?=$topics["no"];?>"> <?=$topics["title"];?> : <?=$topics["topic"];?> </option>
                                    <?php }
                                    
                                    }else{ ?>
                                        <option value="0">---</option>
                                    <?php }   ?>
                                
                                    </select>
                                </td>
                            </tr>
                            <tr>
                                <td style="width:5%;">หัวเรื่อง</td>
                                <td>
                                <div id='tool_title1' class="editor-controls">
                                <?php require('./app/editor.php');?>       
                                </div>
                                <div id='editor_title1' class='form-control' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttitle1" name="txttitle"></textarea>   
        
                                </div>  
                                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="">หัวข้อ</td>
                                <td>
                                <div id='tool_topic1' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic1' class='form-control' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttopic1" name="txttopic"></textarea>
                                </div> 
                                </td>
                            </tr>
                            <tr>
                                <td>ประเภท </td>
                                <td>
                                    <table style="width:40%;">
                                        <tr>
                                            <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selects_insert_root('1');" value="1" required></td>
                                            <td>text</td>
                                            <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selects_insert_root('2');" value="2" required></td>
                                            <td>link</td> 
                                            <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selects_insert_root('3');" value="3" required></td>
                                            <td>file</td>
                                        </tr>
                                    </table>                       

                                </td>
                            </tr>    
                            <tr id="tr_link_insert_root" style="display:none;">
                                <td>link </td>
                                <td><input type="text" class="form-control" id="txtlink" name="txtlink" style="width:100%;"></td>
                            </tr>    
                            <tr id="tr_file_insert_root" style="display:none;">
                                <td>file </td>
                                <td>
                                   
                                   <input type="file" id="txtfile" name="txtfile">
                                </td>
                            </tr>  
                          
                        </table>

                        <div class="modal-footer">
                        <button type="submit" id="btninsertroot" name="btninsertroot" class="btn btn-primary">บันทึก</button>
                        <a class="btn btn-default" href="#" rel="modal:close">Close</a>
                        </div>
                                  
                    </form>
                    </div>
</div>
<!--modal-->
<!--modal-->
<div  class="modal"  id="edit_root_modal" tabindex="-1" role="dialog">
                    <div class="modal-content">
                    <form id="frmeditroot" name="frmeditroot" action="./index.php?controller=Agenda&action=edit_root" method="post" enctype="multipart/form-data">
                    <div class="modal-header">
                        <h5 class="modal-title" id="label">แก้ไขหัวข้อ</h5>
                        <input type="hidden" id="hdneditdoc_code" name="hdneditdoc_code" value="<?= $meeting["code"]; ?>" class="form-control">
                        <input type="hidden" id="hdn_edit_root_id" name="hdn_edit_root_id">                
                    </div>
                        <table class="tbl_term border" style="width:100%;" >
                        <tr>
                                <td style="width:5%;">หัวเรื่อง</td>
                                <td>
                                <div id='tool_title2' class="editor-controls">
                                <?php require('./app/editor.php');?>       
                                </div>
                                <div id='editor_title2' class='form-control' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttitle2" name="txttitle"></textarea>   
        
                                </div>  
                                                    
                                </td>
                            </tr>
                            <tr>
                                <td style="">หัวข้อ</td>
                                <td>
                                <div id='tool_topic2' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic2' class='form-control' style='height:150px;overflow:auto;' contenteditable></div>                    
                                <textarea class="form-control displaynone" id="txttopic2" name="txttopic"></textarea>
                                </div> 
                                </td>
                            </tr>
                        
                            <tr>
                                <td>แนบไฟล์ </td>
                                <td>
                                    <table style="width:40%;">
                                        <tr>
                                            <td><input type="radio" id="rdo_edit_root_text" name="rdo_edit_root_type" onclick="selects_edit_root('1');" value="1" required></td>
                                            <td>text</td>
                                            <td><input type="radio" id="rdo_edit_root_link" name="rdo_edit_root_type" onclick="selects_edit_root('2');" value="2" required></td>
                                            <td>link</td> 
                                            <td><input type="radio" id="rdo_edit_root_file" name="rdo_edit_root_type" onclick="selects_edit_root('3');" value="3" required></td>
                                            <td>file</td>
                                        </tr>
                                    </table>                       

                                </td>
                            </tr>    
                            <tr id="tr_link_edit_root" class="displaynone">
                                <td>link </td>
                                <td><input type="text" class="form-control" id="txt_edit_root_link" name="txt_edit_root_link" style="width:100%;"></td>
                            </tr>    
                            <tr id="tr_file_edit_root" class="displaynone">
                                <td>file </td>
                                <td>
                                    
                                    <div id='control_edit_file_root' style='display:none;'>
                                    <input type="hidden" id="txt_hdn_edit_root_file" name="txt_hdn_edit_root_file" class="form-control">
                                    <span id='s_file_root_nm' ></span> <a onclick='rootfile_toggle();' style='color:red'><b>แก้ไข</b></a>
                                    </div>
                                    <div id='ele_edit_file_root' style='display:none;'>
                                    <input type="file" id="txt_edit_root_file" name="txt_edit_root_file">
                                    </div> 
                                </td>
                            </tr>    
                            <tr id='tr_edit_root_error'>
                                <td></td>
                                <td><span id='s_edit_root_error' style='color:red;'></span></td>
                            </tr>  
                        </table>
                        <div class="modal-footer">
                        <button type="submit" id="btneditroots" name="btneditroots" class="btn btn-primary">แก้ไข</button>
                        <a class="btn btn-default" href="#" rel="modal:close">Close</a>                        
                        </div>
                        </form>
                    </div>
</div>
<!--modal-->

<!--modal-->
<div  class="modal"  id="sub_modal" tabindex="-1" role="dialog">
                    <div class="modal-content">
                    <form id="frminsertsub" action="./index.php?controller=Agenda&action=insert_sub" method="post" enctype="multipart/form-data">
                <div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">เพิ่มหัวข้อย่อย</h5>
                        <input type="hidden" id="hdndoc_code" name="hdndoc_code" value="<?= $meeting["code"]; ?>" class="form-control">
                        <input type="hidden" id="hdnsubtop" name="hdnsubtop" value="" class="form-control">

                    </div>
                    <div class="modal-body">
                        <table class="tbl_term border" style="width:100%;">
                            
                            <tr>
                                <td style="width:5%;">หัวข้อ</td>
                                <td>
                                <div id='tool_topic3' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic3' class='form-control' style='height:150px;overflow:auto;' contenteditable></div>                    
                              
                                </div>
                                <textarea class="form-control displaynone" id="txttopic3" name="txttopic"></textarea> 
                                </td>
                            </tr>
                                    

                            <tr>
                                <td>แนบไฟล์ </td>
                                <td>
                                    <table style="width:40%;">
                                        <tr>
                                            <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selectsub('1');" value="1" required></td>
                                            <td>text</td>
                                            <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selectsub('2');" value="2" required></td>
                                            <td>link</td> 
                                            <td><input type="radio" id="rdo_type" name="rdo_type" onclick="selectsub('3');" value="3" required></td>
                                            <td>file</td>
                                        </tr>
                                    </table>                       

                                </td>
                            </tr>    
                            
                            <tr id="tr_sub_link" class="displaynone">
                                <td>link </td>
                                <td><input type="text" id="txtlink" name="txtlink" class="form-control"></td>
                            </tr>    
                            <tr id="tr_sub_file" class="displaynone">
                                <td>file </td>
                                <td><input type="file" id="txtfile" name="txtfile" class="form-control"></td>
                            </tr>    

                        </table>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" id="btninsertsub" class="btn btn-primary">บันทึก</button>
                        <a class="btn btn-default" rel="modal:close">close</a>
                    </div>
                </div>
            </form>
                    </div>
</div>
<!--modal-->


<!--modal-->
<div  class="modal"  id="edit_sub_modal" tabindex="-1" role="dialog">
                    <div class="modal-content">
                    <form id="frmeditsub" action="./index.php?controller=Agenda&action=edit_sub" method="post" enctype="multipart/form-data">
                <div>
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">แก้ไขหัวข้อย่อย</h5>
                        <input type="hidden" id="hdndoc_code" name="hdndoc_code" value="<?= $meeting["code"]; ?>" class="form-control">
                        <input type="hidden" id="hdneditsubid" name="hdneditsubid" value="" class="form-control">

                    </div>
                    <div class="modal-body">
                        <table class="tbl_term border" style="width:100%;">
                            
                            <tr>
                                <td style="width:5%;">หัวข้อ</td>
                                <td>
                                <div id='tool_topic4' class="editor-controls">
                                <?php require('./app/editor.php');?>     
                                </div>
                                <div id='editor_topic4' class='form-control' style='height:250px;overflow:auto;' contenteditable></div>                    
                                
                                </div> 
                                <textarea class="form-control  displaynone" id="txttopic4" name="txttopic4"></textarea>
                                </td>
                            </tr>
                                    

                            <tr>
                                <td>แนบไฟล์ </td>
                                <td>
                                    <table style="width:40%;">
                                        <tr>
                                            <td><input type="radio" id="rdo_edit_sub_text" name="rdo_edit_sub_type" onclick="selecteditsub('1');" value="1" required></td>
                                            <td>text</td>
                                            <td><input type="radio" id="rdo_edit_sub_link" name="rdo_edit_sub_type" onclick="selecteditsub('2');" value="2" required></td>
                                            <td>link</td> 
                                            <td><input type="radio" id="rdo_edit_sub_file" name="rdo_edit_sub_type" onclick="selecteditsub('3');" value="3" required></td>
                                            <td>file</td>
                                        </tr>
                                    </table>                       

                                </td>
                            </tr>    
                            <tr id="tr_link_edit_sub" class="displaynone">
                                <td>link </td>
                                <td><input type="text" class="form-control" id="txteditsublink" name="txteditsublink" style="width:100%;"></td>
                            </tr>    
                           
                            
                            <tr id="tr_file_edit_sub" class="displaynone">
                                <td>file </td>
                                <td>
                                    
                                    <div id='control_edit_file_sub' style='display:none;'>
                                    <input type="hidden" id="txt_hdn_edit_sub_file" name="txt_hdn_edit_sub_file" class="form-control">
                                    <span id='s_file_sub_nm' ></span> <a onclick='subfile_toggle();' style='color:red'><b>แก้ไข</b></a>
                                    </div>
                                    <div id='ele_edit_file_sub' style='display:none;'>
                                    <input type="file" id="txt_edit_sub_file" name="txt_edit_sub_file">
                                    </div> 
                                </td>
                            </tr>    
                            <tr id='tr_edit_sub_error'>
                                <td></td>
                                <td><span id='s_edit_sub_error' style='color:red;'></span></td>
                            </tr>  

                        </table>
                    </div>
                    <div class="modal-footer">

                        <button type="submit" id="btneditsub" class="btn btn-primary">บันทึก</button>
                        <a class="btn btn-default" rel="modal:close">close</a>
                    </div>
                </div>
            </form>
                    </div>
</div>
<!--modal-->



</div> <!--row-->
</div>    <!--containner-->


</body>

<?php
require_once './layouts/footer.php';
?>