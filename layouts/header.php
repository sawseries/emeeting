<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <META HTTP-EQUIV="Pragma" CONTENT="no-cache" >
        <meta http-equiv="cache-control" content="max-age=0" />
        <meta http-equiv="cache-control" content="no-cache" />
        <meta http-equiv="expires" content="0" />
        <meta http-equiv="expires" content="Tue, 01 Jan 1990 12:00:00 GMT" />
  
        <title>ระเบียบวาระการประชุม</title>
        <link rel="canonical" href="https://getbootstrap.com/docs/4.0/examples/navbar-fixed/">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@3.4.1/dist/css/bootstrap.min.css" integrity="sha384-HSMxcRTRxnN+Bdg0JdbxYKrThecOKuH5zCYotlSAcp1+c8xmyTe9GYg1l9a69psu" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">   
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.js"></script>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Sarabun:ital,wght@0,400;1,300&display=swap" rel="stylesheet">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Kanit&family=Prompt&display=swap" rel="stylesheet">


        <link href="./assets/css/master.css?key=<?php echo time(); ?>" type="text/css" rel="stylesheet" />

     
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
       
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.3/jquery.min.js"></script>
        <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/themes/smoothness/jquery-ui.css" />
        <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.24/jquery-ui.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>
    
        <script type="text/javascript" src="./front/control.js?key=<?php echo time(); ?>"></script>
        <style>

</style>

    </head>
    <body>
    <div style="background-color:white;">
<img src="./assets/image/header.png?key=<?php echo time(); ?>" style='width:100%;height:90px;'>
</div>
    <div class="navbar_fiexdtop" id="navbar_fiexdtop">
 
  <a class="active"  href="./index.php">หน้าแรก</a>
  <?php if ((isset($_SESSION["Auth"]) == true)) { ?>

  <a   href="./index.php?controller=Master&action=shwall&type=1">ระเบียบวาระการประชุม</a>
  <a   href="./index.php?controller=Master&action=shwall&type=2">รายงานการประชุม</a> 

  <a class="active"  style="float:right;" href="./index.php?controller=Auth&action=logout">Logout <span class="sr-only">(current)</span></a> 
  <?php if ($_SESSION["status"] == 2){ ?>
  <a  class="mobile" href="./index.php?controller=Admin&action=admin_index"  style="float:right;"> 
    <i class="fa fa-plus" style="font-size:14px;"></i> เพิ่ม 
  </a>
  <?php } ?>
  <a  class="visible"  style="float:right;color:#FFFFFF;"><i class="fa fa-user-circle" style="font-size:14px;"></i> ยินดีต้อนรับ คุณ <?= $_SESSION["fullname"]; ?></a>
  <a href="javascript:void(0);" class="icon" onclick="navbar_mobile()">
    <i class="fa fa-bars"></i>
  </a>     
<?php }else { ?>
  <a   style="float:right;" href="./index.php?controller=Auth&action=getregister">Register</a>   
  <a  class="active"  style="float:right;color:#6495ED;" href="./index.php?controller=Auth&action=login">Login</a>     
<?php } ?>
</div>

<div class="container-fluid" style="padding:0;">

<div class="sidebar">       
  <a class="active" href="./index.php?controller=Master&action=index">หน้าแรก </a>
  <?php if ((isset($_SESSION["Auth"]) == true)) { ?>
  <a href="./index.php?controller=Master&action=shwall&type=1">ระเบียบวาระการประชุม</a>
  <a href="./index.php?controller=Master&action=shwall&type=2">รายงานการประชุม</a>
  <?php } ?>
 </div>