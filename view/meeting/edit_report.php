<?php
require_once './layouts/header_admin.php';
?>

<head>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<link href="./assets/css/editor.css?key=<?php echo time(); ?>" rel="stylesheet" />
<script type="text/javascript" src="./front/control.js?key=<?php echo time(); ?>"></script>
<script type="text/javascript" src="./front/report_element.js?key=<?php echo time(); ?>"></script>
<script type="text/javascript" src="./front/report_control.js?key=<?php echo time(); ?>"></script>
<link href="./assets/css/report.css?key=<?php echo time(); ?>" rel="stylesheet" />
<title>รายงานการประชุม</title>
<style type="text/css"></style>

<script>
</script>
</head>
<body>
<!-- Page content-->
<div class="container">
<div class="row">
 <a href="../../layouts/header.php"></a>
    <div class="white_background" style="min-height:1000px;" style="background-color:red;">
    <div class="header_topic"><h4><i class="fa fa-plus-circle"></i> รายงานการประชุม </h4></div>
    <br>
        <?php if ((isset($_SESSION["Auth"]) == true)) { ?>        
            <div style="width:100%;padding:0;text-align:right;" >
            <a href="./index.php?controller=Admin&action=admin_index" class="btn btn-primary" style="width:100px;height:40px;"> 
                    <i class="fa fa-reply-all" style="font-size:14px;"></i> ย้อนกลับ
                    </a>
                    <a href="./storage/report/<?=$meeting["link"];?>" target="_blank" class="btn btn-primary" style="width:100px;height:40px;"> 
                    <i class="fa fa-search" style="font-size:14px;"></i> preview
                </a>
            </div>
        <?php } ?>            
        <br>
        <input type="hidden" id="hdncode" name="hdncode" value="<?= $meeting["code"]; ?>">
        <table class="tbl_term table_border" style="width:100%;">
            <tr>
                <td style="width:20%;"> หัวข้อ </td>
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
                    <div id="control_doc_type" class="displaynone">
<!--                        <textarea id="txt_edit_doc_type" name="txt_edit_doc_type" class="form-control"><?= $meeting["doc_type"]; ?></textarea>-->
                        <select id="txt_edit_doc_type" name="sle_edit_doc_type" class="form-control" onchange="updates('doc_type','<?= $meeting["code"]; ?>',this);">
                           <?php if($meeting["doc_type"]=='1'){ ?>
                            <option value="1" selected>ระเบียบวาระการประชุม</option>
                            <option value="2">รายงานการประชุม</option>
                           <?php }else if($meeting["doc_type"]=='2'){ ?>
                            <option value="1">ระเบียบวาระการประชุม</option>
                            <option value="2" selected>รายงานการประชุม</option>
                           <?php } ?>
                        </select>
                    </div>

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
                <td>เอกสาร</td>
                <td>
                     <a href="./storage/report/<?=$meeting["link"];?>" target='_blank'><?=$meeting["link"];?></a> <a onclick="filetoggle();" style='color:red;'><b>แก้ไข</b></a>
                   
                </td>
               </tr>
               <tr id="tr_file" class="displaynone">
                <td>File</td>
                <td>
                    <form method="post" action="./index.php?controller=Report&action=update_report_file" enctype="multipart/form-data">
                     <input type="hidden" id="hdncode" name="hdncode" value="<?=$meeting["code"];?>">
                     <input type="hidden" id="hdnfile" name="hdnfile" value="<?=$meeting["link"];?>">
                     <input type="file" class="form-control" id="txtfile" name="txtfile" required>
                            <button type="submit" class="btn btn-info">save</button>
                            <a class='btn btn-default' onclick="filetoggle();">cancel</a>
                    </form>
                </td>
               </tr>
        </table>
    </div>
</div>
</div>
</div> <!--row-->
</div>    <!--containner-->


</body>

<?php
require_once './layouts/footer.php';
?>