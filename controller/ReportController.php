<?php

require_once './app/Base.php';

class ReportController extends Base {
    public  $j=0;
    
    public function __construct() {
        if(!isset($_SESSION["Auth"])==true){
           Redirect::view("login/login", array("fail" => "กรุณาเข้าสู่ระบบ"));
        }
    }

    public function create_report() {
        Redirect::to("meeting/create_report");
    }

    public function insert_report() {

        $code = topcode();
        $check = Base::query("select count(*) as cnt from meeting where code = '" . $code . "'")->one();
        $file_name = "";
        $filename='';
        if ($check['cnt'] <= 0) {
            $file_size = $_FILES['txtfile']['size'];
            if ($file_size > 0) {
                $extension = pathinfo($_FILES['txtfile']['name'], PATHINFO_EXTENSION);          
                $file_name = rand().".".$extension;     
                $file_size = $_FILES['txtfile']['size'];
                $file_tmp = $_FILES['txtfile']['tmp_name'];
                $file_type = $_FILES['txtfile']['type'];
                move_uploaded_file($file_tmp, "./storage/report/".$file_name);   
                $filename = $file_name;                   
            }else{
                $errors = 'File is empty';  
            }
            if(empty($errors)){
            $sql = "insert into meeting "
            . "set code='" . $code . "',topic='" . $_POST["txttopic"] . "',doc_type='2',type='1',"
            . "start_date='" . $_POST["txtstartdate"] . "',time_start='" . $_POST["txttimestart"] . "',"
            . "end_date='" . $_POST["txtenddate"] . "',time_end='" . $_POST["txttimeend"] . "',"
            . "room='" . $_POST["txtroom"] . "',active='0',"
            . "link='" . $filename . "',doctopic_text='',detail='',user='" . $_SESSION["user"] . "',ip='" . Base::ip() . "'";
            $insert = Base::query($sql)->execute();
            Redirect::para("Admin", "edit_report", array("code" => $code)); 
            }
        }
        

    }

    public function update_row(){
        $update = "update meeting_term set no = '".$_POST["no"]."' where id='" . $_POST["id"] . "'";  
        Base::query($update)->update();
        echo true;
    }

    public function edit_report() {
        $code = $_GET["code"];
        $meeting = Base::query("select * from meeting where code = '" . $code . "'")->one();
        //$terms = $this->getterm_edit($meeting["code"]);
        $topic =  Base::query("select * from meeting_term where doc_code = '".$code."' and top='0' order by no asc")->fetchAll();
        $Master = new MasterController();
        $subcnt = $this->j;

        Redirect::view("meeting/edit_report", array("meeting" => $meeting,
          //  "terms" => $terms,
            "topic" => $topic,
            "subcnt" => $subcnt,
            "Master" => $Master));
    }

   public function update_report_file(){
    $file_size = $_FILES['txtfile']['size'];
    $hdnfile =$_POST["hdnfile"];
    $link = '';
    if ($file_size > 0) {
        if(!empty($hdnfile)){
            if(file_exists("./storage/report/".$hdnfile)){
                unlink("./storage/report/".$hdnfile);
            }
        }

        //$file_ext = explode('.', $_FILES['txtfile']['name']);
        ///$file_name = rand().".".$file_ext[1];

        $extension = pathinfo($_FILES['txtfile']['name'], PATHINFO_EXTENSION);              
        $file_name = rand().".".$extension;

        $file_size = $_FILES['txtfile']['size'];
        $file_tmp = $_FILES['txtfile']['tmp_name'];
        $file_type = $_FILES['txtfile']['type'];
        move_uploaded_file($file_tmp, "./storage/report/" . $file_name);   
        $link = $file_name;                   
    }else{
        if(!empty($hdnfile)){
            $link = $hdnfile;
        }else{
        $errors = 'File is empty'; 
        } 
    }

    $update = "update meeting set link = '".$link."' where code='".$_POST["hdncode"]."'";  
    Base::query($update)->update();

    Redirect::para("Admin", "edit_report", array("code" => $_POST["hdncode"])); 

   } 
   

   public function getroot_edit(){

    $term = Base::query("select * from meeting_term where id = '" . $_POST['id'] . "'")->one();
    echo json_encode($term);
   }


   public function update_meeting(){        
    Base::query("update meeting set ".$_POST["field"]."='".$_POST["value"]."' where code='".$_POST["code"]."'")->execute();
    //Redirect::para("Master", "getmeeting_term", array("code" => $_POST["code"]));
    echo "success";
   }
    public function update_meeting_type(){   
     $link = "";
   if(($_POST["type"]=='2')||($_POST["type"]=='3')){
       $link = $_POST["link"];
    }
    Base::query("update meeting set type='".$_POST["type"]."',link='$link' where code='".$_POST["code"]."'")->execute();
    echo true;   
    }


    
   
    public function delete_doc() {        
        $delete = Base::query("delete from meeting where code='" . $_GET["code"] . "'")->execute();
        $delete_term = Base::query("delete from meeting_term where doc_code='" . $_GET["code"] . "'")->execute();
        Redirect::url("Admin", "admin_index");
    }

    public function delete_term() {
        $delete = Base::query("delete from meeting_term where code='" . $_POST["code"] . "'")->execute();
        $deleteterm = Base::query("delete from meeting_term where top='" . $_POST["code"] . "'")->execute();
        return true;
    }


  


 
}
