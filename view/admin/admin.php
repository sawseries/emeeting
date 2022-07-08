
<?php
require_once './layouts/header_admin.php';
?>
   <link href="./assets/css/admin.css" rel="stylesheet" />
<div class="container">
<div class="row" style="min-height:1000px;">  


<?php if ((isset($_SESSION["Auth"]) == true)) { ?>  
<div style="width:100%;vertical-align:bottom;margin-top:10px;margin-bottom:10px;"> 
  <button class="btns">เพิ่มเอกสารใหม่</button>
  <div class="dropdowns">
  <button class="btns" style="border-left:1px solid #0d8bf2">
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-contents">
    <a href="./index.php?controller=Agenda&action=create_agenda">ระเบียบวาระการประชุม</a>
    <a href="./index.php?controller=Report&action=create_report">รายงานการประชุม</a>
  </div>
</div>     
<?php } ?>  
    </div>
    <div class="box display white ">
    
          <div style="overflow-x:auto;">
            <table class="tbl_term" border="1">
                <tr class="header_blue">
                    <td style="text-align:center;">code</td>
                    <td>หัวข้อ</td>
                    <td>ประเภท</td>
                    <td style="text-align:center;">ค่าเริ่มต้น</td>
                     <td>วันที่</td>
                     <td>เวลา</td>
                     
                     <td></td>
                </tr>
                <?php foreach ($lists as $list) { ?>

                    <tr>
                        <td style="width:10%;text-align:center;"><?= $list["code"]; ?></td>
                        <td style="width:40%;">
                        <?php if($list["doc_type"]=='1'){ ?>
                          
                        <a href="./index.php?controller=Agenda&action=edit_agenda&code=<?= $list["code"]; ?>">
                      
                        <?php }else if($list["doc_type"]=='2'){ ?>

                        <a href="./index.php?controller=Report&action=edit_report&code=<?= $list["code"]; ?>">

                        <?php } ?>

                        <?php echo (!empty($list["topic"]) ? $list["topic"] : "--"); ?>
                        </a>
                        </td>
                        <td style="width:15%;">
                            <?= report($list["doc_type"]); ?>
                        </td>
                        <td style="width:10%;text-align:center;">
                        <?php 
                          if($list["active"]=='1'){
                            echo "<span style='color:green;'><b>open</b></span>";
                          }else{
                            echo "<span style='color:red;'><b>close</b></span>";
                          }
                         ?>
                        </td>
                        <td class="text_fit" style="width:15%;">
                            <?php 
                              if($list["start_date"]!=$list["end_date"]){
                                 echo shortDateThai($list["start_date"])." - ".shortDateThai($list["end_date"]);
                              }else{
                                 echo shortDateThai($list["start_date"]);  
                              }                               
                            ?>
                        </td>
                        <td class="text_fit" style="width:10%;padding:0;"><?= substr($list["time_start"],0,5); ?> - <?=substr($list["time_end"],0,5); ?></td>
                        <td style="width:5%;text-align:center;">
                            <a href="./index.php?controller=Admin&action=delete_doc&code=<?= $list["code"]; ?>"><i style='color:red;' class="fa fa-trash" aria-hidden="true"></i></a>
                        </td>
                    </tr>
                <?php } ?>                            
            </table>
        
        </div>
        <div class="footer_index">
        <?=$link;?>
        </div>
    </div>
    
         <div class="card gray mobile one" style='padding:0;'>

          <div style="overflow-x:auto;">
              <table class="tbl_index" style="width:100%;">
                   <tr class="header_tranparent">
                     <td colspan="2">
                        <b><i class="fa fa-bookmark" style="font-size:25px;"></i> เอกสารทั้งหมด</b><br>
                    </td>
                    <td></td>
                    <td></td>
                </tr>
               
                <?php foreach ($lists as $list) { ?>

                    <tr>
                        <td style="width:5px;"> <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i> </td>
                        <td>
                        <?php if($list["doc_type"]=='1'){ ?>
                          
                          <a href="./index.php?controller=Agenda&action=edit_agenda&code=<?= $list["code"]; ?>">
                        
                          <?php }else if($list["doc_type"]=='2'){ ?>
  
                          <a href="./index.php?controller=Report&action=edit_report&code=<?= $list["code"]; ?>">
  
                          <?php } ?>
                                <?=$list["topic"]; ?></a>
                            <br>
                             วันที่ : 
                            <?php 
                              if($list["start_date"]!=$list["end_date"]){
                                 echo shortDateThai($list["start_date"])." - ".shortDateThai($list["end_date"]);
                              }else{
                                 echo shortDateThai($list["start_date"]);  
                              }                               
                            ?>
                            เวลา : <?=substr($list["time_start"],0,5); ?> - <?=substr($list["time_end"],0,5); ?>
                        </td>
                        <td>
                        <?php 
                          if($list["active"]=='1'){
                            echo "<span style='color:green;'><b>open</b></span>";
                          }else{
                            echo "<span style='color:red;'><b>close</b></span>";
                          }
                         ?>
                        </td>
                        <td><a href="#">ลบ</a></td>
                    </tr>
                   
                <?php } ?>                            
            </table>
        </div>
         <div class="footer_index">
<!--        <a href="./index.php?controller=Master&action=shwall&type=1"><i class="fa fa-angle-double-right" aria-hidden="true"></i> แสดงทั้งหมด</a>-->
       </div>
    </div>
    
    
   
   
    </div>
</div>





<?php
require_once './layouts/footer.php';
?>