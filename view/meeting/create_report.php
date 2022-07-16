<?php
require_once './layouts/header_admin.php';
?>

<head>

<link href="./assets/css/login.css?key=<?php echo time(); ?>" rel="stylesheet" /> 
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
<script>
    $(document).ready(function() {
        $("#frm_report").validate();
    });

</script>
</head>

<!-- Page content-->
<div class="container">
<div class="row">
    <div class="box white" style="padding:2em;">
        <form id='frm_report' action="./index.php?controller=Report&action=insert_report" method="post" enctype="multipart/form-data" />
        <div class="row">

        <h4><b>รายงานการประชุม</b></h4>
          <div style='overflow:hidden;'>
            <table class="tbl_create" border="0">
                <tr>
                    <td> หัวข้อ </td>
                    <td><input type="text" id="txttopic" name="txttopic" class="form-control" required></td>
                </tr>
                 
                <tr>
                    <td> ห้องประชุม </td>
                    <td>
                        <input type="text" id="txtroom" name="txtroom" class="form-control" required>
                            
                    </td>
                </tr>
                <tr>
                    <td> วันที่เริ่มต้น </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="date" id="txtstartdate" name="txtstartdate" required></td>
                                <td>เวลา</td>
                                <td><input type="time" id="txttimestart" name="txttimestart" required></td>
                            </tr>
                        </table>
                        
                    </td>
                </tr>
                <tr>
                    <td> วันที่สิ้นสุด </td>
                    <td>
                        <table>
                            <tr>
                                <td><input type="date" id="txtenddate" name="txtenddate" required></td>
                                <td>เวลา</td>
                                <td><input type="time" id="txttimeend" name="txttimeend" required></td>
                            </tr>
                        </table>
                    </td>
                </tr>
            
                
                <tr>
                    <td> File </td>
                    <td>
                        <input type="file" id="txtfile" name="txtfile" class="form-control" required>
                    </td>
                </tr>
            </table>
            </div>

        </div>

       
    <div class="row" style="text-align:center;margin-top:2em;">
    <center> <input type="submit" value="บันทึก" class="btn btn-primary" style="width:100px;height:50px;"> </center>
    </div>    
    </form>

</div>
</div>
</div>

<?php

require_once './layouts/footer.php';
?>