<?php
require_once './layouts/header.php';
?>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

  <link href="./assets/css/editor.css?key=<?php echo time(); ?>" rel="stylesheet" />
  <link href="./assets/css/register.css?key=<?php echo time(); ?>" rel="stylesheet" />
  <script type="text/javascript" src="./front/register_control.js?key=<?php echo time(); ?>"></script>
<script>



</script>

<style type='text/css'>

label span {
  font-size:10pt;
}
label.error {
    color: red;
    font-size:10pt;
    display: block;
    margin-top: 5px;
}
input.error {
    border: 1px dashed red;
    font-weight: 300;
    color: red;
}

</style>

<div class="content" style='padding:0;'>



<div class="card white" style="margin-bottom:50px;min-height:1500px;">    
    <div class="one" style='width:100%;'>
    <div class="login_block" style="">
            <form method="post" id="registerform" style="width:100%;"  action="./index.php?controller=Auth&action=register">

                <table class="tbl_login" style="width:100%;">
                    <tr class="tbl_header">
                        <td colspan="2" style="text-align:center;">
                            <h4> <b>ลงทะเบียน</b> </h4>  
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;width:20%;">ชื่อ </td>
                        <td style=""><input type="text" class="form-control" id="firstname" name="firstname" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;">นามสกุล </td>
                        <td style=""><input type="text" class="form-control" id="lastname" name="lastname" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;">หน่วยงาน </td>
                        <td style=""><input type="text" class="form-control" id="department" name="department" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;">Email </td>
                        <td style=""><input type="text" class="form-control" id="email" name="email" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;">Line </td>
                        <td style=""><input type="text" class="form-control" id="line" name="line" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;">เบอร์โทรศัพท์ </td>
                        <td style=""><input type="text" class="form-control" id="phone" name="phone" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;">ตำแหน่ง </td>
                        <td style=""><input type="text" class="form-control" id="position" name="position" required></td>
                    </tr>
                    <tr>
                        <td style="padding-left:40px;">Username </td>
                        <td style=""><input type="text" class="form-control" id="username" name="username" required></td>
                    </tr>
                    <tr>
                        <td style='padding-left:40px;'>Password </td>
                        <td><input type="password" class="form-control" id="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td style='padding-left:40px;'>Confirm-Password </td>
                        <td><input type="password" class="form-control" id="confirm_password" name="confirm_password" required data-rule-password="true" data-rule-equalTo="#password"></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td>
                        <button id="btnregisters" type="submit" class="w3-button w3-black">Register</button>
                        </td>
                    </tr>
                </table>
                <br>
            </form>
        </div>   
    </div>


    <div id="confirm_back" class="w3-modal">
    <div class="w3-modal-content" style="width:45%;top:-15%;">
      <div class="w3-container" style="padding:2em;">
        <span style="font-size:16pt;" onclick="document.getElementById('confirm').style.display='none'" class="w3-button w3-display-topright">&times;</span> 
<div class="text" style="height:600px;overflow-y:scroll;margin-top:10px;"> 
<br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะทำการเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน 
ได้แก่ ชื่อ-นามสกุล หน่วยงาน ตำแหน่ง เบอร์โทรศัพท์ อีเมล ไลน์ เพื่อนำไปใช้ในการติดต่อสื่อสาร 
อันเป็นกรณีฐานประโยชน์โดยชอบธรรมตามมาตรา 24(5) ของพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล

<br><br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะไม่เปิดเผยข้อมูลส่วนบุคคลนี้แก่บุคคลภายนอก 
และเก็บข้อมูลดังกล่าวเป็นระยะเวลาเท่าที่จำเป็นเพื่อการบรรลุวัตถุประสงค์ในการประมวลผลข้อมูล 
ทั้งนี้ อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะลบและทำลายข้อมูลส่วนบุคคลของท่าน
เมื่อสิ้นสุดเวลาตามวัตถุประสงค์นั้น

<br><br>ท่านในฐานะเจ้าของข้อมูลส่วนบุคคลมีสิทธิดำเนินการตามขอบเขตที่กฎหมายอนุญาตให้กระทำได้ 
ดังต่อไปนี้ สิทธิในการขอเพิกถอนความยินยอม สิทธิในการขอเข้าถึงข้อมูลส่วนบุคคล 
สิทธิในการขอแก้ไขข้อมูลส่วนบุคคลให้ถูกต้อง สิทธิในการขอลบหรือทำลายข้อมูลส่วนบุคคล 
สิทธิในการขอระงับการใช้ข้อมูลส่วนบุคคล สิทธิในการขอรับ ขอให้ส่ง หรือโอนข้อมูลส่วนบุคคลของท่าน 
และสิทธิในการคัดค้านการประมวลผลข้อมูลส่วนบุคคล

<br><br>กรณีท่านมีข้อสอบถามเกี่ยวกับการคุ้มครองข้อมูลส่วนบุคคล สามารถติดต่อได้ที่ 
อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ต.ทุ่งใหญ่ อ.หาดใหญ่ จ.สงขลา 90110
</div>
<div style="padding:1em;width:100%;text-align:center;" class="text">
<input type="radio" id="rdo_confirm" name="rdo_confirm" value="1"> ยินยอม
<br><br>

<a class="btn btn-info" onclick="confirm();" style="padding:1em;width:150px;">บันทึก</a>
<a class="btn btn-default" onclick="document.getElementById('confirm').style.display='none'" style="padding:1em;width:150px;">ยกเลิก</a>
<br><span id='s_error_confirm' style='color:red;'></span>
</div>
      </div>
    </div>
  </div>
</div>


<div id="confirm" class="w3-modal">
    <div class="w3-modal-content" style="width:50%;">
      <div class="w3-container" style="padding:2em;">
        <span style="font-size:16pt;" onclick="document.getElementById('confirm').style.display='none'" class="w3-button w3-display-topright">&times;</span> 
<div class="text" style="height:600px;overflow-y:scroll;margin-top:10px;"> 
<br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะทำการเก็บรวบรวมข้อมูลส่วนบุคคลของท่าน 
ได้แก่ ชื่อ-นามสกุล หน่วยงาน ตำแหน่ง เบอร์โทรศัพท์ อีเมล ไลน์ เพื่อนำไปใช้ในการติดต่อสื่อสาร 
อันเป็นกรณีฐานประโยชน์โดยชอบธรรมตามมาตรา 24(5) ของพระราชบัญญัติคุ้มครองข้อมูลส่วนบุคคล

<br><br>อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะไม่เปิดเผยข้อมูลส่วนบุคคลนี้แก่บุคคลภายนอก 
และเก็บข้อมูลดังกล่าวเป็นระยะเวลาเท่าที่จำเป็นเพื่อการบรรลุวัตถุประสงค์ในการประมวลผลข้อมูล 
ทั้งนี้ อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ จะลบและทำลายข้อมูลส่วนบุคคลของท่าน
เมื่อสิ้นสุดเวลาตามวัตถุประสงค์นั้น

<br><br>ท่านในฐานะเจ้าของข้อมูลส่วนบุคคลมีสิทธิดำเนินการตามขอบเขตที่กฎหมายอนุญาตให้กระทำได้ 
ดังต่อไปนี้ สิทธิในการขอเพิกถอนความยินยอม สิทธิในการขอเข้าถึงข้อมูลส่วนบุคคล 
สิทธิในการขอแก้ไขข้อมูลส่วนบุคคลให้ถูกต้อง สิทธิในการขอลบหรือทำลายข้อมูลส่วนบุคคล 
สิทธิในการขอระงับการใช้ข้อมูลส่วนบุคคล สิทธิในการขอรับ ขอให้ส่ง หรือโอนข้อมูลส่วนบุคคลของท่าน 
และสิทธิในการคัดค้านการประมวลผลข้อมูลส่วนบุคคล

<br><br>กรณีท่านมีข้อสอบถามเกี่ยวกับการคุ้มครองข้อมูลส่วนบุคคล สามารถติดต่อได้ที่ 
อุทยานวิทยาศาสตร์ มหาวิทยาลัยสงขลานครินทร์ ต.ทุ่งใหญ่ อ.หาดใหญ่ จ.สงขลา 90110
</div>
<div style="padding:1em;width:100%;text-align:center;" class="text">
<!--<input type="radio" id="rdo_confirm" name="rdo_confirm" value="1"> ยินยอม -->
<br><br>

<a class="btn btn-info" onclick="document.getElementById('confirm').style.display='none'" style="padding:1em;width:150px;">ยินยอม</a>

</div>
      </div>
    </div>
  </div>
</div>


</div>
 
<?php
require_once './layouts/footer.php';
?>