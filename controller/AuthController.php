<?php

require_once './app/Base.php';

class AuthController extends Base {

    public function __construct() {
        // Master::limit(10);  //จำนวนการแสดงผลต่อหน้า
    }

    public function index() {        
        Redirect::url("Master", "index");      
    }

    public function getregister(){
        Redirect::to("login/register");
    }

    public function register(){
        
        $sql = "insert into user set firstname='".$_POST["firstname"]."',"
        . "lastname='".$_POST["lastname"]."',"
        . "department='".$_POST["department"]."',"
        . "position='".$_POST["position"]."',"
        . "username='".$_POST["username"]."',"
        . "password='".$_POST["password"]."',"
        . "line='".$_POST["line"]."',"
        . "phone='".$_POST["phone"]."',"
        . "email='".$_POST["email"]."',"
        . "status='4'";

        Base::query($sql)->insert();

        Redirect::view("login/login", array("success" => "สมัครสมาชิกสำเร็จ"));
        
    }

    public function login() {

        if(isset($_POST["username"])&&isset($_POST["password"])){

        $term = Base::query("select *,count(*) as cnt FROM user where username='" . $_POST["username"] . "' and password='" . $_POST["password"] . "'")->one();

        if ($term["cnt"] > 0) {
            $_SESSION["Auth"] = true;
            $_SESSION["fullname"] = $term["firstname"] . " " . $term["lastname"];
            $_SESSION["status"] = $term["status"];
            $_SESSION["user"] = $term["username"];
            Redirect::url("Master", "index");

            $update = Base::query("update user set last_login = '".date('Y-m-d H:i:s')."',ip='".Base::ip()."' where id='".$term["id"]."'")->update();

        } else {
            Redirect::view("login/login", array("fail" => "ชื่อผู้ใช้หรือรหัสผ่านไม่ถูกต้อง"));

        }

        }else{
             Redirect::to("login/login");
        }
    }

    public function logout() {        
        if(isset($_SESSION)){
        session_destroy();
        }
        Redirect::url("Auth", "index");
    }
}
