
<?php
require_once './layouts/header.php';
?>
<!-- Page content-->

<link href="./assets/css/master.css?key=<?php echo time(); ?>" rel="stylesheet" />
<link href="./assets/css/login.css?key=<?php echo time(); ?>" rel="stylesheet" />
<link href="./assets/css/input.css?key=<?php echo time(); ?>" rel="stylesheet" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script>
    $(document).ready(function() {
        $("#loginform").validate();
    });
</script>


<div class="content" style='padding:0;'>
<div class="card white" style="margin-bottom:50px;min-height:1500px;">    

   

    <div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->
    <h2 class="active"> E-Meeting</h2>

    <!-- Icon 
    <div class="fadeIn first">
      <img src="./assets/image/stsp.png" id="icon" alt="User Icon" />
    </div>-->

    <!-- Login Form -->
    <form method="post" id="loginform" action="./index.php?controller=Auth&action=login">
      <input type="text" id="username" name="username" class="fadeIn second" name="login"  style='text-align:center;' placeholder="login" required>
      <input type="password" id="password" name="password" class="fadeIn third" name="login" style='text-align:center;' placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
      <a class="underlineHover" href="#">ลืมรหัสผ่าน</a>
      <a href='./index.php?controller=Auth&action=getregister'>Register</a>
    </div>

  </div>

 
    </div>
        
</div>
</div>


<?php
require_once './layouts/footer.php';
?>