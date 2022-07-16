<?php

require_once './app/Base.php';

class MasterController extends Base {

    public function __construct() {
        // Master::limit(10);  //จำนวนการแสดงผลต่อหน้า
    }

    public function index() {
        if(isset($_SESSION["Auth"])==true){

        $meeting = Base::query("select * from meeting where active='1'")->one();
        $terms = '';
        $terms_mobile = '';
        if(isset($meeting)){    
        $terms = $this->getterm($meeting["code"]);
        $terms_mobile = $this->getterm_mobile($meeting["code"]);
        }
        Redirect::view("Master/index", array("meeting" => $meeting, "terms" => $terms, "terms_mobile" => $terms_mobile));
        }else{
            Redirect::to("login/login");
        }
    }

    public function shwall() {
        $lists = "";
        $topic = "";
        $sql = "";
        $type = $_GET["type"];

        if ($type == '1') {
            $topic = "ระเบียบวาระการประชุม";
            $sql="select * from meeting where doc_type='" . $type . "' order by created_at desc";
        } else if ($type == '2') {
            $topic = "รายงานการประชุม";
            $sql="select * from meeting where doc_type='" . $type . "' order by created_at desc";
        } else if ($type == '3') {
            $topic = "เอกสารประกอบการประชุม";
            $sql="select * from meeting order by created_at desc";
        }
        $lists = Base::query($sql)->fetchAll();
        Redirect::view("meeting/display", array("lists" => $lists, "topic" => $topic,"links"=>Base::links()));
    }

    public function detail() {

        $meeting = Base::query("select * from meeting where code='" . $_GET["code"] . "'")->one();
        $terms = $this->getterm($meeting["code"]);
        $terms_mobile = $this->getterm_mobile($meeting["code"]);

        Redirect::view("meeting/detail", array("meeting" => $meeting, "terms" => $terms, "terms_mobile" => $terms_mobile));
    }

    var $strsub;

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
                $this->strsub_mobile .= "<tr>" . "<td style='verticle-align:top;padding-right:10px;width:auto;'>" . $terms["title"] . "</td>"
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
                
                $topic = '';
                if ($terms["type"] == "1") {//text
                    $topic = $terms["topic"];
                }else if ($terms["type"] == "2") {//link 
                    $topic = "<a href='".$terms["file"]."' target='blank'>".$terms["topic"]."</a>";
                }else if ($terms["type"] == "3") {//file 
                //$topic = "<a href='./index.php?controller=Master&action=showdoc&code=".$terms["code"]."' target='blank'>" . $terms["topic"] . "</a>";
                    $topic = "<a href='./storage/agenda/".$terms["file"]."' target='blank'>" . $terms["topic"] . "</a>";
                }

               

                $this->strsub_mobile .= "<td style='width:60%;padding-left:".$padding." px;verticle-align:top;'>".$topic."</td>";

                $this->strsub_mobile .= "</tr>";
                $i++;
            }
        }
        return $strsub_mobile;

    }

   

  

}
