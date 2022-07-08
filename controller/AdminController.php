<?php

require_once './app/Base.php';

class AdminController extends Base {

    public function __construct() {
        if(!isset($_SESSION["Auth"])==true){
           Redirect::view("login/login", array("fail" => "กรุณาเข้าสู่ระบบ"));
        }
    }
   
    public function admin_index() {
        $lists = Base::query("SELECT * FROM meeting order by created_at desc")
                ->limit(10)
                ->fetchAll(); //ทั้งหมด    
        $link = Base::links();        
        Redirect::view("admin/admin", array("lists" => $lists,"link"=>$link));
    }

    public function create_agenda() {
        Redirect::to("meeting/create_agenda");
    }

    public function create_report() {
        Redirect::to("meeting/create_report");
    }

    public function insert_agenda() {
        $code = self::gettopcode();
        $check = Base::query("select count(*) as cnt from meeting where code = '" . $code . "'")->one();
        $file_name = "";
        //echo $check['cnt'];
        if ($check['cnt'] <= 0) {
            $link='';
            if($_POST["rdo_type"]=='1'){
                $link = '';
            }else if($_POST["rdo_type"]=='2'){
                $link = $_POST["txtlink"];
            }else if($_POST["rdo_type"]=='3'){
                $link = $_POST["txtzoom"];
            }
            $sql = "insert into meeting "
            . "set code='" . $code . "',topic='" . $_POST["txttopic"] . "',doc_type='" . $_POST["txtreporttype"] . "',type='" . $_POST["rdo_type"] . "',"
            . "start_date='" . $_POST["txtstartdate"] . "',time_start='" . $_POST["txttimestart"] . "',"
            . "end_date='" . $_POST["txtenddate"] . "',time_end='" . $_POST["txttimeend"] . "',"
            . "room='" . $_POST["txtroom"] . "',active='0',"
            . "link='" . $link . "',doctopic_text='" . $_POST["txtdoctopic_text"] . "',detail='" . $_POST["txtdetail"] . "',user='" . $_SESSION["user"] . "',ip='" . Base::getIP() . "'";
            //echo $sql;
            $insert = Base::query($sql)->execute();
        }
        Redirect::para("Admin", "edit_agenda", array("code" => $code));
    }


    public function insert_report() {

        $code = self::gettopcode();
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
            . "link='" . $filename . "',doctopic_text='',detail='',user='" . $_SESSION["user"] . "',ip='" . Base::getIP() . "'";
            $insert = Base::query($sql)->execute();
            Redirect::para("Admin", "edit_report", array("code" => $code)); 
            }
        }
        

    }


    public function insert_root() {

        $code = self::getsubcode();
        $check = Base::query("select count(*) as cnt from meeting where code = '" . $code . "'")->one();
        $file_name = "";
        $type = $_POST["rdo_type"];
        $txt_type = "";
        $errors = "";

        if ($check['cnt'] <= 0) {

            if ($type == '1') {
                $txt_type = "";
            } else if ($type == '2') {
                
                if(!empty($_POST["txtlink"])){
                $txt_type = $_POST["txtlink"];
                }else{
                    $errors ="กรุณาระบุlink";
                }
                
            } else if ($type == '3') {
                    $file_size = $_FILES['txtfile']['size'];
                    if ($file_size > 0) {
                        //$file_ext = explode('.', $_FILES['txtfile']['name']);
                        $extension = pathinfo($_FILES['txtfile']['name'], PATHINFO_EXTENSION);
                        //echo $extension;
                        $file_name = rand().".".$extension;
                        $file_size = $_FILES['txtfile']['size'];
                        $file_tmp = $_FILES['txtfile']['tmp_name'];
                        $file_type = $_FILES['txtfile']['type'];
                        move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name);   
                        $txt_type = $file_name;                   
                    }else{
                        $errors = 'File is empty';  
                    }
            }

            if (empty($errors)) {

            $no = $_POST["hdntop"]+1;
            if(isset($_POST["hdntop"])){
    
                $update = "update meeting_term set no = no+1 where doc_code='" . $_POST["hdndoc_code"] . "' and no >= '".$no."'";            
                Base::query($update)->update();
            }

            $sql = "insert into meeting_term "
                    . "set code='" . $code . "',title='".$_POST["txttitle"]."',topic='" . $_POST["txttopic"] . "',no='" . $no . "',"
                    . "top='0',doc_code='" . $_POST["hdndoc_code"] . "',type='" . $_POST["rdo_type"] . "',"
                    . "file='" . $txt_type . "',ip='" . Base::getIP() . "'";
            $insert = Base::query($sql)->insert();
            
            echo true;

            }else{

            print($errors);  
            exit();

            }
        }
         
    }

    public function insert_sub() {
        $code = self::getsubcode();
        $top = $_POST["hdnsubtop"];
        $check = Base::query("select count(*) as cnt from meeting where code = '" . $code . "'")->one();
        $file_name = "";
        $type = $_POST["rdo_type"];
        $txt_type = "";
        $errors = "";
                 
        if ($check['cnt'] <= 0) {
            if ($type == '1') {
                $txt_type = "";
            } else if ($type == '2') {
                $txt_type = $_POST["txtlink"];
            } else if ($type == '3') {
                $file_size = $_FILES['txtfile']['size'];
                if ($file_size > 0) {

                    $extension = pathinfo($_FILES['txtfile']['name'], PATHINFO_EXTENSION);
              
                    $file_name = rand().".".$extension;

                    $file_size = $_FILES['txtfile']['size'];
                    $file_tmp = $_FILES['txtfile']['tmp_name'];
                    $file_type = $_FILES['txtfile']['type'];
                    move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name);   
                    $txt_type = $file_name;                   
                }else{
                    $errors = 'File is empty';                   
                }
            }

            if (empty($errors) == true) {
            $no = Base::query("select max(no)+1 as mx from meeting_term where top = '" . $top . "'")->one();
            $sql = "insert into meeting_term "
                    . "set code='" . $code . "',title='',topic='" . $_POST["txttopic"] . "',no='" . $no["mx"] . "',"
                    . "top='" . $top . "',doc_code='" . $_POST["hdndoc_code"] . "',type='" . $_POST["rdo_type"] . "',"
                    . "file='" . $txt_type . "',ip='" . Base::getIP() . "'";
            $insert = Base::query($sql)->insert();
            print(true);
            }else{
                exit();
             print($errors);
                     
            }
        }
         
    }

    public function update_row(){
        $update = "update meeting_term set no = '".$_POST["no"]."' where id='" . $_POST["id"] . "'";  
        Base::query($update)->update();
        echo $_POST["no"]." ".$_POST["id"];
    }



 

    public  $j=0;

    public function edit_agenda() {
        $code = $_GET["code"];
        $meeting = Base::query("select * from meeting where code = '" . $code . "'")->one();
        $terms = $this->getterm_edit($meeting["code"]);
        $topic =  Base::query("select * from meeting_term where doc_code = '".$code."' and top='0' order by no asc")->fetchAll();
        $Master = new MasterController();
        $subcnt = $this->j;

        Redirect::view("meeting/edit_agenda", array("meeting" => $meeting,
            "terms" => $terms,
            "topic" => $topic,
            "subcnt" => $subcnt,
            "Master" => $Master));
    }


    public function edit_report() {
        $code = $_GET["code"];
        $meeting = Base::query("select * from meeting where code = '" . $code . "'")->one();
        $terms = $this->getterm_edit($meeting["code"]);
        $topic =  Base::query("select * from meeting_term where doc_code = '".$code."' and top='0' order by no asc")->fetchAll();
        $Master = new MasterController();
        $subcnt = $this->j;

        Redirect::view("meeting/edit_report", array("meeting" => $meeting,
            "terms" => $terms,
            "topic" => $topic,
            "subcnt" => $subcnt,
            "Master" => $Master));
    }
    
    var $strsub;
    public function getterm_edit($code) {

        $term = Base::query("select * from meeting_term where doc_code = '" . $code . "' and top='0' order by no asc")
                ->fetchAll();

        $padding=0;$strsub="";$i=0;
        
        if ($term->num_rows > 0) {
            
            foreach ($term as $terms) {

                $topic = '';

                if($terms["type"]=='1'){
                    $topic = $terms["topic"];
                }else if($terms["type"]=='2'){
                    $topic = "<a href='".$terms["file"]."' target='_blank'>".$terms["topic"]."</a>";
                }else if($terms["type"]=='3'){
                    $topic = "<a href='./storage/agenda/".$terms["file"]."' target='_blank'>".$terms["topic"]."</a>";
                }

                $this->strsub .= "<tr><td style='width:15%;vertical-align:top;'>";
                $this->strsub .= "<input type='hidden' id='txtno_".$i."' name='txtno[".$i."]' value=".$terms["id"].">".$terms["title"]."</td>";
                $this->strsub .= "<td style='width:60%;padding:0em;'>";
                $this->strsub .= "<div style='width:100%;padding:0.6em;'>".$topic."</div>";
                $this->strsub .= "<div style='width:100%;background-color:red;'>";     
                $this->strsub .= $this->getsubterm_edit($terms["code"]);
                $this->strsub .= "</div>";              
                $this->strsub .= "</td>";                
                $this->strsub .= "<th style='width:2%;padding:0.1em;vertical-align:top;'><a title='เพิ่ม' onclick='setsubtop(\"" . $terms["code"] . "\");' class='btn btn-primary' href='#sub_modal' rel='modal:open'><span class='fa fa-plus'></span></a></th>";
                $this->strsub .= "<th style='width:2%;padding:0.1em;vertical-align:top;'><a onclick='seteditroot(\"" . $terms["id"] . "\");' class='btn btn-default' href='#edit_root_modal' rel='modal:open'><span class='fa fa-pencil-square-o'></span></a></th>";
                $this->strsub .= "<th style='width:2%;padding:0.1em;vertical-align:top;'><a style='cursor:pointer;' onclick='deleteterm(\"" . $terms["code"] . "\");' class='btn btn-danger'><span class='fa fa-trash'></span></a></th>";
                $this->strsub .= "</tr>";
                $i++;
            }
        }

        return $this->strsub;
    }
    

    public function getsubterm_edit($code) {

        $strsub="";
        $term = Base::query("select * from meeting_term where top = '" . $code . "' order by no asc")->fetchAll();
        $padding=0;

        if ($term->num_rows > 0) {
            $this->strsub .= "<ul id='sortable_".$this->j."' style='list-style:none;width:100%;'>";
            foreach ($term as $terms) {            
                $topic = '';
                if($terms["type"]=='1'){
                    $topic = $terms["topic"];
                }else if($terms["type"]=='2'){
                    $topic = "<a href='".$terms["file"]."' target='_blank'>".$terms["topic"]."</a>";
                }else if($terms["type"]=='3'){
                    $topic = "<a href='./storage/agenda/".$terms["file"]."' target='_blank'>".$terms["topic"]."</a>";
                }            
            $this->strsub .= "<li class='ui-state-default' style='padding: 0.6em;'>";
            $this->strsub .= "<input type='hidden' id='txtsubno' name='txtsubno' value='".$terms["id"]."'>";
            $this->strsub .= "<input type='hidden' id='txtcode' name='txtsubcode' value='".$terms["top"]."'>";
            $this->strsub .= "<table style='width:100%;'><tr><td style='width:90%;'>".$topic."</td>";
            $this->strsub .= "<td style='width:10%;text-align:center;'>";
            $this->strsub .= "<a href='#edit_sub_modal' onclick='setedit_sub(\"" . $terms["id"] . "\");' rel='modal:open'>".$terms["title"]."<span style='cursor:pointer;' title='edit' class='fa fa-pencil'></span></a>";
            $this->strsub .= "</td>";
            $this->strsub .= "<td style='width:10%;text-align:center;'>";
            $this->strsub .= "<a  onclick='deleteterm(\"" . $terms["code"] . "\");'><span style='color:red;cursor:pointer;' title='ลบ' class='fa fa-trash'></span></a>";
            $this->strsub .= "</td></tr></table></li>";    
            }
            $this->strsub .= "</ul>";
            $this->j++;
        }
        return $strsub;
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

    public function delete_root() {
        $delete = Base::query("delete from meeting_term where code='" . $_POST["code"] . "'")->execute();
        $delete = Base::query("delete from meeting_term where top='" . $_POST["code"] . "'")->execute();
        return true;
    }

    public function gettopcode() {
        $top = Base::query("select max(id)+1 as mx from meeting")->one();
       
        if(empty($top["mx"])){
            return "T1";
       }else{
           return "T" . $top["mx"];     
       }
    }

    public function getsubcode() {
        $sub = Base::query("select max(id)+1 as mx from meeting_term")->one();
        if(empty($sub["mx"])){
             return "S1";
        }else{
            return "S" . $sub["mx"];     
        }
    }

    public function showdoc_top() {
        $top = Base::query("SELECT * FROM meeting where code='" . $_GET["code"] . "'")
                ->one(); // วาระ

        $code = $_GET["code"];
        $topic = $top["topic"];

        Redirect::view("meeting/pdf_preview", array("top" => $top, "code" => $code, "file" => $top["file"], "topic" => $topic));
    }

    public function showdoc() {
        $sub = Base::query("SELECT * FROM meeting_term where code='" . $_GET["code"] . "'")
                ->one(); // วาระ

        $top = Base::query("SELECT * FROM meeting where code='" . $sub["doc_code"] . "'")
                ->one(); // วาระ

        $code = $top["code"];
        $topic = $top["topic"];

        Redirect::view("meeting/pdf_preview", array("sub" => $sub, "top" => $top, "file" => $sub["file"], "code" => $code, "topic" => $topic));
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

    public function edit_root(){
        $type = $_POST["rdo_edit_root_type"];
        //echo $type;
        $link = '';

        if($type=='1'){
            $link = '';
        }else if($type=='2'){
            if(!empty($_POST["txt_edit_root_link"])){
                $link = $_POST["txt_edit_root_link"];
              }else{
                $errors ="กรุณาระบุlink";
              }   
           // $link = $_POST['txt_edit_root_link'];
        }else if($type=='3'){

            $file_size = $_FILES['txtfile']['size'];
            $hdnfile =$_POST["txt_hdn_edit_root_file"];

            if ($file_size > 0) {
                if(!empty($hdnfile)){
                    if(file_exists("./storage/agenda/".$hdnfile)){
                        unlink("./storage/agenda/".$hdnfile);
                    }
                }

                $extension = pathinfo($_FILES['txtfile']['name'], PATHINFO_EXTENSION);
              
                $file_name = rand().".".$extension;
                $file_size = $_FILES['txtfile']['size'];
                $file_tmp = $_FILES['txtfile']['tmp_name'];
                $file_type = $_FILES['txtfile']['type'];
                move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name);   
                $link = $file_name;                   
            }else{
                if(!empty($hdnfile)){
                    $link = $hdnfile;
                }else{
                $errors = 'File is empty'; 
                } 
            }
        }


        if (empty($errors)) {
            $update = Base::query("update meeting_term set title='".$_POST["txttitle"]."',topic='".$_POST["txttopic"]."',type='".$_POST["rdo_edit_root_type"]."',file='".$link."' where id='".$_POST["hdn_edit_root_id"]."'")->update(); 
            echo true;
            //echo "update meeting_term set title='".$_POST["txttitle"]."',topic='".$_POST["txttopic"]."',type='".$_POST["rdo_edit_root_type"]."',file='".$link."' where id='".$_POST["hdn_edit_root_id"]."'";
        }else{
        print($errors);  
        exit();
        }
       
    }

    public function edit_sub(){

        $file_name = "";
        $type = $_POST["rdo_edit_sub_type"];
        $link = "";
        $errors = "";

            if ($type == '1') {
                $link = "";
            } else if ($type == '2') {        
                if(!empty($_POST["txteditsublink"])){
                  $link = $_POST["txteditsublink"];
                }else{
                  $errors ="กรุณาระบุlink";
                }                
            }else if ($type == '3'){
                    $file_size = $_FILES['txt_edit_sub_file']['size'];
                    $hdnfile =$_POST["txthdnsubfile"];

                    if ($file_size > 0) {
                        if(!empty($hdnfile)){
                            if(file_exists("./storage/agenda/".$hdnfile)){
                                unlink("./storage/agenda/".$hdnfile);
                            }
                        }
                        $extension = pathinfo($_FILES['txt_edit_sub_file']['name'], PATHINFO_EXTENSION);
              
                        $file_name = rand().".".$extension;

                        $file_size = $_FILES['txt_edit_sub_file']['size'];
                        $file_tmp = $_FILES['txt_edit_sub_file']['tmp_name'];
                        $file_type = $_FILES['txt_edit_sub_file']['type'];
                        move_uploaded_file($file_tmp, "./storage/agenda/" . $file_name);   
                        $link = $file_name;                   
                    }else{
                        if(!empty($hdnfile)){
                            $link = $hdnfile;
                        }else{
                        $errors = 'File is empty'; 
                        } 
                    }
            }

            if (empty($errors)) {
                $update = Base::query("update meeting_term set topic='".$_POST["txttopic4"]."',type='".$_POST["rdo_edit_sub_type"]."',file='".$link."' where id='".$_POST["hdneditsubid"]."'")->update(); 
                print(true);
            }else{
            print($errors);  
            exit();
            }
        
    }

   public function getedit_term(){
    $data = Base::query("select * from meeting_term where id='".$_POST["id"]."'")->fetchAll();
    echo json_encode($data);
   }

   public function updates_active(){   
    $update = "update meeting set active = '0'";  
    Base::query($update)->update();

    $update = "update meeting set active = '".$_POST["value"]."' where code='" . $_POST["code"] . "'";  
    Base::query($update)->update();
    echo true;
   }

   public function detail() {

    $meeting = Base::query("select * from meeting where code='" . $_GET["code"] . "'")->one();
    $terms = $this->getterm($meeting["code"]);
    $terms_mobile = $this->getterm_mobile($meeting["code"]);

    Redirect::view("meeting/detail", array("meeting" => $meeting, "terms" => $terms, "terms_mobile" => $terms_mobile));
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

   //var $strsub;

   public function getterm($code) {
       $term = Base::query("select * from meeting_term where doc_code = '" . $code . "' and top='0' order by no asc")
               ->fetchAll();                        
       $padding=0;
       $strsub="";
       $i=0;       
       if ($term->num_rows > 0) {
           foreach ($term as $terms) {
               $topic = '';
               if ($terms["type"] == "1") {//text
                   $topic = $terms["topic"];
               }else if ($terms["type"] == "2") {//link 
                   $topic = "<a href='".$terms["file"]."' target='blank'>".$terms["topic"]."</a>";
               }else if ($terms["type"] == "3") {//file 
               //$topic = "<a href='./index.php?controller=Master&action=showdoc&code=".$terms["code"]."' target='blank'>" . $terms["topic"] . "</a>";
                   $topic = "<a href='./storage/agenda/".$terms["file"]."' target='blank'>" . $terms["topic"] . "</a>";
               }
               $this->strsub .= "<tr><td style='vertical-align:top;padding-left:10px;'>".$terms['title']."</td>";
               $this->strsub .= "<td style='width:80%;padding-left: 0 em;vertical-align:top;'>";
               $this->strsub .= "".$topic."";    
               $this->strsub .= $this->getsubterm($terms["code"]);               
               $this->strsub .= "</td>";
               $this->strsub .= "</tr>";
               $i++;
           }
       }

       return $this->strsub;
   }


   public function getsubterm($code) {
       $strsub="";
       $term = Base::query("select * from meeting_term where top = '" . $code . "' order by no asc")->fetchAll();
       $i=0;
       $padding=20;
       if ($term->num_rows > 0) {
           foreach ($term as $terms) {
               $topic = '';
               if ($terms["type"] == "1") {//text
                   $topic = $terms["topic"];
               } else if ($terms["type"] == "2") {//link 
                   $topic = "<a href='".$terms["file"]."' target='blank'>".$terms["topic"]."</a>";
               } else if ($terms["type"] == "3") {//file 
                   //$topic = "<a href='./index.php?controller=Master&action=showdoc&code=".$terms["code"]."' target='blank'>" . $terms["topic"] . "</a>";
                   $topic = "<a href='./storage/agenda/".$terms["file"]."' target='blank'>" . $terms["topic"] . "</a>";
               }
               $this->strsub .= "<tr>";
               $this->strsub .= "<td style='verticle-align:top;'>".$terms["title"]."</td>";
               $this->strsub .= "<td style='verticle-align:top;'>".$topic."</td>";
               $this->strsub .= "</tr>";
               $i++;
           }
       }
       return $strsub;
   }

   public $strsub_mobile;

   public function getterm_mobile($code) {
       $term = Base::query("select * from meeting_term where doc_code = '" . $code . "' and top='0' order by no asc")
               ->fetchAll();
       if ($term->num_rows > 0) {
           foreach ($term as $terms) {
               $this->strsub_mobile .= "<tr>" . "<td style='width:40%;verticle-align:top;'>" . $terms["title"] . "</td>"
                       . "<td style='verticle-align:top;'>" . $terms["topic"] . "</td>" . "</tr>";
               $this->strsub_mobile .=  $this->getsubterm_mobile($terms["code"]);
           }
       }
       return $this->strsub_mobile;
   }

   public function getsubterm_mobile($code) {
       $strsub_mobile="";
       $term = Base::query("select * from meeting_term where top = '" . $code . "' order by no desc")->fetchAll();
       $i=0;
       $padding=20;
       if ($term->num_rows > 0) {
           foreach ($term as $terms) {
               $this->strsub_mobile .= "<tr>";
               $this->strsub_mobile .= "<td style='verticle-align:top;'>".$terms["title"]."</td>";
               
               if ($terms["type"] == "1") {//text
                   $this->strsub_mobile .= "<td style='width:60%;padding-left:".$padding." px;verticle-align:top;'>".$terms["topic"]."</td>";
               } else if ($terms["type"] == "2") {//link 
                   $this->strsub_mobile .= "<td style='width:60%;padding-left:".$padding." px;verticle-align:top;'><a href='".$terms["file"]."' target='blank'>".$terms["topic"]."</a></td>";
               } else if ($terms["type"] == "3") {//file 
                   $this->strsub_mobile .= "<td style='width:60%;padding-left:".$padding." px;verticle-align:top;'><a href='./index.php?controller=Master&action=showdoc&code=".$terms["code"]."' target='blank'>" . $terms["topic"] . "</a></td>";
               }
               $this->strsub_mobile .= "</tr>";
               $i++;
           }
       }
       return $strsub_mobile;

   }

   

   public function getroot_edit(){

    $term = Base::query("select * from meeting_term where id = '" . $_POST['id'] . "'")->one();
    echo json_encode($term);
   }


  


 
}
