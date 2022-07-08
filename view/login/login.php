
<?php
require_once './layouts/header.php';
?>
<!-- Page content-->

<link href="./assets/css/master.css?key=<?php echo time(); ?>" rel="stylesheet" />


<script>
    $(document).ready(function() {
        $("#loginform").validate();
    });
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

 .success{
        width:90%;
        background-color:#D4EFDF;
        border:1px solid green;
        border-radius:10px;
        padding:0.5em;
        margin:0 auto;
        text-align:center;
        margin-top:50px;
    }

    .fail{
    
        width:90%;
        background-color:#FDEDEC;
        border:1px solid red;
        border-radius:10px;
        padding:1em;
        margin:0 auto;
        text-align:center;
        margin-top:50px;
        
    }
</style>



<div class="content" style='padding:0;'>
<div class="card white" style="margin-bottom:50px;min-height:1500px;">    

    <div class="one" style='width:90%;padding:1em;margin:0em;'>

   
    <div class="login_block">
            <form method="post" id="loginform" action="./index.php?controller=Auth&action=login">

           <?php  if(isset($success)){ ?>
               <div class="success">
                    <?php echo $success; ?>
               </div>
            <?php }if(isset($fail)){ ?>
                
                <div class="fail">
                    <?php echo $fail; ?>
               </div>
             <?php } ?>

                <table class="tbl_login" style="width:100%;">
                    <tr class="tbl_header">
                        <td colspan="2" style="text-align:center;">
                            <h4> <b>เข้าสู่ระบบ</b> </h4>  
                        </td>
                    </tr>
                    <tr>
                        <td style="padding-top:40px;padding-left:40px;">Username </td>
                        <td style="padding-top:40px;"><input type="text" class="form-control" id="username" name="username" required></td>
                    </tr>
                    <tr>
                        <td style='padding-left:40px;'>Password </td>
                        <td><input type="password" class="form-control" id="password" name="password" required></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td><input type="submit" class="btn btn-primary" value="Login" style="width:100px;">
                            <a href="./index.php?controller=Auth&action=getregister">Register</a>     
                    </td>
                    </tr>
                </table>
                <br>
                
            </form>
        </div>   
    </div>
        
</div>
</div>


<?php
require_once './layouts/footer.php';
?>