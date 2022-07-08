
<?php
require_once './layouts/header.php';
?>


<div class="content" style='padding:0;'>
<div class="card white" style="margin-bottom:50px;min-height:1500px;">    
      
    <div class="one gray" style='width:95%;padding:1em;margin:1em;'>
    <?php if(!empty($meeting)){ ?>
    <table class="tbl_index" style="width:90%;background-color:white;">
                   <tr class="header_blue">
                     <td colspan="2">
                        <b><i class="fa fa-bookmark" style="font-size:25px;"></i> <?=$meeting["topic"];?></b><br>
                    </td>
                </tr>
               

                    <tr>
                        <td style="width:5px;"> <i class="fa fa-arrow-circle-right" aria-hidden="true" style="font-size:20pt;"></i> </td>
                        <td><a href="./index.php?controller=Master&action=detail&code=<?=$meeting["code"];?>">
                            ประชุมคณะกรรมการอำนวยการอุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ 
                            <br>ณ <?=$meeting["room"];?>  
                            </a>
                            <br>
                             วันที่ : 
                            <?php 
                              if($meeting["start_date"]!=$meeting["end_date"]){
                                 echo shortDateThai($meeting["start_date"])." - ".shortDateThai($meeting["end_date"]);
                              }else{
                                 echo shortDateThai($meeting["start_date"]);  
                              }                               
                            ?>
                            เวลา : <?=substr($meeting["time_start"],0,5); ?> - <?=substr($meeting["time_end"],0,5); ?> น.
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2" style="padding:0em;">
                        <?php if($meeting["type"]=='2'){ ?>
                        <table style="width:50%;">
                            <tr>
                                <th style="width:20%;">Link : <a href="<?= $meeting["link"]; ?>" class="btn btn-info" target="_blank" style="width:100px;"> link </a></th>
                            </tr>
                        </table>
                    <?php }else if($meeting["type"]=='3'){ ?>
                        <table style="width:100%;">
                            <tr>
                                <th style="width:30%;">conference : <a href="<?= $meeting["link"]; ?>" class="btn btn-info" target="_blank" style="width:100px;"> <img src="./assets/image/zoom.jpg" width="150"> </a></th>
                              
                                <th style="padding-left:50px;">
                                <?php if(!empty($meeting["detail"])){ ?>
                                    <?=$meeting["detail"];?>
                                <?php } ?>    
                                </th>
                                
                            </tr>
                        </table>
                   <?php } ?>
                        </td>
                    </tr>
                                         
            </table>
            <?php }else{ ?>
                <div style="width:100%;padding:1em;border:1px dotted blue;text-align:center;">
                  <b>no data</b>
                </div>
            <?php } ?>

    </div>
        
</div>
</div>




<?php
require_once './layouts/footer.php';
?>