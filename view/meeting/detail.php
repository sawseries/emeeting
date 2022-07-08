
<?php
require_once './layouts/header.php';
?>

<style>

</style>



<div class="content" style='padding:0;'>

        
    <div class="card white" style="padding:2em;min-height:1500px;margin-bottom:50px;">    
        <div style="width:100%;">

        <?php 
        if(isset($meeting)){
        ?>
        <br>
            <div class="text">
                <div class="topic" style='padding:0;'>
                    <b><?= $meeting["doctopic_text"]; ?></b>
                </div>
            </div>

            


            <div  style="margin: auto;width:80%;">
            <div class="text">
                <div style='padding-left:1em;text-align:left;padding-top:1em;'>
                    <?= $meeting["detail"]; ?>
                </div>
            </div>
                    <?php if($meeting["type"]=='2'){ ?>
                        <table style="width:90%;margin:20px;">
                            <tr>
                                <th style="width:20%;">Link :  </th>
                                <td style="padding:0.2em;">
                                    <a href="<?= $meeting["link"]; ?>" class="btn btn-info" target="_blank" style="width:100px;"> link </a>
                                </td>
                            </tr>
                        </table>
                    <?php }else if($meeting["type"]=='3'){ ?>
                        <table style="width:90%;margin:20px;">
                            <tr>
                                <th style="width:20%;">conference   </th>
                                <td style="padding:0.2em;">
                                <a href="<?= $meeting["link"]; ?>" target="_blank" style="width:100px;"><img src="./assets/image/zoom.jpg" width="200"></a>
                                </td>
                            </tr>
                        </table>
                   <?php } ?>
                </div>   


           

            <div class="display" style="margin:0 auto;font-size:12pt;width:80%;margin-top:20px;">
          
                <table class="tbl_index" border="0" style="width:100%;">
                    <?php
                    echo $terms;
                    ?>                            
                </table>    
            </div>
        </div>

            

            <div class="mobile" style="margin:0 auto;font-size:12pt;">
            
                <table class="tbl_index" border="0" style="width:100%;">
                    <?php
                    echo $terms_mobile;
                    ?>                            
                </table>    
            </div>
            </div> 
            <?php 
        }else{ ?>
             <div class="panel_blue" style="text-align:center;font-size:20pt;">
                <b>ไม่มีวาระการประชุมในขณะนี้</b>
             </div>   

        <?php }
        ?>
        </div> 
    </div>



</div>
</div>




<?php
require_once './layouts/footer.php';
?>