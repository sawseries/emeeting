<?php
require_once './layouts/header.php';
?>





<div class="content" style="padding:0;min-height:1500px;margin-bottom:50px;">

    
    <div class="card white display" style="overflow-x:auto;min-height:1500px;">
            <table class="tbl_term">
                <tr class="header_blue">
                    <td colspan="3">
                        <b><i class="fa fa-bookmark" style="font-size:25px;margin-left:10px;"></i> <?=$topic;?></b><br>
                    </td>
                </tr>
                <tr>
                    <td style='width:70%;'></td>
                     <th style='width:15%;'>วันที่</th>
                    <th style='width:15%;'>เวลา</th>
                </tr>
                <?php foreach ($lists as $list) { ?>

                    <tr>
                        <td>
                        <?php if($list["doc_type"]=='1'){ ?>
                          
                            <a href="./index.php?controller=Master&action=detail&code=<?= $list["code"]; ?>">
                        
                          <?php }else if($list["doc_type"]=='2'){ ?>
  
                          <a href="./storage/report/<?= $list["link"]; ?>" target="_blank">
  
                          <?php } ?>
                        
                                <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i>  <?= $list["topic"]; ?>
                        </a>
                       </td>
                       <td class="text_fit" style="padding:0;">
                            <?php 
                              if($list["start_date"]!=$list["end_date"]){
                                 echo shortDateThai($list["start_date"])." -<br>".shortDateThai($list["end_date"]);
                              }else{
                                 echo shortDateThai($list["start_date"]);  
                              }                               
                            ?>
                              </td>
                              <td class="text_fit" style="padding:0;"><?= substr($list["time_start"],0,5); ?> - <?=substr($list["time_end"],0,5); ?></td>
                    </tr>
                <?php } ?>                            
            </table>
        </div>

            

        <div class="card white mobile" style="overflow-x:auto;background-color:white;min-height:1500px;">
        
              <table class="tbl_index" style="width:90%;margin-top:20px;margin-bottom:20px;">
                   <tr class="header_blue">
                     <td colspan="2">
                        <b><i class="fa fa-bookmark" style="font-size:25px;"></i><?=$topic;?></b><br>
                    </td>
                </tr>
               
                <?php foreach ($lists as $list) { ?>

                    <tr>
                        <td style="width:5px;"> <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i> </td>
                        <td>
                        <?php if($list["doc_type"]=='1'){ ?>
                          
                          <a href="./index.php?controller=Master&action=detail&code=<?= $list["code"]; ?>">
                      
                        <?php }else if($list["doc_type"]=='2'){ ?>

                        <a href="./storage/report/<?= $list["link"]; ?>" target="_blank">

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
                    </tr>
                   
                <?php } ?>                            
            </table>
        </div>

    </div> <!--endcontent-->









<?php
require_once './layouts/footer.php';
?>