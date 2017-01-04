<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class user extends CI_Controller {
      public function __construct()
      {
          parent::__construct();
          $this -> load ->model("user_model");
          $this -> load ->model("blog_model");
      }
//    public function __construct()
//    {
//        parent::__construct();
//        $this -> load -> model("User_model");
//    }

    public function login()
    {
        $this->load->view('login');
    }
    public function logout()
    {
        session_destroy();
        redirect("user/login");
    }
    public function reg()
    {
        $this->load->view('regist');
    }
    public function regist()
    {
        $email = $this -> input -> post("email");
        $name = $this -> input ->post("name");
        $password = $this -> input ->post("password");
        $password2 = $this -> input ->post("password2");
        $province = $this -> input -> post("province");
        $city = $this -> input -> post("city");
        $sex = $this -> input -> post("sex");
        if($password != $password2){
            $this->load->view('regist');
        }else{
            $rows = $this -> user_model -> save_user($email,$name,$password,$sex,$province,$city);
            if($rows>0){
                redirect("user/login");
            }else{
                echo "fail";
            }
        }
    }


    public function  checkLogin()
    {
        $name = $this -> input -> post("name");
        $password = $this ->input -> post("password");
        $row = $this -> user_model -> get_by_username_pwd($name,$password);
        if($row){
            $this -> session -> set_userdata(array(
                "userinfo" => $row
            ));
            redirect('user/indexlogined');
        }else{
            echo 'fail';
        }
    }
    public function userSettings()
    {
        $mood = $this->session->userdata('userinfo')->mood;
        $this-> load -> view('userSettings',array(
            "mood" => $mood
        ));

    }
    public function setMood()
    {
        $userid = $this->session->userdata('userinfo')->user_id;
        $mood = $this -> input -> post("mood");
        $this -> user_model -> update_mood($userid,$mood);
        $row = $this -> user_model -> get_by_username($userid);
        if($row){
            $this -> session -> set_userdata(array(
                "userinfo" => $row
            ));
            $this-> load -> view('adminIndex');
        }else{
            echo 'fail';
        }
    }
    public function  indexlogined()
    {
        $userid = $this->session->userdata('userinfo')->user_id;
        $types = $this ->blog_model -> get_Alltype($userid);
        $blogs = $this ->blog_model -> get_Allblog($userid);
        $comms = $this ->blog_model -> get_Allcomm($userid);
        $this -> load ->view('indexlogined',array(
            "types" =>$types,
            "blogs" => $blogs,
            "comms" =>$comms,
        ));
    }
    public function  adminIndex()
    {
        $this -> load ->view('adminIndex');
    }
    public function inbox()
    {
        $userid = $this->session->userdata('userinfo')->user_id;
        $messages = $this ->user_model-> get_Allmessage($userid);
        $this -> load -> view('inbox',array(
            "messages" =>$messages
        ));
    }
    public function outbox()
    {
        $userid = $this->session->userdata('userinfo')->user_id;
        $messages = $this ->user_model-> get_All_sendmessage($userid);
        $this -> load -> view('outbox',array(
            "messages" =>$messages
        ));
    }

    public function changePwd()
    {
        $this -> load ->view('changePwd');
    }
    public function judgePwd()
    {
        $password = $this->session->userdata('userinfo')->password;
        $pwd = $this -> input ->get("pwdval");
        if($password==$pwd){
            echo "success";
        }else{
            echo "fail";
        }
    }
    public function revise()
    {
        $userid = $this->session->userdata('userinfo')->user_id;
        $newpwd = $this -> input -> post("newpwd1");
        $rows = $this -> user_model -> update_pwd($userid,$newpwd);
        if($rows){
            redirect("user/login");
        }else{
            echo "密码修改失败";
        }
    }

    public function settingMood()
    {
        $userid = $this->session->userdata('userinfo')->user_id;
        $mood = $this -> input -> post("mood");
        $rows = $this -> user_model -> update_mood ($userid,$mood);
        if($rows){
            redirect("user/adminIndex");
        }else{
            redirect("user/settingMood");
        }
    }
    public function profile()
    {
        $this -> load -> view('profile');
    }
    public function changeProfile()
    {
        $userid = $this->session->userdata('userinfo')->user_id;
        $username = $this -> input -> post("name");
        $sex = $this-> input -> post("sex");
        $year = $this-> input -> post("year");
        $month = $this-> input -> post("month");
        $day = $this-> input -> post("day");
        $birthDate = $year."-".$month."-".$day;
        $province = $this-> input -> post("province");
        $city = $this-> input -> post("city");
        $rows =  $this -> user_model -> update_user($userid,$username,$sex,$birthDate,$province,$city);
        if($rows){
            redirect("user/adminIndex");
        }else{
            redirect("user/profile");
        }
    }

    public function replymessage()
    {
        $message = $this -> input -> post("message");
        $senduser = $this -> input -> post("senduser");
        $userid = $this -> input -> post("userid");
        $rows = $this -> user_model -> save_message($message,$senduser,$userid);
        if($rows){
            redirect("user/outbox");
        }else{
            echo "回复失败";
        }
    }
    public function delmessage()
    {
        $messid = $this -> input -> get('messid');
        $rows = $this -> user_model -> del_message($messid);
        if($rows){
            redirect("user/inbox");
        }else{
            echo "fail";
        }
    }
    public function delMySendMessage()
    {
        $messid = $this -> input -> get('messid');
        $rows = $this -> user_model -> del_message($messid);
        if($rows){
            redirect("user/outbox");
        }else{
            echo "fail";
        }
    }





















}
