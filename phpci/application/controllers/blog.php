<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class blog extends CI_Controller{
    public function __construct()
    {
        parent::__construct();
        $this->load->model("blog_model");
    }
    public function newblog(){
        $userid = $this->session->userdata('userinfo')->user_id;
        $types = $this->blog_model -> get_Alltype($userid);
        $this -> load -> view("newBlog",array(
            "types" =>$types
        ));
    }
    public function blogcomments(){
        $userid = $this->session->userdata('userinfo')->user_id;
        $comms = $this -> blog_model -> get_Allcomm($userid);
        $this->load->view("blogComments",array(
            "comms"=>$comms
        ));
    }
    public function blogs(){

        $userid = $this->session->userdata('userinfo')->user_id;
        $blogs = $this -> blog_model -> get_Allblog($userid);
        $this->load->view("blogs",array(
            "blogs" =>$blogs
        ));


    }
    public function  blogtype(){
        $userid = $this->session->userdata('userinfo')->user_id;
        $types = $this->blog_model -> get_Alltype($userid);
        $this -> load -> view("blogtype",array(
            "types" =>$types
        ));
    }
    public function  changetype(){
        $userid = $this->session->userdata('userinfo')->user_id;
        $typeid = $this -> input -> get("typeid");
        $typename = $this -> input -> get("typename");
        $types = $this->blog_model -> get_Alltype($userid);
        $this -> load -> view("changeType",array(
            "types" =>$types,
            "typeid"=>$typeid,
            "typename"=>$typename
        ));
    }
    public function updatetype(){
        $typename = $this ->input -> post("typename");
        $typeid = $this -> input -> post("typeid");
        $rows =$this -> blog_model ->update_type($typename,$typeid);
        if($rows){
            redirect("blog/blogtype");
        }else{
            redirect("blog/changetype");
        }
    }
    public function deltype(){
        $typeid = $this -> input -> get("typeid");
        $rows = $this -> blog_model ->del_type($typeid);
        if($rows){
            redirect("blog/blogtype");
        }else{
            echo "fail";
        }
    }
    public function addblog(){
        $userid = $this->session->userdata('userinfo')->user_id;
        $title = $this -> input -> post("title");
        $typeid = $this -> input -> post("typeid");
        $content = $this ->input -> post("content");
        $rows = $this ->blog_model -> save_blog($userid,$title,$typeid,$content);
        if($rows>0){
            redirect("blog/blogs");
        }else{
           redirect("blog/blogs");
        }
    }
    public function addtype(){
        $userid = $this->session->userdata('userinfo')->user_id;
        $typename = $this ->input -> post("typename");
        $rows = $this ->blog_model -> save_type($userid,$typename);
        if($rows>0){
            redirect("blog/blogtype");
        }else{
            echo "fail";
        }
    }
    public function delblog(){
        $blogid = $this->input->get("blogid");
        $rows = $this-> blog_model-> delete_blog($blogid);
        if($rows){
            echo "su";
        }else{
            echo"fail";
        }
    }
    public function delcomm(){
        $commid = $this->input -> get('commid');
        $rows =$this->blog_model ->delete_comm($commid);
        if($rows){
            echo "suc";
        }else{
            echo"fail";
        }
    }
    public function viewPost(){
        $userid = $this->session->userdata('userinfo')->user_id;
        $blogid = $this -> input -> get("blogid");
        $blogs = $this ->blog_model -> get_Allblog($userid);
        $this->load->view('viewPost',array(
            "blogid"=>$blogid,
            "blogs" =>$blogs
        ));
    }








}
?>